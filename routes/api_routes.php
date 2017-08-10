<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group.
|
*/


use App\Mail\PasswordReset;
use Illuminate\Support\Facades\Mail;

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {


//    $api->get('sendmail', function () {
//        Mail::to("sabieh.ahmed@gmail.com")->send(new PasswordReset());
//    });

    /*=============================================*/
    /* API AUTHENTICATION ROUTES                   */
    /*=============================================*/
    $api->post('auth/login', 'App\Http\Controllers\Api\AuthController@login');
    $api->post('auth/signup', 'App\Http\Controllers\Api\AuthController@signup');
    $api->post('auth/social', 'App\Http\Controllers\Api\AuthController@social_singup_login');
    $api->post('auth/recovery', 'App\Http\Controllers\Api\AuthController@recovery');
    $api->post('auth/reset', 'App\Http\Controllers\Api\AuthController@reset');


    /*=============================================*/
    /* DEBUGGER ROUTES                             */
    /*=============================================*/
    $api->get('test', 'App\Http\Controllers\Api\AuthController@check');


    $api->post('card/charge', 'App\Http\Controllers\Api\PaymentController@saveCard');



});
