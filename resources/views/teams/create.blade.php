@extends('layouts.master')

@section('title')
    Admin - Create a Team
@stop

@section('pagetitle')
    Create a Team
@stop

@section('boxname')

@stop

@section('content')
    {!! HTML::ul($errors->all()) !!}

    {!! Form::open(array('url' => 'teams')) !!}

        <div class="form-group">
            {!! Form::label('team_name', 'Team Name') !!}
            {!! Form::text('team_name', Input::old('team_name'), array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('team_code', 'Team Code') !!}
            {!! Form::text('team_code', Input::old('team_code'), array('class' => 'form-control')) !!}
        </div>

        {!! Form::submit('Create the Team', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}
@stop