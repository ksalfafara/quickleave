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
Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
*/


Route::get('/', function()
{
  return View::make('index');
});
	
Route::get('login', function()
{
  return View::make('login');
});

Route::get('login2', function()
{
	return View::make('auth/login');
});

/*
Route::get('/', function()
{
  return View::make('index');
});
*/

//Route::get('/',function()
//{
	/* //Check connection to DB
	$name = DB::Connection()->getDatabaseName();
	return 'Connected to '.$name;
	*/

	/* //Grabbing all users
	$users = DB::select("SELECT * FROM user");
	var_dump($users);
	*/

	/* //Grabbing a single user
	$user = DB::selectOne("SELECT * FROM user WHERE id = 1");
	dd($user);
	*/
	
	/* //Grabbing user's attribute
	$user = DB::selectOne("SELECT * FROM user WHERE id = 2");
	return $user->fname.' last name is '.$user->lname;
	*/

	/* //Insert new user
	DB::insert("INSERT INTO user (fname,lname,email,phone,sl_bal,vl_bal) VALUES (?,?,?,?,?,?)",
		array('japh','marcos','japhmarcos@gmail.com','39858494','12','14'));
	return 'Insert successful!';
	*/

	/* //Update a user
	DB::update("UPDATE user SET fname = ? WHERE lname = ?",
		array('japhet','marcos'));
	return 'Update successful!';
	*/

	/* //Delete a user
	DB::delete("DELETE FROM user WHERE id = ?",
		array(4));
	return 'Delete successful!';
	*/

	/* //General Statements
	DB::statement("ALTER TABLE user ADD extra VARCHAR(45)");
	return 'Statement successful!';
	*/


	/* QUERY BUILDER */

	/* //SELECT * FROM user;
	$users = DB::table('user')->get();
	dd($users);
	*/

	/* //Select * FROM user WHERE id = 2;
	$user = DB::table('user')->where('id',2)->get();
	dd($user);
	*/

	/* //Select * FROM user WHERE id = 2; Same as selectOne which get rids of array
	$user = DB::table('user')->where('id',2)->first();
	dd($user);
	*/ 

	/* //WHERE clause using operations
	$user = DB::table('user')->where('Id','>','1')->get();
	dd($user);
	*/

	/*
	//Magic methods for WHERE clauses
	$user = DB::table('user')->whereId(3)->first();
	dd($user);
	*/

	/* //INSERT clause
	DB::table('user')->insert(
		array('fname' => 'japh'
			, 'lname' => 'marcos'
			, 'email' => 'japhmarcos@gmail.com'
			, 'phone' => '39858494'
			, 'sl_bal' => 12
			, 'vl_bal' => 14));
	return 'Insert successful!';
	*/

	/* //INSERT clause. Using insertGetId to grab Id of inserted user
	$id = DB::table('user')->insertGetId(array('fname' => 'japh'
											, 'lname' => 'marcos'
											, 'email' => 'japhmarcos@gmail.com'
											, 'phone' => '39858494'
											, 'sl_bal' => 12
											, 'vl_bal' => 14));
	return 'ID is '.$id.'. Insert successful!';
	*/

	//UPDATE/DELETE: always specify the WHERE clause	
	/*
	DB::table('user')->whereId(5)->update(array('fname' => 'japhet'));
	return 'Update successful!';
	*/
		
	/*
	DB::table('user')->whereFname('japhet')->delete();
	return 'Delete successful!';
	*/

//});








