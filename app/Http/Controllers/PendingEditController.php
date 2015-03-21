<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Leave;
use App\Team;
use App\User;
use DB;
use View, Input, Session, Redirect, Validator;

use Illuminate\Http\Request;

class PendingEditController extends Controller {

        public function __construct()
        {
                $this->middleware('auth'); //change later to auth
        }
        public function index()
        {
                $leaves = Leave::all();
                $user = User::all();
                return View::make('pending.index')->with('leaves', $leaves);
        }

         public function showHistory()
    {
                $leaves = Leave::all();
                return View::make('pending.teamrequest')->with('leaves', $leaves);
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
                //
        }

        public function edit($id)
        {
                $leave = Leave::find($id);
                return View::make('pending.edit')->with('leave',$leave);
        }

        public function update($id)
        {
            $rules = array(
            'status' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('pending/' . $id . '/edit')
                ->withErrors($validator);
        } else {
        $leave = Leave::find($id);
        $leave->status = Input::get('status');
        $leave->remark = Input::get('remark');

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
            
        $duration = $leave->duration;
        DB::table('users')->where('id', $user)->decrement($type, $duration);
        }
        $leave->save();

        Session::flash('message', 'Successfully updated Leave Request '.$leave->id.'!');
        return Redirect::to('pending');
        }
        }

        public function destroy($id)
        {
                //      
        }

}
