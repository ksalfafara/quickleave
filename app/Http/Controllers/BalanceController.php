<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Datetime;

use Illuminate\Http\Request;
use App\User;
use App\Team;
use DB;
use Auth ,View, Input, Session, Redirect, Validator;

class BalanceController extends Controller {

	public function __construct()
	{
		$this->middleware('auth'); //change later to auth
	}
	
	public function index()
	{
		$balance = User::all();
		return View::make('balances.index')->with('balances', $balance); 
	}

	public function edit($id)
	{
		$balance = User::find($id);
		return View::make('balances.edit')->with('balance',$balance);
	}

	public function update($id)
	{
        $rules = array(
        	'date_hired' => 'required',
            'sl_bal' => 'required',
            'vl_bal' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('balances/' . $id . '/edit')
                ->withErrors($validator);
        } 
        else {
        $balance = User::find($id);

        $balance->date_hired = Input::get('date_hired');
        $balance->sl_bal = Input::get('sl_bal');
        $balance->vl_bal = Input::get('vl_bal');

        $balance->save();

        Session::flash('message', 'Successfully updated balance(s) for '.$balance->firstname.'!');
        return Redirect::to('balances');
    	}
	}
}
