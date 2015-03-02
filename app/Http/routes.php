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

Route::get('home', 'HomeController@index');

//admin dashboard
Route::resource('admin', 'AdminController@index');

//user dashboard
Route::resource('user', 'UserDashController@index');

//manager dashboard
Route::get('manager', 'ManagerDashController@index');

//manager's leaves
Route::resource('managerleaves', 'ManagerLeaveController');
Route::get('managerleaves/allrequest', 'ManagerLeaveController@show');
Route::get('pending', 'ManagerLeaveController@showPending');
Route::get('history', 'ManagerLeaveController@showHistory');

Route::resource('teams', 'TeamController'); //, ['except' => ['editRole']]);

Route::resource('leaves', 'LeaveController');

Route::resource('balances','BalanceController');

Route::resource('roles','RoleController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//Route::get('login', array('uses' => 'HomeController@showLogin'));
Route::get('login', 'HomeController@showLogin');
Route::post('login', 'HomeController@doLogin');
Route::get('logout', 'HomeController@doLogout');

Route::get('register', 'Auth\AuthController@showRegister');


//Route::get('register', '')


