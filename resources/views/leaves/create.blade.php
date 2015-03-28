@extends('layouts.master')

@section('title')
    User - Request a leave
@stop

@section('pagetitle')
    File a request for leave
@stop

@section('breadcrumbs')
    @if((Auth::user()->role) == 'manager')
    <li><a href="/manager"><i class="fa fa-home"></i> Manager Dashboard</a></li>
    @elseif((Auth::user()->role) == 'member')
    <li><a href="/user"><i class="fa fa-home"></i> User Dashboard</a></li>
    @endif
    <li class="active"><a href="">Edit Request</a></li>
@stop

@section('content')
<div class="box box-warning">
    <div class="box-header with-border">
            Fill out the form. Choose between Sl/VL leave type. Reason/Note is required for Manager's decision.
    <div class="box-tools pull right"></div>
    </div>

    <div class="box-body table-responsive">
       
        @if (Session::has('message'))
        <div class="alert alert-info">{!! Session::get('message') !!}</div>
        @endif
        @if ($errors->has())
            <div class="alert alert-danger">
              <i><strong>Whoops!</strong> There were some problems with your input.</i><br><br>
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>        
                @endforeach
            </div>
        @endif

    {!! Form::open(array('url' => 'leaves')) !!}

    <div class="form-group">
        {!! Form::label('type', 'LEAVE TYPE') !!}
        <div class="input-group">
        {!! Form::select('type', array('' => 'Select leave type ', 'SL' => 'Sick Leave', 'VL' => 'Vacation Leave'), Input::old('type'), array('class' => 'form-control', 'required' => 'required')) !!}
        <div class="input-group-addon">
                        <i class="fa fa-chevron-down"></i>
                      </div>
        </div>
    
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
        {!! Form::label('note', 'REASON/NOTE') !!}
        {!! Form::textarea('note', Input::old('note'), array('class' => 'form-control', 'size'=> '30x3','placeholder' => 'Additional note', 'required' => 'required')) !!}
    </div>

    {!! Form::submit('Submit request', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}

</div>

  </div><!-- /.box-body -->
</div><!-- /.box -->
@stop

    
