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

//admin dashboard
Route::resource('admin', 'AdminController@index');

Route::get('home', 'HomeController@index');

Route::resource('teams', 'TeamController');

Route::get('teamview', function()
{
	return View::make('teams.team');
});

Route::resource('leaves', 'LeaveController');

Route::resource('balances','BalanceController');

Route::get('adminlte',function()
{
	return view('AdminLTE-master/index2');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//Route::get('login', array('uses' => 'HomeController@showLogin'));
Route::get('login', 'HomeController@showLogin');
Route::post('login', 'HomeController@doLogin');
Route::get('logout', 'HomeController@doLogout');

Route::resource('users', 'UserController');
//Route::post('register', 'Auth\AuthController@doRegister');

//Route::get('register', '')
