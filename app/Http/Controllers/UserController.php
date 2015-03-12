<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth, View, Input, Session, Redirect, Validator;
use App\User;

class UserController extends Controller {

	public function __construct()
	{
		$this->middleware('auth'); //change later to auth
	}
	
		public function index()
	{
		//return View::make('users')->withUsers(User::all());
		$users = User::all();
        return View::make('users.index')->with('users', $users);
	}

	public function create()
	{
		return View::make('users.create');

	}

	public function store()
	{
	//	return 'Form Posted!';
		$rules = array(
			'firstname'	 	=> 'required',
			'lastname'	 	=> 'required',
			'email' 	 	=> 'required|email|unique:users',
			'username' 	 	=> 'required|unique:user|alpha_dash',
			'password' 		=> 'required|min:6',
			'conf_password'	=> 'required|same:password'
			);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) 
			return Redirect::to('users/create')
			->withInput()
			->withErrors($validator->messages());

		User::create(array(
			'firstname'		=> Input::get('firstname'),
			'lastname'		=> Input::get('lastname'),
			'email'			=> Input::get('email'),
			'username'		=> Input::get('username'),
			'password'		=> Hash::make(Input::get('password')),
			));

		return Redirect::to('users');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
	}

	public function update($id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}
	
	public function indexAdmin()
	{
		return view('users.admin');
	}

	public function indexManager()
	{
		return view('users.managerdash');
	}

	public function indexMember()
	{
		return view('users.userdash');
	}

}
