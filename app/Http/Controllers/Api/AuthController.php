<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Device;
use JWTAuth;
use Validator;
use Config;
use App\User;
use Illuminate\Mail\Message;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Tymon\JWTAuth\Exceptions\JWTException;
use Dingo\Api\Exception\ValidationHttpException;
use Log;

/**
 * Authentication API for deets application
 *
 * @Resource("Authentication", uri="/auth")
 */
class AuthController extends Controller
{
    use Helpers;

    /**
     * Deets Login API,
     * Login an existing user with  email and password,
     * and a device i.e device_type, device_token
     * device_type = 1 for Android
     * device_type = 2 for iOS
     *
     * @Post("/login")
     * @Versions({"v1"})
     * @Request({"email": "john@doe.com", "password": "examplepassword123"})
     * @Response(200, body={"token": "e232j3kj121n2b1k2j1h21k2h12kj1h21kj2hkj1h1kj2h12kjh"})
     */
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        $device = $request->only(['device_token']);

        $data = [
            'email' => $request['email'],
            'password' => $request['password']
        ];

        $validate = [
            'email' => 'required',
            'password' => 'required'
        ];

        $validator = Validator::make($data, $validate);

        if ($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }

        $user_ = User::where('email', '=', $request['email'])->first();


        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return $this->response->errorUnauthorized("Invalid email or password.");
            }

            if ($token) {
                $user = User::where('email', '=', $request['email'])->first();

                if ($user) {
                    $user->devices()->firstOrCreate($device);
                    $user->last_login = Carbon::now();
                    $user->last_login_ip = $request->getClientIp();
                    $user->save();
                }


            }

        } catch (JWTException $e) {
            return $this->response->error('Unexpected error occurred please try again later.', 500);
        }


        return response()->json(compact('token'));
    }

    /**
     * Deets Signup API,
     * Register new user with a unique email, password, username,
     * and a device i.e device_type, device_token
     * device_type = 1 for Android
     * device_type = 2 for iOS
     *
     * @Post("/signup")
     * @Versions({"v1"})
     * @Request({"email": "john@doe.com", "password": "examplepassword123","device_type":"1"})
     * @Response(200, body={"token": "e232j3kj121n2b1k2j1h21k2h12kj1h21kj2hkj1h1kj2h12kjh"})
     */
    public function signup(Request $request)
    {

        $hasToReleaseToken = Config::get('boilerplate.signup_token_release');
        $requestData = $request->only(['email', 'password', 'first_name', 'last_name', 'username', 'is_social', 'social_id', 'gender','age']);


        $validator = Validator::make($requestData,
            [
                'username' => 'required|unique:users,username',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required|integer|max:2',
                'age' => 'required|integer|max:200'
            ]);

        if ($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }

        if ($requestData['is_social'] == null) {
            $requestData['is_social'] = 0;
        }


        User::unguard();
        $user = User::create($requestData);
        User::reguard();

        if (!$user->id) {
            return $this->response->error('could_not_create_user', 500);
        }

        if ($hasToReleaseToken) {
            return $this->login($request);
        }

        return $this->response->created();
    }


    /**
     * Handels password recovery of a specific user.
     *
     *
     * @Post("/recovery")
     * @Versions({"v1"})
     * @Request({"email": "john@doe.com"})
     * @Response(200, body={"message": "Email with reset link has been Sent"})
     */
    public function recovery(Request $request)
    {
        $validator = Validator::make($request->only('email'), [
            'email' => 'required'
        ]);

        if ($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }

        $response = Password::sendResetLink($request->only('email'), function (Message $message) {
            $message->subject("Sports Social Password Reset Email.");
        });

        switch ($response) {
            case Password::RESET_LINK_SENT:
                return response()->json(['message' => 'Verification email has been sent', 'status_code' => 204]);
            case Password::INVALID_USER:
                return $this->response->errorNotFound();
        }
    }


    /**
     * Handels acutal reset function
     *
     * @Post("/reset")
     * @Versions({"v1"})
     * @Request({"email": "john@doe.com","password":"newpassword","password_confirmation":"newpassword","token":"token_which_was_sent_to_the_email" })
     * @Response(200, body={"message": "Email with reset link has been Sent"})
     */
    public function reset(Request $request)
    {
        $credentials = $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );

        $validator = Validator::make($credentials, [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }

        $response = Password::reset($credentials, function ($user, $password) {
            $user->password = $password;
            $user->save();
        });

        switch ($response) {
            case Password::PASSWORD_RESET:
                if (Config::get('boilerplate.reset_token_release')) {
                    return $this->login($request);
                }
                return $this->response->noContent();

            default:
                return $this->response->error('Could not reset your password at this time. Try again later', 500);
        }
    }


    /**
     * Handels User Logout
     * A device token is passed to this api
     * to remove the device from user's list
     * so he wont get any notifications when he's logged out.
     *
     * @Post("/logout")
     * @Versions({"v1"})
     * @Request({"device_token": "GCM/API Device Token" })
     * @Response(200, body={"message": "Youre successfully logged out."})
     */
    public function logout(Request $request)
    {
        $device_token = $request['device_token'];
        $user = $this->auth->user();


        $device = Device::where('device_token', $device_token)->where('user_id', $user->id)->first();

        if ($device) {
            if ($device->delete()) {
                return response()->json(['message' => 'Youre successfully logged out', 'status' => 200]);
            } else {
                return $this->response->error('There was a problem logging out, Try again', 501);
            }
        } else {
            return response()->json(['message' => 'Youre successfully logged out', 'status_code' => 200]);
        }
    }


    /**
     * Signup from facebook
     * @param Request $request
     * @return \Dingo\Api\Http\Response|void
     */
    public function social_singup_login(Request $request)
    {

        $hasToReleaseToken = Config::get('boilerplate.signup_token_release');
        $requestData = $request->only(['email', 'first_name', 'last_name', 'username', 'is_social', 'social_id', 'gender']);
        $device = $request->only(['device_token']);

        $validator = Validator::make($requestData,
            [
                'username' => 'required',
                'email' => 'required|email',
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required|integer|max:2',
                'is_social' => 'required',
                'social_id' => 'required'
            ]);

        if ($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }
        $user = User::where('email',$requestData['email'])->first();


        if($user)
        {

            if (!$user->id) {
                return $this->response->error('could_not_create_user', 500);
            }


            try {
                if (!$token = JWTAuth::fromUser($user)) {
                    return $this->response->errorUnauthorized("Invalid email or password.");
                }

                if ($token) {


                    if ($user) {
                        $user->devices()->firstOrCreate($device);
                        $user->last_login = Carbon::now();
                        $user->last_login_ip = $request->getClientIp();
                        $user->save();
                    }


                }

            } catch (JWTException $e) {
                return $this->response->error('Unexpected error occurred please try again later.', 500);
            }

        }else
        {
            User::unguard();
            $user_ = User::create($requestData);
            User::reguard();

            if (!$user_->id) {
                return $this->response->error('could_not_create_user', 500);
            }


            try {
                if (!$token = JWTAuth::fromUser($user_)) {
                    return $this->response->errorUnauthorized("Invalid email or password.");
                }

                if ($token) {
                    $user_ = User::where('email', '=', $request['email'])->first();

                    if ($user_) {
                        $user_->devices()->firstOrCreate($device);
                        $user_->last_login = Carbon::now();
                        $user_->last_login_ip = $request->getClientIp();
                        $user_->save();
                    }


                }

            } catch (JWTException $e) {
                return $this->response->error('Unexpected error occurred please try again later.', 500);
            }
        }



//        User::unguard();
//        $user = User::firstOrCreate($requestData);
//        User::reguard();
//
//        if (!$user->id) {
//            return $this->response->error('could_not_create_user', 500);
//        }
//
//
//        try {
//            if (!$token = JWTAuth::fromUser($user)) {
//                return $this->response->errorUnauthorized("Invalid email or password.");
//            }
//
//            if ($token) {
//                $user = User::where('email', '=', $request['email'])->first();
//
//                if ($user) {
//                    $user->devices()->firstOrCreate($device);
//                    $user->last_login = Carbon::now();
//                    $user->last_login_ip = $request->getClientIp();
//                    $user->save();
//                }
//
//
//            }
//
//        } catch (JWTException $e) {
//            return $this->response->error('Unexpected error occurred please try again later.', 500);
//        }


        return response()->json(compact('token'));
    }


    /**
     * Testing
     */
    public function check()
    {
        return dd("something");
    }

}
