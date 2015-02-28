<!-- app/views/balances/create.blade.php -->

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
        <a class="navbar-brand" href="{!! URL::to('balances') !!}">Balance Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{!! URL::to('balances') !!}">View All balances</a></li>
        <li><a href="{!! URL::to('balances/create') !!}">Create a Balance</a>
    </ul>
</nav>

<h1>Create a Balance</h1>

<!-- if there are creation errors, they will show here -->
{!! HTML::ul($errors->all()) !!}

{!! Form::open(array('url' => 'balances')) !!}

    <div class="form-group">
        {!! Form::label('teams_id', 'Team ID') !!}
        {!! Form::text('teams_id', Input::old('teams_id'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('sl_bal', 'SL Balance') !!}
        {!! Form::text('sl_bal', Input::old('sl_bal'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('vl_bal', 'VL Balance') !!}
        {!! Form::text('vl_bal', Input::old('vl_bal'), array('class' => 'form-control')) !!}
    </div>

    {!! Form::submit('Create the Balance!', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}

</div>
</body>
</html>