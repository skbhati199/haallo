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
Route::post('login','Api\UserController@login');
Route::post('forgotPassword','Api\UserController@forgotPassword');
Route::post('resetPassword','Api\UserController@resetPassword');

Route::group(["middleware"=>['checkUser']],function(){
	Route::post('verifyOtp','Api\UserController@verifyOtp');
	Route::post('reSendOtp','Api\UserController@reSendOtp');
	Route::post('createProfile','Api\UserController@createProfile');
	Route::post('set_friend','Api\UserController@set_friend');
	Route::post('set_group','Api\UserController@set_group');
	Route::get('get_friends','Api\UserController@get_friends');
	Route::get('get_groups','Api\UserController@get_groups');
	Route::get('logout','Api\UserController@logout');
	Route::post('checkContact','Api\UserController@checkContact');
	Route::get('muteNotification','Api\UserController@muteNotification');
	Route::post('callingRequest','Api\NotificationController@callingRequest');
	Route::post('groupCallingRequest','Api\NotificationController@groupCallingRequest');
	Route::post('call_single_module','Api\NotificationController@call_single_module');
	Route::post('call_group_module','Api\NotificationController@call_group_module');
	Route::post('contact_snyc','Api\UserController@contact_snyc');
	Route::post('updateProfile','Api\UserController@updateProfile');
	Route::post('removeAccount','Api\NotificationController@removeAccount');
	Route::post('update_backgound_image','Api\NotificationController@updateBackground');
	Route::post('sendMessage','Api\NotificationController@sendMessage');
	Route::post('fileUpload','Api\NotificationController@fileUpload');

	Route::post('support','Api\SettingController@Support');
	Route::post('rateing','Api\SettingController@Rateing');



});