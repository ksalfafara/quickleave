<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Leave;
use App\User;
use Auth, View, Input, Session, Redirect, Validator, Datetime, DB, Date;

class LeaveController extends Controller {

	public function __construct()
	{
		$this->middleware('auth'); 
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

    public function pending()
    {
        $leaves = Leave::all();
        return View::make('leaves.pending')->with('leaves', $leaves);
    }

    public function showApproved()
    {
        $leaves = Leave::all();
        return View::make('users.adminLeaves')->with('leaves', $leaves);
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
        $user = Auth::user();

        $leave->type = Input::get('type');
        $leave->note = Input::get('note');

        $from_dt = Input::get('from_dt');
        $leave->from_dt = $from_dt;

        $to_dt = Input::get('to_dt');
        $leave->to_dt = $to_dt;

       $duration_query = DB::select("SELECT ((DATEDIFF('" . $to_dt . "', '" . $from_dt . "') + 1) -
        ((WEEK('" . $to_dt . "') - WEEK('" .$from_dt . "')) * 2) -
        (case when weekday('" . $to_dt . "') = 6 then 1 else 0 end) -
        (case when weekday('" . $from_dt . "') = 5 then 1 else 0 end)) as duration");

       $duration = $duration_query[0]->duration;

        $leave->user()->associate($user);

        $type = $leave->type;
         if ($type == 'SL') {
            $type = 'sl_bal';
         }
         elseif ($type == 'VL') {
            $type = 'vl_bal';
         }

        $leave->duration = $duration;
      if ($user->$type < $duration) {
            Session::flash('message', "Insufficient leave balance! You only have " .$user->$type." remaining " .$leave->type. " balance.");
            return Redirect::to('leaves/create');
        }
         
        $leave->save();

        Session::flash('message', 'Your leave request has been submitted. Kindly wait for the approval.');
        return Redirect::to('leaves/pending');
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

        $to_dt = Input::get('to_dt');
        $leave->to_dt = $to_dt;

        $duration_query = DB::select("SELECT ((DATEDIFF('" . $to_dt . "', '" . $from_dt . "') + 1) -
        ((WEEK('" . $to_dt . "') - WEEK('" .$from_dt . "')) * 2) -
        (case when weekday('" . $to_dt . "') = 6 then 1 else 0 end) -
        (case when weekday('" . $from_dt . "') = 5 then 1 else 0 end)) as duration");

        $duration = $duration_query[0]->duration;

        $leave->user()->associate($user);

        $user = $leave->user->id;
        $type = $leave->type;

        if ($leave->status == 'Approved')
        {
             if ($type == 'SL') {
             $type = 'sl_bal';
           }
         elseif ($type == 'VL') {
            $type = 'vl_bal';
         }

        $leave->duration = $duration;
        DB::table('users')->where('id', $user)->decrement($type, $duration);
        }
        
        if ($user->$type < $duration) {
            Session::flash('message', "Insufficient leave balance!");
            return Redirect::to('leaves/create');
        }

        $leave->save();
        Session::flash('message', 'Successfully updated Leave Request '.$leave->id.'!');
        return Redirect::to('leaves/pending');
    	}
	}

	public function destroy($id)
	{
		// delete
		$leave = Leave::find($id);
		$leave->delete();

		// redirect
		Session::flash('message','Successfully deleted Leave Request '.$leave->id.'!');
		return Redirect::to('leaves/pending');
	}

    public function membersPending()
    {
        $leaves = Leave::all();
        return View::make('leaves.membersPending')->with('leaves', $leaves);
    }

    public function editPending($id)
    {
        $leave = Leave::find($id);
        return View::make('leaves.editPending')->with('leave',$leave);
    }

    public function updatePending($id)
    {
        $rules = array(
            'status' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('leaves/pending/' . $id . '/edit')
                ->withErrors($validator);
        } 

        else {
        $leave = Leave::find($id);
        $leave->status = Input::get('status');
        $leave->remark = Input::get('remark');

        $user = $leave->user->id;
        $type = $leave->type;

            if ($leave->status == 'Approved')
            {
                if ($type == 'SL')
                {
                    $type = 'sl_bal';
                }
            
                elseif ($type == 'VL')
                {
                    $type = 'vl_bal';
                }
            
                $duration = $leave->duration;
                DB::table('users')->where('id', $user)->decrement($type, $duration);
            }
        
        $leave->save();

        Session::flash('message', 'Successfully updated Leave Request '.$leave->id.'!');
        return Redirect::to('leaves/memberspending');
        }
    }

    public function showHistory()
    {
        $leaves = Leave::all();
        return View::make('leaves.history')->with('leaves', $leaves);
    }
}
	
