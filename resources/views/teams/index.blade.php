<!-- app/views/teams/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>QUICKLEAVE - Teams</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{!! URL::to('/') !!}">Quickleave</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{!! URL::to('teams') !!}">View All Teams</a></li>
        <li><a href="{!! URL::to('teams/create') !!}">Create a Team</a>
    </ul>
</nav>

<h1>All the Teams</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Team Name</td>
            <td>Team Code</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($teams as $key => $value)
        <tr>
            <td>{!! $value->id !!}</td>
            <td>{!! $value->name !!}</td>
            <td>{!! $value->code !!}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                {!! Form::open(array('url' => 'teams/' . $value->id, 'class' => 'pull-right')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Delete this Team', array('class' => 'btn btn-warning')) !!}
                {!! Form::close() !!}

                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('teams/' . $value->id) }}">Show this Team</a>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('teams/' . $value->id . '/edit') }}">Edit this Team</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>