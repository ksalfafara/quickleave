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

    {!! Form::model($member, array('route' => array('roles.update', $member->id), 'method' => 'PUT')) !!}

        <div class="form-group">
            {!! Form::label('is_manager', 'Role') !!}
            {!! Form::select('is_manager', array('' => 'Select a role', '1' => 'Manager', '0' => 'Member'), Input::old('is_manager'), array('class' => 'form-control')) !!}
        </div>

        {!! Form::submit('Edit the role', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}

@stop