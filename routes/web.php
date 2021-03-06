<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::get('/docs', 'DocsController@index');

Route::post('/image/crop', 'ProfileController@cropFile');
Route::post('/store/file', 'ProfileController@storeFile');


Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');