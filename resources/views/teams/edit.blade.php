@extends('layouts.master')

@section('title')
    Admin - Edit a Team
@stop

@section('pagetitle')
    Edit a Team
@stop

@section('boxname')
    Edit {!! $team->name !!}
@stop

@section('content')
    {!! HTML::ul($errors->all()) !!}

    {!! Form::model($team, array('route' => array('teams.update', $team->id), 'method' => 'PUT')) !!}

        <div class="form-group">
            {!! Form::label('name', 'Team Name') !!}
            {!! Form::text('name', null, array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('code', 'Team Code') !!}
            {!! Form::text('code', null, array('class' => 'form-control')) !!}
        </div>

        {!! Form::submit('Edit the Team!', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}
@stop