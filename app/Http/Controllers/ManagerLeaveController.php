<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Leave as Leave;
use View, Input, Session, Redirect, Validator, Datetime, DB, Date;

class ManagerLeaveController extends Controller {

	public function __construct()
	{
		$this->middleware('guest'); //change later to auth
	}

	public function index()
	{
        $leaves = Leave::all();
        return View::make('managerleaves.index')->with('leaves', $leaves);
	}


	public function create()
	{
		return View::make('managerleaves.create');
	}

    public function show()
    {
        $leaves = Leave::all();
        return View::make('managerleaves.allrequest')->with('leaves', $leaves);
    }

    public function showPending()
    {
        $leaves = Leave::all();
        return View::make('managerleaves.pending')->with('leaves', $leaves);
    }

    public function showHistory()
    {
        $leaves = Leave::all();
        return View::make('managerleaves.teamrequest')->with('leaves', $leaves);
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
            return Redirect::to('managerleaves/create')
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
        return Redirect::to('managerleaves');
    	}
	}

	public function edit($id)
	{
		$leave = Leave::find($id);
		return View::make('managerleaves.edit')->with('leave',$leave);
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
            return Redirect::to('managerleaves/' . $id . '/edit')
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
        return Redirect::to('managerleaves');
    	}
	}

	public function destroy($id)
	{
		// delete
		$leave = Leave::find($id);
		$leave->delete();

		// redirect
		Session::flash('message','Successfully deleted Leave Request '.$leave->id.'!');
		return Redirect::to('managerleaves');
	}

    /**public function approve($id)
    {
        $inputs = Input::all();
        $leave = Leave::find($id);
        $leave['status'] = 'Approve';
        $approve = Leave::find($id)->update($leave);

        return redirect('/pending');

    }**/

}
	
