<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
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

/**
 * Authentication API for deets application
 *
 * @Resource("Authentication", uri="/auth")
 */
class PaymentController extends Controller
{
    use Helpers;

    public function saveCard(Request $request)
    {
        $requestData = $request->only(['FirstName', 'LastName']);

        $data = ['FirstName'=>$requestData['FirstName'], 'LastName'=>$requestData['LastName']];

        $save = Transaction::card($data)->create($data);

        if($save)
        {
            return response()->json(['success'=>true, 'message'=>'Transaction successfull', 'data'=>$save]);
        }

    }

}