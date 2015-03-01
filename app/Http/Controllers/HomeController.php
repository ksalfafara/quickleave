<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Http\Request;
use Auth, View, Input, Session, Redirect, Validator;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */

	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('home');
	}

	public function showLogin() {
		return View::make('auth.login');
	}

	public function doLogin() {
    	//$userdata = array(
        $username  = Input::get('username');
        $password  = Input::get('password');
        //);

        $rules = array(
			'username'	=>	'required|alpha_dash',
			'password'	=>	'required|min:6'
		);
		
		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('login')
        	->withErrors($validator) // send back all errors to the login form
        	->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form

		}
		else {
        	// attempt to do the login
    		if (Auth::attempt(['username' => $username, 'password' => $password])) {
    			return Redirect::to('/home');		// validation successful! Redirect them to the secure section or whatever
        	}

        	else {         
        		return Redirect::to('login');		// validation not successful, send back to form
			}
		}
	}	

	public function doLogout()
{
    Auth::logout(); // log the user out of our application
    return Redirect::to('/'); // redirect the user to the login screen
}

}
