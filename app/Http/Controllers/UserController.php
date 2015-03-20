<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth, View, Input, Session, Redirect, Validator;
use App\User;
use App\Leave;

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

	public function user($username)
	{
		//$user = User::where('username', '=', $username);
		//$user = $user->first();

		//$user = User::find($username);

		$user = Auth::getUser();
		return view::make('users.indexprofile')->with('users', $user);
	}

	public function edit($id)
	{
		//
	}

	public function update($id)
	{
	#	$user_id = Auth::id();
	#	$user 	 = Auth::user();
		$leave 	 = Leave::find($id);

		if ($leave->status == 'Approved') 
		{
		   $type = $leave->type;
			if ($type == 'SL') {
				$type = 'sl_bal';
			}
			elseif ($type == 'VL') {
				$type = 'vl_bal';
			}

		$duration = $leave->duration;
		DB::table('users')->decrement($type, $duration);

		#$type_bal = ($user->$type) - ($leave->duration);
		#$user->$type = $type_bal;
		#Users::where($type, '>', '-1')->decrement($type, $leave->duration);
		$leave->save();
		}
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

	public function showMembers()
	{
		$users = User::all();
        return View::make('users.members')->with('users', $users);
	}


}
