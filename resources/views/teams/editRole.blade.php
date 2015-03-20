@extends('layouts.master')

@section('title')
    Admin - Team Roles
@stop

@section('pagetitle')
    Edit Team Roles
@stop
	
@section('boxname')
	Edit {!! $member->firstname !!}'s Role
@stop

@section('content') 

    {!! HTML::ul($errors->all()) !!}

    {!! Form::model($member, array('route' => array('teams.updateRole', $member->id), 'method' => 'PUT')) !!}

        <div class="form-group">
            {!! Form::label('role', 'Role') !!}
            {!! Form::select('role', array('' => 'Select a role', 'admin' => 'Administrator', 'manager' => 'Manager', 'member' => 'Member'), Input::old('role'), array('class' => 'form-control')) !!}
        </div>

        {!! Form::submit('Save changes', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}

@stop