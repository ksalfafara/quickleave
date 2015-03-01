<!doctype html>
<html>
<head>
<title>Register</title>
</head>
<body>

{!! Form::open(array('url' => 'register')) !!}
<h1>Register</h1>

<!-- if there are login errors, show them here -->

<p>
    {!! Form::label('firstname', 'Firstname') !!}
    {!! Form::text('firstname', Input::old('firstname'))!!}
</p>

<p>
    {!! Form::label('lastname', 'Lastname') !!}
    {!! Form::text('lastname', Input::old('lastname'))!!}
</p>

<p>
    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email', Input::old('email'))!!}
</p>

<p>
    {!! Form::label('username', 'Username') !!}
    {!! Form::text('username', Input::old('username'))!!}
</p>

<p>
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password') !!}
</p>

<p>
    {!! Form::label('team_name', 'Team Name') !!}
    {!! Form::text('team_name', Input::old('team_name'))!!}
</p>

<p>
    {!! Form::label('team_code', 'Team Code') !!}
    {!! Form::text('team_code', Input::old('team_code'))!!}
</p>

<p>{!! Form::submit('Submit!') !!}</p>
{!! Form::close() !!}