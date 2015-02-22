<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Team;
use View;
use Input;
use Session;
use Redirect;
use Validator;


class TeamController extends Controller {

	/*public function __construct()
	{
		$this->middleware('auth');
	}*/
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// get all teams
		$teams = Team::all();

		// load the view and pass the teams
		// load the index form (app/views/teams/index.blade.php)
		return View::make('teams.index')->with('teams',$teams); 
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// load the create form (app/views/teams/create.blade.php)
		return View::make('teams.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
            'name' => 'required|unique:teams',
            'code' => 'required|',
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('teams/create')
                ->withErrors($validator);
        } else {
        $team = new Team;
        $team->name = Input::get('name');
        $team->code = Input::get('code');
        $team->save();

        // redirect
        Session::flash('message', 'Successfully created '.$team->name.'!');
        return Redirect::to('teams');
    	}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// get the team
		$team = Team::find($id);

		// show the view and pass the team to it
		return View::make('teams.show')->with('team',$team);
	}	

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// get the teams
		$team = Team::find($id);

		// show the edit form and pass the nerd
		return View::make('teams.edit')->with('team',$team);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name' => 'required|',
            'code' => 'required|',
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('teams/' . $id . '/edit')
                ->withErrors($validator);
        } else {
        $team = Team::find($id);
        $team->name = Input::get('name');
        $team->code = Input::get('code');
        $team->save();

        // redirect
        Session::flash('message', 'Successfully updated '.$team->name.'!');
        return Redirect::to('teams');
    	}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete
		$team = Team::find($id);
		$team->delete();

		// redirect
		Session::flash('message','Successfully deleted '.$team->name.'!');
		return Redirect::to('teams');

	}

}
