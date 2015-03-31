@extends('layouts.master')

@section('title')
    Manager - Edit a leave
@stop

@section('pagetitle')
    Edit <b>{!! $leave->user->username !!}</b>'s <b>{!! $leave->type !!}</b> request from <b>{!! date("M d, Y",strtotime($leave->from_dt)) !!}</b> to <b>{!! date("M d, Y",strtotime($leave->to_dt)) !!}</b>
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
           Select either <b>Approved/Rejected</b> status. If Rejected, kindly input the reason. 
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


{!! Form::model($leave, array('route' => array('leaves.updatePending', $leave->id), 'method' => 'PUT')) !!}

    <div class="form-group">
        {!! Form::label('status', 'Status') !!}
        <div class="input-group">
        {!! Form::select('status', array('' => 'Select status ', 'approved' => 'Approved', 'rejected' => 'Rejected'), Input::old('status'), array('class' => 'form-control')) !!}
        <div class="input-group-addon">
                        <i class="fa fa-chevron-down"></i>
                      </div>
    </div>
    <br>

    <div class="form-group">
        {!! Form::label('remark', "Manager's Remark") !!}
        {!! Form::textarea('remark', Input::old('remark'), array('class' => 'form-control', 'size' => '30x3', 'placeholder' => 
        'If request is rejected, input the reason.')) !!}
    </div>

    

    </div>

    {!! Form::submit('Submit changes', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}

</div>
  </div><!-- /.box-body -->
</div><!-- /.box -->
@stop
