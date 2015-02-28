<!-- app/views/balances/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>QUICKLEAVE - balances</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{!! URL::to('/') !!}">Quickleave</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{!! URL::to('balances') !!}">View All balances</a></li>
        <li><a href="{!! URL::to('balances/create') !!}">Create a Balance</a>
    </ul>
</nav>

<h1>All the balances</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Team Name</td>
            <td>Employee Name</td>
            <td>SL Balance</td>
            <td>VL Balance</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($balances as $key => $value)
        <tr>
            <td>{!! $value->teams_id !!}</td>
            <td>{!! $value->firstname !!}</td>
            <td>{!! $value->sl_bal !!}</td>
            <td>{!! $value->vl_bal !!}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                {!! Form::open(array('url' => 'balances/' . $value->id, 'class' => 'pull-right')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Delete this Balance', array('class' => 'btn btn-warning')) !!}
                {!! Form::close() !!}

                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('balances/' . $value->id) }}">Show this Balance</a>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('balances/' . $value->id . '/edit') }}">Edit this Balance</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>