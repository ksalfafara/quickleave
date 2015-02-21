<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Leave;
use View;
use Input;
use Session;
use Redirect;

class LeaveController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// get all the requests
        $leaves = Leave::all();

        // load the view and pass the leaves
        return View::make('leaves.index')
            ->with('leaves', $leaves);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('leaves.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
            // store
            $leave = new Leave();
            $leave->type 	= Input::get('type');
            $leave->from_dt = Input::get('frm_dt');
            $leave->to_dt 	= Input::get('to_dt');
            $leave->note 	= Input::get('note');
            $leave->save();

            // redirect
            Session::flash('message', 'Your request has been submitted.!');
            return Redirect::to('leaves');
       
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
