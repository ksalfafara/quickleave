@extends('layouts.master')

@section('title')
    Change Password
@stop

@section('pagetitle')
    Change Password
@stop
    
@section('boxname')
    {!! Auth::user()->username !!}'s Password
@stop

@section('right')

@stop

@section('content') 
    @if (Session::has('message'))
        <div class="alert alert-danger">{!! Session::get('message') !!}</div>
    @endif

    @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>        
            @endforeach
        </div>
    @endif

    {!! Form::model($user, array('route' => array('users.updatePass', $user->id), 'method' => 'PUT')) !!}

    <div class="col-md-6">

            <div class="box-header">
                <i class="fa fa-lock"></i>
                <h3 class="box-title">Password</h3>
            </div><!-- /.box-header -->

            <div class="box-body">
                <dl class="dl-horizontal">
                    <dt>Old Password:</dt>
                    <dd>{!! Form::password('old_password', array('class' => 'form-control', 'Placeholder' => 'Input old password')) !!} </dd> <br>
                    <dt>New Password:</dt>
                    <dd>{!! Form::password('new_password', array('class' => 'form-control', 'Placeholder' => 'Input new password')) !!} </dd> <br>
                    <dt>Re-type Password:</dt>
                    <dd>{!! Form::password('retype_password', array('class' => 'form-control', 'Placeholder' => 'Retype password')) !!} </dd> 
                </dl>
            </div><!-- /.box-body -->


           <center> {!! Form::submit('Save changes', array('class' => 'btn btn-primary')) !!} </center>
    </div><!-- ./col -->
       

    {!! Form::close() !!}

@stop
