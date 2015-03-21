@extends('layouts.master')

@section('title')
    User - Profile Info
@stop

@section('pagetitle')
    Your profile information
@stop

@section('boxname')
    Your profile info
@stop

@section('right')
    <a class="btn bg-orange btn-xs" href="{{ URL::to('user/' . Auth::user()->id . '/edit') }}">Edit Information</a>
    <a class="btn bg-maroon btn-xs" href="{{ URL::to('user/' . Auth::user()->id . '/changepassword') }}">Change Password</a>
@stop

@section('content')
    @if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif
    <div class="col-md-6">

            <div class="box-header">
	            <i class="fa fa-user"></i>
	            <h3 class="box-title">PERSONAL INFORMATION</h3>
            </div><!-- /.box-header -->

            <div class="box-body">
                <dl class="dl-horizontal">
                    <dt>Username:</dt>
                    <dd>{!! Auth::user()->username !!}</dd>
                    <dt>Email:</dt>
                    <dd>{!! Auth::user()->email !!}</dd>
                    <dt>First Name:</dt>
                    <dd>{!! Auth::user()->firstname !!}</dd>
                    <dt>Last Name:</dt>
                    <dd>{!! Auth::user()->lastname !!}</dd>
                    
                </dl>
            </div><!-- /.box-body -->

            <div class="box-header">
	            <i class="fa fa-edit"></i>
	            <h3 class="box-title">LEAVE INFORMATION</h3>
            </div><!-- /.box-header -->

            <div class="box-body">
                <dl class="dl-horizontal">
                    <dt>Sick Leave Balance:</dt>
                    <dd>{!! Auth::user()->sl_bal !!}</dd>
                    <dt>Vacation Leave Balance:</dt>
                    <dd>{!! Auth::user()->vl_bal !!}</dd>
                </dl>
            </div><!-- /.box-body -->

			<div class="box-header">
	            <i class="fa fa-users"></i>
	            <h3 class="box-title">TEAM INFORMATION</h3>
            </div><!-- /.box-header -->

            <div class="box-body">
                <dl class="dl-horizontal">
                    <dt>Manager:</dt>
                    <dd>Need recursive association to user</dd>
                </dl>
            </div><!-- /.box-body -->

    </div><!-- ./col -->

@stop
