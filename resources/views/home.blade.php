<!doctype html>
<html>
<head>
<title>HOME</title>
</head>
<body>

{!! Form::open(array('url' => 'home')) !!}
<h1>HOME</h1>

<!-- if there are login errors, show them here -->
<p>HELLO, user!
</p>
	<!-- LOGOUT BUTTON -->
	<a href="{{ URL::to('logout') }}">Logout</a>
{!! Form::close() !!}


