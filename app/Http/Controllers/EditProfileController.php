<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use View, Input, Session, Redirect, Validator;

use Illuminate\Http\Request;

class EditProfileController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index($username)
	{
		//$user = User::where('username', '=', $username);
		//$user = $user->first();

		$user = User::find($usename);
		return view::make('users.indexprofile')->with('users', $user);

	}

	public function create()
	{
		//
	}

	public function store()
	{
		//
	}

	public function show($id)
	{
		
	}

	public function edit($id)
	{
		
	}

	public function update($id)
	{
		
    	
	}

	public function destroy($id)
	{
		//	
	}

}
