<!-- app/views/teams/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Create Team</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{!! URL::to('teams') !!}">Team Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{!! URL::to('teams') !!}">View All Teams</a></li>
        <li><a href="{!! URL::to('teams/create') !!}">Create a Team</a>
    </ul>
</nav>

<h1>Create a Team</h1>

<!-- if there are creation errors, they will show here -->
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

</div>
</body>
</html>