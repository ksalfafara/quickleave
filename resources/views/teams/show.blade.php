<!-- app/views/nerds/show.blade.php -->

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
        <a class="navbar-brand" href="{!! URL::to('teams') !!}">Nerd Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{!! URL::to('teams') !!}">View All Teams</a></li>
        <li><a href="{!! URL::to('teams/create') !!}">Create a Team</a>
    </ul>
</nav>

<h1>Showing {!! $team->name !!}</h1>

    <div class="jumbotron text-center">
        <h2>{!! $team->name !!}</h2>
        <p>
            <strong>Code:</strong> {!! $team->code !!}<br>
        </p>
    </div>

</div>
</body>
</html>
