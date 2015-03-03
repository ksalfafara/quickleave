@extends('layouts.managermaster')

@section('title')
    Manager - Edit a leave
@stop

@section('pagetitle')
    Edit a request
@stop

@section('boxname')
    Edit leave #{!! $leave->id !!}
@stop

@section('content')
 <!-- if there are creation errors, they will show here -->


{!! HTML::ul($errors->all()) !!}

{!! Form::model($leave, array('route' => array('managerleaves.update', $leave->id), 'method' => 'PUT')) !!}

    <div class="form-group">
        {!! Form::label('type', 'Leave Type') !!}
        {!! Form::select('type', array('' => 'Select leave type', 'SL' => 'Sick Leave', 'VL' => 'Vacation Leave'), Input::old('type'), array('class' => 'form-control')) !!}
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
        {!! Form::textarea('note', Input::old('note'), array('class' => 'form-control', 'size' => '30x3', 'placeholder' => 
        '(Optional) Additional note')) !!}
    </div>

    {!! Form::submit('Submit changes', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}

</div>
@stop

    
