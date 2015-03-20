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

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//landing page
Route::get('/', 'WelcomeController@index');

//User dashboards
Route::get('admin', 'UserController@indexAdmin');
Route::get('manager', 'UserController@indexManager');
Route::get('user', 'UserController@indexMember');
Route::get('manager/members', 'UserController@showMembers');
Route::get('user/profile/{username}','UserController@user');

//Team
Route::get('teams', 'TeamController@index');
Route::get('teams/create', 'TeamController@create');
Route::post('teams', 'TeamController@store');
Route::get('teams/{id}/showmembers', 'TeamController@showMembers');
Route::get('teams/{id}/edit', 'TeamController@edit');
Route::put('teams/{id}/update', ['uses' => 'TeamController@update', 'as' => 'teams.update']);
Route::delete('teams/{id}/delete', 'TeamController@destroy');
Route::get('teams/{id}/editrole', 'TeamController@editRole');
Route::put('teams/{id}/updateRole', ['uses' => 'TeamController@updateRole', 'as' => 'teams.updateRole']);

Route::resource('leaves', 'LeaveController');

//Pending
Route::resource('pending', 'PendingEditController');
Route::get('teamrequest', 'PendingEditController@showHistory');

//Route::resource('pending', 'PendingEditController');

Route::resource('balances','BalanceController');

Route::resource('roles','RoleController');


