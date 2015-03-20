@extends('layouts.master')

@section('title')
    Admin - Edit a Team
@stop

@section('pagetitle')
    Edit a Team
@stop

@section('boxname')
    Edit {!! $team->team_name !!}
@stop

@section('content')
    {!! HTML::ul($errors->all()) !!}
    {!! Form::model($team, array('route' => array('teams.update', $team->id), 'method' => 'PUT')) !!}

        <div class="form-group">
            {!! Form::label('team_name', 'Team Name') !!}
            {!! Form::text('team_name', null, array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('team_code', 'Team Code') !!}
            {!! Form::text('team_code', null, array('class' => 'form-control')) !!}
        </div>

        {!! Form::submit('Submit Changes', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}
@stop