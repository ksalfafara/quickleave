<!-- app/views/teams/edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
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

<h1>Edit {!! $team->name !!}</h1>

<!-- if there are creation errors, they will show here -->
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

</div>
</body>
</html>