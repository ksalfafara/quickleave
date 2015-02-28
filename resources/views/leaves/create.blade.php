
<!DOCTYPE html>
<html>
<head>
    <title>Create Leave Request</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    
    <!--<link rel="stylesheet" type="text/css" href="/css/jquery-ui/jquery-ui.min.css">-->
    <link rel="stylesheet" type="text/css" href="/dpskin/css/datepicker.css">
    <script src="external/jquery/jquery.js"></script>
    <script src="jquery-ui.min.js"></script> 

</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{!! URL::to('/') !!}">QUICKLEAVE</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{!! URL::to('leaves') !!}">View All Leave Request</a></li>
        <li><a href="{!! URL::to('leaves/create') !!}">Request a Leave</a>
    </ul>
</nav>

<h1>Create a Leave</h1>

<!-- if there are creation errors, they will show here -->
{!! HTML::ul($errors->all()) !!}

{!! Form::open(array('url' => 'leaves')) !!}

	<div class="form-group">
        {!! Form::label('type', 'Leave Type') !!}
        {!! Form::select('type', array('' => 'Select leave type', 'SL' => 'Sick Leave', 'VL' => 'Vacation Leave'), Input::old('type'), array('class' => 'form-control')) !!}
       <!-- {!! Form::radio('type', 'SL', (Input::old('type') == 'SL')) !!}
        {!! Form::label('type', 'Sick Leave') !!}
        {!! Form::radio('type', 'VL', (Input::old('type') == 'VL')) !!}
        {!! Form::label('type', 'Vacation Leave') !!}-->
    </div>

    <div class="form-group">
        {!! Form::label('from_dt', 'From Date') !!}
        {!! Form::text('from_dt', Input::old('from_dt'), array('class' => 'form-control', 'id' => 'from_dt',
        'placeholder' => 'Pick a date')) !!} 
    </div>

    <div class="form-group">
        {!! Form::label('to_dt', 'To Date') !!}
        {!! Form::text('to_dt', Input::old('to_dt'), array('class' => 'form-control','id' => 'to_dt', 
        'placeholder' => 'Pick a date')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('note', 'Reason/Note') !!}
        {!! Form::textarea('note', Input::old('note'), array('class' => 'form-control', 'placeholder' => '(Optional) Additional note')) !!}
    </div>

    {!! Form::submit('Submit request', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}

</div>

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
  <script>
  $(function() {
        $( "#from_dt" ).datepicker({ 
            dateFormat: 'yy-mm-dd',
            showOtherMonths: true,  
            dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'], 
        });
        $( "#to_dt" ).datepicker({ 
            dateFormat: 'yy-mm-dd' 
        });
  });
  </script> 

</body>
</html>
