@extends('layouts.master')

@section('title')
    Admin - Create a Team
@stop

@section('pagetitle')
    Create a Team
@stop

@section('boxname')
    Create a team and designate the code to the members
@stop

@section('content')
    @if ($errors->has())
        <div class="alert alert-danger">
          <i><strong>Whoops!</strong> There were some problems with your input.</i><br><br>
            @foreach ($errors->all() as $error)
                {{ $error }}<br>        
            @endforeach
        </div>
    @endif


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