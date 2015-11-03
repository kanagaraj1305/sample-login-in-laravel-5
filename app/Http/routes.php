<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/

/*Route::get('/','UsersController@index');*/

Route::get('/','LoginController@index');
Route::resource('user','UsersController');

Route::get('user','UsersController@create');
Route::post('user','UsersController@store');
Route::get('user/show/{id}','UsersController@show');
Route::get('user/{id}/edit','UsersController@edit');
Route::put('user/{id}','UsersController@update');
Route::delete('user/{id}','UsersController@destroy');
Route::resource('settings','SettingsController');
Route::get('settings','SettingsController@index');
Route::get('settings/show/{id}','SettingsController@show');
Route::get('settings/create','SettingsController@create');
Route::post('settings','SettingsController@store');
Route::get('settings/{id}/edit','SettingsController@edit');
Route::put('settings/{id}','SettingsController@update');
Route::delete('settings/{id}','SettingsController@destroy');

Route::get('image','ImageController@index');
Route::post('image/upload','ImageController@upload');
/* Ajax Ruote */
Route::post('ajax/newuser','SettingsController@store_ajax');
Route::delete('ajax/deleteuser','SettingsController@destroy_user');
Route::get('ajax/showuser','SettingsController@show_user');
Route::get('ajax/edituser','SettingsController@edit_table');
Route::put('ajax/updateuser','SettingsController@update_user');
Route::resource('auth/login','LoginController');
Route::get('auth/login','LoginController@index');
Route::post('auth/login','LoginController@login');
Route::get('logout','LoginController@logout');
/*Route::get('auth/logout', 'Auth\AuthController@getLogout');*/

Route::group(array('prefix' => 'api/v1'), function()
{
    Route::resource('users','UserApiController');
    Route::get('users','UserApiController@index');
    Route::post('users','UserApiController@store');
    Route::get('users/show/{id}','UserApiController@show');
   // Route::get('api/users', ['uses' => 'UserApiController@index']);
   // Route::post('api/users', ['uses' => 'UserApiController@store']);
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);