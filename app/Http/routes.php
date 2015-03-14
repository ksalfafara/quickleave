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

//landing page
Route::get('/', 'WelcomeController@index');

//User dashboards
Route::get('admin', 'UserController@indexAdmin');
Route::get('manager', 'UserController@indexManager');
Route::get('user', 'UserController@indexMember');
Route::get('manager/members', 'UserController@showMembers');
Route::get('user/profile/{username}','UserController@user');

Route::resource('teams', 'TeamController'); //, ['except' => ['editRole']]);

Route::resource('leaves', 'LeaveController');

//Pending
Route::resource('pending', 'PendingEditController');
Route::get('teamrequest', 'PendingEditController@showHistory');

//Route::resource('pending', 'PendingEditController');

Route::resource('balances','BalanceController');

Route::resource('roles','RoleController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
