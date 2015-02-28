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

Route::get('/', 'WelcomeController@index');

Route::get('app', function()
{
	return view::make('app');
});

Route::get('home', 'HomeController@index');

Route::resource('teams', 'TeamController');

Route::resource('leaves', 'LeaveController');

Route::resource('balances','BalanceController');

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