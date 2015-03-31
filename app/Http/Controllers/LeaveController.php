<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Leave;
use App\User;
use App\Team;
use Auth, View, Input, Session, Redirect, Validator, Datetime, DB, Date;

class LeaveController extends Controller {

public $manager, $team;

	public function __construct()
	{
		$this->middleware('auth'); 
        
        $this->manager = User::find(Auth::id());
        View::share('manager', $this->manager);

        $this->team = Team::find(Auth::user()->team->id);
        View::share('team', $this->team);
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
       	Validator::extend('before_equal', function($attribute, $value, $parameters) {
            return strtotime(Input::get($parameters[0])) >= strtotime($value);
        });

        $rules = array(
            'type' => 'required',
            'from_dt' => 'required|before_equal:to_dt',
            'to_dt' => 'required',
        );

        $messages = [
            'from_dt.before_equal' => 'To Date must be later than From Date. Please try again.',
        ];

        $validator = Validator::make(Input::all(), $rules, $messages);

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
        $balance = $user->$type;
      if ($balance < $duration) {
            Session::flash('message', "Insufficient leave balance! You only have " .$balance." remaining " .$leave->type. " balance.");
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
        Validator::extend('before_equal', function($attribute, $value, $parameters) {
            return strtotime(Input::get($parameters[0])) >= strtotime($value);
        });

        $rules = array(
            'type' => 'required',
            'from_dt' => 'required|before_equal:to_dt',
            'to_dt' => 'required',
        );

        $messages = [
            'from_dt.before_equal' => 'To Date must be later than From Date. Please try again.',
        ];

        $validator = Validator::make(Input::all(), $rules, $messages);

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
        
        $user = $leave->user->id;
        $type = $leave->type;

        if ($type == 'SL') {
            $type = 'sl_bal';
        }
        elseif ($type == 'VL') {
            $type = 'vl_bal';
        }

        $balance = $leave->user->$type;
        $leave->duration = $duration;

        if ($balance < $duration) {
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

    public function membersPending($team_id)
    {


        $team = Team::find($team_id);
        return View::make('leaves.membersPending')->with('team', $team);
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
        $stat = $leave->status;
        $remark = $leave->remark;

        $stat = Input::get('status');
        $remark = Input::get('remark');

        $user = $leave->user->id;
        $type = $leave->type;

        if ($type == 'SL')
        {
           $type = 'sl_bal';
        }
        elseif ($type == 'VL')
        {
            $type = 'vl_bal';
        }
       
        $balance = $leave->user->$type;
        $duration = $leave->duration;
        if ($balance < $duration && $stat == 'approved') {
            $leave->status = 'rejected';
            $leave->remark = "Cannot process approval. You've exceeded your leave balance - Admin";
            $leave->save();
            Session::flash('message', "Cannot process approval of leave request. Employee has exceeded his leave balance.");
            return Redirect::to('leaves/history');
        }
        elseif ($balance >= $duration && $leave->status == 'approved')
        {
        DB::table('users')->where('id', $user)->decrement($type, $duration);
        }
        
        $leave->save();

        $team = Team::find(Auth::user()->team->id);
        //View::share('team', $team);

        Session::flash('message', 'Successfully updated Leave Request '.$leave->id.'!');
        return Redirect::to('leaves/ '. $team->id .'/memberspending');
        }
    }

    public function showHistory()
    {
        $leaves = Leave::all();
        return View::make('leaves.history')->with('leaves', $leaves);
    }
}
	
