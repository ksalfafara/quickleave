<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth, View, Input, Session, Redirect, Validator;
use App\User;
use App\Leave;
use App\Team;
use Hash;

class UserController extends Controller {

	public function __construct()
	{
		$this->middleware('auth'); //change later to auth
	}
	
	public function indexAdmin()
	{
		return view('users.admin');
	}

	public function indexManager()
	{
		$team = Team::all();
		return view('users.managerdash')->with('team',$team);
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

	public function show($username)
	{
		$user = Auth::user();
		return view::make('users.indexprofile')->with('users', $user);
	}

	public function edit($id)
	{
		$user = User::find($id);
		return View::make('users.editProfile')->with('user', $user);
	}

	public function update($id)
	{
		$rules = array(
            'username' => 'max:255|unique:users',
            'email' => 'email|max:255',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('user/' . $id . '/edit')
                ->withErrors($validator);
        } else {
        $user = User::find($id);
        $user->username = Input::get('username');
        $user->firstname = Input::get('firstname');
        $user->lastname = Input::get('lastname');
        $user->email = Input::get('email');
        $user->save();

        Session::flash('message', 'Successfully updated your profile!');

       	return Redirect::to('user/profile/{$user->username}');
       }
		
	}

	public function changePass($id)
	{
		$user = User::find($id);
		return View::make('users.changePass')->with('user', $user);
	}

	public function updatePass($id)
	{
		$rules = array(
			'old_password' => 'required:min:6',
            'new_password' => 'required|min:6',
            'retype_password' => 'required|same:new_password'

        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('user/' . $id . '/changepassword')
                ->withErrors($validator);
        } 
        else {
	        $user = User::find($id);

	        //get inputs
	        $old_pass = Input::get('old_password');
	        $new_pass = Input::get('new_password');

	        //test old to existing password
	        if(Hash::check($old_pass, $user->getAuthPassword())) { 
	        	$user->password = Hash::make($new_pass); 
	        	$user->save();
	        	Session::flash('message', 'Successfully updated password.');
       			return Redirect::to('user/profile/'. $user->username);
       		}
       		else {
       			Session::flash('message', 'Your old password is incorrect.');
       			return Redirect::to('user/' . $id . '/changepassword');
       		}      
       	}	
	}

	public function destroy($id)
	{
		//
	}
	
	public function showEmployees()
	{
		$employees = User::all();
		return View::make('users.showEmployees')->with('employees', $employees); 
	}


	public function editEmployee($id)
	{

		$teams = Team::lists('team_name','id');
		$employee = User::find($id);
		return View::make('users.editEmployee')->with('employee',$employee)->with('teams',$teams);
	}

	public function updateEmployee($id)
	{
        $rules = array(
        	'role'			=> 'required',
        	'date_hired' 	=> 'required',
            'sl_bal' 		=> 'required',
            'vl_bal' 		=> 'required'
        );


        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('admin/' . $id . '/editemployee')
                ->withErrors($validator);
        } 
        else {
        $employee = User::find($id);

        $employee->team_id = Input::get('team_id');
        $employee->role = Input::get('role');
        $employee->date_hired = Input::get('date_hired');
        $employee->sl_bal = Input::get('sl_bal');
        $employee->vl_bal = Input::get('vl_bal');

        $employee->save();

        Session::flash('message', 'Successfully updated '.$employee->firstname."'s information!");
        return Redirect::to('admin/showemployees');
    	}
	}



}
