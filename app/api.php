<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route:: post('register','Api\UserController@register');
Route::group(["middleware"=>['checkUser']],function(){
	Route::post('verifyOtp','Api\UserController@verifyOtp');
	Route::post('reSendOtp','Api\UserController@reSendOtp');
	Route::post('createProfile','Api\UserController@createProfile');
	Route::post('set_friend','Api\UserController@set_friend');
	Route::post('set_group','Api\UserController@set_group');
	Route::get('get_friends','Api\UserController@get_friends');
	Route::get('get_groups','Api\UserController@get_groups');

});