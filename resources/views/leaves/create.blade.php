@extends('layouts.master')

@section('title')
    User - Request a leave
@stop

@section('pagetitle')
    File a request for leave
@stop

@section('boxname')
	Fill out the form
@stop

@section('content')
    @if ($errors->has())
        <div class="alert alert-danger">
          <i><strong>Whoops!</strong> There were some problems with your input.</i><br><br>
            @foreach ($errors->all() as $error)
                {{ $error }}<br>        
            @endforeach
        </div>
    @endif

    @if (Session::has('message'))
        <div class="alert alert-info">{!! Session::get('message') !!}</div>
    @endif

    {!! HTML::ul($errors->all()) !!}

    {!! Form::open(array('url' => 'leaves')) !!}

    <div class="form-group">
        {!! Form::label('type', 'LEAVE TYPE') !!}
        <div class="input-group">
        {!! Form::select('type', array('' => 'Select leave type ', 'SL' => 'Sick Leave', 'VL' => 'Vacation Leave'), Input::old('type'), array('class' => 'form-control', 'required' => 'required')) !!}
        <div class="input-group-addon">
                        <i class="fa fa-chevron-down"></i>
                      </div>
        </div>

        <!--
        {!! Form::label('type', 'Leave Type:') !!} &nbsp; &nbsp;
        {!! Form::radio('type', 'SL', (Input::old('type') == 'SL')) !!} &nbsp;
        {!! Form::label('type', 'Sick Leave') !!} &nbsp; &nbsp;
        {!! Form::radio('type', 'VL', (Input::old('type') == 'VL')) !!}&nbsp;
        {!! Form::label('type', 'Vacation Leave') !!}
        -->
    </div>


    <div class="form-group">
        {!! Form::label('from_dt', 'FROM DATE') !!}
            <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
            {!! Form::text('from_dt', Input::old('from_dt'), array('class' => 'form-control', 'id' => 'from_dt',
            'placeholder' => 'Pick a date','required' => 'required' )) !!} 
            </div>
          
    </div>
 
    <div class="form-group">
        {!! Form::label('to_dt', 'TO DATE') !!}
            <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
            {!! Form::text('to_dt', Input::old('to_dt'), array('class' => 'form-control','id' => 'to_dt', 
            'placeholder' => 'Pick a date', 'required' => 'required')) !!}
            </div>
    </div>


    <div class="form-group">
        {!! Form::label('note', 'Reason/Note') !!}
        {!! Form::textarea('note', Input::old('note'), array('class' => 'form-control', 'size'=> '30x3','placeholder' => '(Optional) Additional note')) !!}
    </div>

    {!! Form::submit('Submit request', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}

</div>
@stop

    
