<?php
use Illuminate\Contracts\Auth\Guard;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin.login');
});
Route::get('admin',function(){
	return view('admin.login');
});

Route::get('forgot','Admin\UserController@forgot_password');
Route::post('link-send','Admin\UserController@link_send');
Route::post('adminlogin','Admin\UserController@adminlogin');//->name('adminlogin');
Route::get('reset-password/{id}','Admin\UserController@reset_password');
Route::post('password-reset','Admin\UserController@password_reset');
Route::get('help-web/{id}','Admin\SettingController@help_web');
Route::get('term-condition/{id}','Admin\SettingController@termCondition');

Route::get('term-condition', 'Admin\UserController@TermCondition');
Route::get('privacy-policy', 'Admin\UserController@PrivacyPolicy');
Route::get('about-us', 'Admin\UserController@AboutUs');
Route::get('legal', 'Admin\UserController@Legal');
Route::get('help', 'Admin\UserController@Help');
Route::get('faqs', 'Admin\UserController@faqs');

Route::group(['prefix'=>'admin','middleware'=>['checkAdmin']],function(){
	Route::get('index','Admin\UserController@index');
	Route::get('profile','Admin\UserController@profile');
	Route::get('edit-profile','Admin\UserController@edit_profile');
	Route::post('update-profile','Admin\UserController@update_profile');
	Route::get('change-password','Admin\UserController@change_password')->name('change-password');
	Route::post('password-change','Admin\UserController@password_change');
	Route::get('logout','Admin\UserController@logout');
	Route::get('user-list','Admin\UserController@user_list');
	Route::get('user-details/{id}','Admin\UserController@user_details');
	Route::get('user-block/{id}','Admin\UserController@user_block');
	Route::get('delete-user/{id}','Admin\UserController@delete_user');
	Route::get('user-sort/{pstatus}','Admin\UserController@sortBy');
	Route::get('chat','Admin\UserController@chat');
	Route::post('set-mute','Admin\UserController@set_mute');
	Route::match(['get','post'],'demo','Admin\SettingController@SettingManagement')->name('SettingManagement');
	Route::match(['get','post'],'help','Admin\SettingController@help');
	Route::get('caller-list','Admin\SettingController@caller_list');
	Route::get('caller-details/{id}','Admin\SettingController@caller_details');
	Route::get('story','Admin\SettingController@story');
	Route::get('story-management-details/{id}','Admin\SettingController@story_management_details');
	Route::post('submit-story','Admin\SettingController@submit_story');

	Route::get('support-mgmt', 'Admin\SettingController@suportMgmt');
	Route::get('delete-support/{id}', 'Admin\SettingController@deleteSupport');


	
	Route::get('report-management', 'Admin\SettingController@ReportMgmt');
	Route::post('report-management', 'Admin\SettingController@ReportMgmt');

	Route::post('terms-and-conditions','Admin\SettingController@termsAndConditions')->name('terms-and-conditions');
	Route::post('privacy-policy','Admin\SettingController@privacyPolicy')->name('privacy-policy');
	Route::post('about-us','Admin\SettingController@aboutUs')->name('about-us');
	Route::post('helps','Admin\SettingController@helps')->name('helps');
	Route::post('faqs','Admin\SettingController@faqs')->name('faqs');
	Route::post('legal','Admin\SettingController@legal')->name('legal');
	Route::post('contact','Admin\SettingController@contact')->name('contact');
	// Route::post('change-password','Admin\SettingController@changePassword')->name('change-password');

	Route::post('setting-management','Admin\SettingManagementController@SettingManagementfun');
	// Route::get('support-management','Admin\SettingManagementController@supportMgmt');

	Route::get('notification-mgmt','Admin\NotificationController@NotificationMgmt');

	Route::post('send-notification', 'Api\NotificationController@SendNotification');

	Route::get('delete-notification/{id}','Admin\NotificationController@DeleteNotification');
	Route::get('friends-mgmt','Admin\FriendController@friendMgmt');
	
	Route::post('set-limit/{id}','Admin\FriendController@setLimit');
	Route::get('set-limit/{id}','Admin\FriendController@setLimit');

	Route::get('show-friend-list/{id}','Admin\FriendController@friendList');


	


	Route::get('Rateing-mgmt','Admin\SettingController@Rateing');
	Route::get('view-rateing/{id}','Admin\SettingController@viewRateing');
	
});

// Route::post('add_notification_in_database', function (Request $request) {
// 		dd($request->all());
//            
//         });

Route::post('add_notification_in_database','Admin\NotificationController@AddNotification');

