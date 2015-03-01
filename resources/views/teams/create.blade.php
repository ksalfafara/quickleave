@extends('layouts.master')

@section('title')
    Admin Board
@stop

@section('pagetitle')
    Dashboard
@stop

@section('content')
    {!! HTML::ul($errors->all()) !!}

    {!! Form::open(array('url' => 'teams')) !!}

        <div class="form-group">
            {!! Form::label('name', 'Team Name') !!}
            {!! Form::text('name', Input::old('name'), array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('code', 'Team Code') !!}
            {!! Form::text('code', Input::old('code'), array('class' => 'form-control')) !!}
        </div>

        {!! Form::submit('Create the Team!', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}

@stop
