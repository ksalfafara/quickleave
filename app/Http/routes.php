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
	return view('app');
});

Route::get('home', 'HomeController@index');

Route::resource('teams', 'TeamController');

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