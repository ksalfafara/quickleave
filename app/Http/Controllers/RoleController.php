<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Team;
use View, Input, Session, Redirect, Validator;

use Illuminate\Http\Request;

class RoleController extends Controller {

	public function __construct()
	{
		$this->middleware('auth'); //change later to auth
	}
		public function index()
	{
		//
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
		$team = Team::find($id);
		return View::make('roles.show')->with('team',$team);
	}

	public function edit($id)
	{
		$member = User::find($id);
		return View::make('roles.edit')->with('member', $member);
	}

	public function update($id)
	{
		$rules = array(
            'role' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('roles/' . $id . '/edit')
                ->withErrors($validator);
        } else {
        $member = User::find($id);
        $member->role = Input::get('role');
        $member->save();

        Session::flash('message', 'Successfully updated '.$member->firstname."'s role!");
       	return Redirect::to('teams/');
    	}
	}

	public function destroy($id)
	{
		//	
	}

}
