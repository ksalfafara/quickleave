<!-- app/views/balances/edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
        <li><a href="{!! URL::to('balances') !!}">View All Balances</a></li>
    </ul>
</nav>

<h1>Edit {!! $balance->firstname !!}'s Balances</h1>

<!-- if there are creation errors, they will show here -->
{!! HTML::ul($errors->all()) !!}

{!! Form::model($balance, array('route' => array('balances.update', $balance->id), 'method' => 'PUT')) !!}

    <div class="form-group">
        {!! Form::label('sl_bal', 'SL Balance') !!}
        {!! Form::input('number','sl_bal', null, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('vl_bal', 'VL Balance') !!}
        {!! Form::input('number','vl_bal', null, array('class' => 'form-control')) !!}
    </div>

    {!! Form::submit('Edit the Balance!', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}

</div>
</body>
</html>