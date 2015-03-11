<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Team;
use App\User;
use View, Input, Session, Redirect, Validator;

class TeamController extends Controller {

	public function __construct()
	{
		$this->middleware('auth'); //change later to auth
	}
	
	public function index()
	{
		$teams = Team::all();
		return View::make('teams.index')->with('teams',$teams); 
	}

	public function create()
	{
		return View::make('teams.create');
	}

	public function store()
	{
		$rules = array(
            'name' => 'required|unique:teams',
            'code' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('teams/create')
                ->withErrors($validator);
        } else {
        $team = new Team;
        $team->name = Input::get('name');
        $team->code = Input::get('code');
        $team->save();

        Session::flash('message', 'Successfully created '.$team->name.'!');
        return Redirect::to('teams');
    	}
	}
	
	/*
	public function show($id)
	{
		$team = Team::find($id);
		return View::make('teams.show')->with('team',$team);
	}
	*/
	
	public function edit($id)
	{
		$team = Team::find($id);
		return View::make('teams.edit')->with('team',$team);
	}

	public function update($id)
	{
        $rules = array(
            'name' => 'required|',
            'code' => 'required|',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('teams/' . $id . '/edit')
                ->withErrors($validator);
        } else {
        $team = Team::find($id);
        $team->name = Input::get('name');
        $team->code = Input::get('code');
        $team->save();

        Session::flash('message', 'Successfully updated '.$team->name.'!');
        return Redirect::to('teams');
    	}
	}

	public function destroy($id)
	{
		$team = Team::find($id);
		$team->delete();

		Session::flash('message','Successfully deleted '.$team->name.'!');
		return Redirect::to('teams');
	}
/*
	public function editRole($id)
	{
		$member = User::find($id);
		return View::make('teams.editRole')->with('member', $member);
	}

	public function updateRole($id)
	{
		    $rules = array(
            'is_manager' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('teams/role' . $id . '/edit')
                ->withErrors($validator);
        } else {
        $member = User::find($id);
        $member->is_manager = Input::get('is_manager');
        $member->save();

        Session::flash('message', 'Successfully updated '.$member->name.' role!');
        return Redirect::to('teams/' . $id);
    	}
	}
*/
}
