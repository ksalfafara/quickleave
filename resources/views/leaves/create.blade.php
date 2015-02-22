
<!DOCTYPE html>
<html>
<head>
    <title>Create Leave Request</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{!! URL::to('leaves') !!}">Nerd Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{!! URL::to('leaves') !!}">View All Leave Request</a></li>
        <li><a href="{!! URL::to('leaves/create') !!}">Create a Nerd</a>
    </ul>
</nav>

<h1>Create a Nerd</h1>

<!-- if there are creation errors, they will show here -->
{!! HTML::ul($errors->all()) !!}

{!! Form::open(array('url' => 'leaves')) !!}

	<div class="form-group">
        {!! Form::label('type', 'Leave Type') !!}
        {!! Form::select('type', array('0' => 'Select leave type', 'SL' => 'Sick Leave', 'VL' => 'Vacation Leave'), Input::old('type'), array('class' => 'form-control')) !!}
       <!-- {!! Form::radio('type', 'SL', (Input::old('type') == 'SL')) !!}
        {!! Form::label('type', 'Sick Leave') !!}
        {!! Form::radio('type', 'VL', (Input::old('type') == 'VL')) !!}
        {!! Form::label('type', 'Vacation Leave') !!}-->
    </div>

    <div class="form-group">
        {!! Form::label('frm_dt', 'From Date') !!}
        {!! Form::text('frm_dt', Input::old('frm_dt'), array('class' => 'form-control', 'id' => 'frm_dt')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('to_dt', 'To Date') !!}
        {!! Form::text('to_dt', Input::old('to_dt'), array('class' => 'form-control','id' => 'to_dt')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('note', 'Reason/Note') !!}
        {!! Form::textarea('note', Input::old('note'), array('class' => 'form-control')) !!}
    </div>

    

    {!! Form::submit('Submit request', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}

</div>

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	 <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<script>
	  $(function() {
	    $( "#frm_dt" ).datepicker();
	    $( "#to_dt" ).datepicker();
	  });
	</script>

</body>
</html>
