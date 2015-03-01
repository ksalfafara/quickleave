<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Leave;
use View, Input, Session, Redirect, Validator, Datetime, DB, Date;

class LeaveController extends Controller {

	public function __construct()
	{
		$this->middleware('guest'); //change later to auth
	}

	public function index()
	{
        $leaves = Leave::all();
        return View::make('leaves.index')->with('leaves', $leaves);
	}


	public function create()
	{
		return View::make('leaves.create');
	}

    public function show($id)
    {
        $leaves = Leave::all();
        return View::make('leaves.allrequest')->with('leaves', $leaves);
    }

	public function store()
	{
       	$rules = array(
            'type' => 'required',
            'from_dt' => 'required',
            'to_dt' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('leaves/create')
                ->withErrors($validator);
        } else {
        $leave = new Leave();
        $leave->type = Input::get('type');
        $leave->note = Input::get('note');

        $from_dt = Input::get('from_dt');
        $leave->from_dt = $from_dt;
        $from_dt_datetime = new Datetime($from_dt);

        $to_dt = Input::get('to_dt');
        $leave->to_dt = $to_dt;
        $to_dt_datetime = new Datetime($to_dt);

        $duration = $from_dt_datetime->diff($to_dt_datetime);
        $leave->duration = $duration->format('%R%a');
       
        $leave->save();

        Session::flash('message', 'Your leave request has been submitted. Kindly wait for the approval.');
        return Redirect::to('leaves');
    	}
	}

	public function edit($id)
	{
		$leave = Leave::find($id);
		return View::make('leaves.edit')->with('leave',$leave);
	}

	public function update($id)
	{
		$rules = array(
            'type' => 'required',
            'from_dt' => 'required',
            'to_dt' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('leaves/' . $id . '/edit')
                ->withErrors($validator);
        } else {
        $leave = Leave::find($id);
        $leave->type = Input::get('type');
        $leave->note = Input::get('note');

        $from_dt = Input::get('from_dt');
        $leave->from_dt = $from_dt;
        $from_dt_datetime = new Datetime($from_dt);

        $to_dt = Input::get('to_dt');
        $leave->to_dt = $to_dt;
        $to_dt_datetime = new Datetime($to_dt);

        $duration = $from_dt_datetime->diff($to_dt_datetime);
        $leave->duration = $duration->format('%R%a');
       
        $leave->save();

        Session::flash('message', 'Successfully updated Leave Request '.$leave->id.'!');
        return Redirect::to('leaves');
    	}
	}

	public function destroy($id)
	{
		// delete
		$leave = Leave::find($id);
		$leave->delete();

		// redirect
		Session::flash('message','Successfully deleted Leave Request '.$leave->id.'!');
		return Redirect::to('leaves');
	}

}
	
