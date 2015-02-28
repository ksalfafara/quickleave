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

//Route::get('dashboard', 'MasterController@index');

Route::get('admin', function()
{
	return View::make('admin');
});

Route::get('home', 'HomeController@index');

Route::resource('teams', 'TeamController');

Route::resource('leaves', 'LeaveController');

Route::resource('balances','BalanceController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
