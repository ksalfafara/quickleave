@extends('layouts.master')

@section('title')
    @if((Auth::user()->role) == 'manager')
    Manager - Edit Pending request
    @else
    User - Edit Pending request
    @endif
@stop

@section('pagetitle')
    Edit your <b>{!! $leave->type !!}</b> request from <b>{!! date("M d, Y",strtotime($leave->from_dt)) !!}</b> to <b>{!! date("M d, Y",strtotime($leave->to_dt)) !!}</b>
@stop

@section('breadcrumbs')
    <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="/leaves/pending">{{$leave->id}}</a></li>
    <li class="active"><a href="">Edit Request</a></li>
@stop

@section('content')
<div class="box box-warning">

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

{!! Form::model($leave, array('route' => array('leaves.update', $leave->id), 'method' => 'PUT')) !!}

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
        {!! Form::textarea('note', Input::old('note'), array('class' => 'form-control', 'size' => '30x3', 
        'placeholder' => '(Optional) Additional note')) !!}
    </div>

    {!! Form::submit('Submit changes', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}

</div>


 </div><!-- /.box-body -->
</div><!-- /.box -->
@stop

    
