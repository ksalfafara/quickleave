@extends('layouts.master')

@section('title')
    @if((Auth::user()->role) == 'manager')
    Manager - All request(s)
    @else
    User - All request(s)
    @endif
@stop

@section('pagetitle')
    All Leave Request(s)
@stop

@section('breadcrumbs')
    <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">All Leave Requests</li>
@stop

@section('content')

@foreach($leaves as $key => $value)
@if(Auth::user()->id == $value->user->id)
@if($value->status == 'pending')
<div class="box box-warning">
    <div class="box-body table-responsive">
        @if (Session::has('message'))
        <div class="alert alert-info">{!! Session::get('message') !!}</div>
        @endif
        

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Type of Leave</th>
            <th>From Date</th>
            <th>To Date</th>
            <th>Duration</th>
            <th>Note</th>
            <th>Remarks</th>
            <th>Status</th>
            <th>Date & Time Approved</th>
        </tr>
    </thead>
    <tbody>
    
        
        <tr>
            <td>{!! $value->type !!}</td>
            <td>{!! $value->from_dt !!}</td>
            <td>{!! $value->to_dt !!}</td>
            <td>{!! $value->duration !!}</td>
            <td>{!! $value->note !!}</td>
            <td>{!! $value->remark !!}</td>
            <td>@if($value->status == 'pending')
                    <span class="label label-warning">Pending</span>
                @endif</td>
            <td>{!! date("M d, Y - H:i",strtotime($value->updated_at)) !!}</td>
        </tr>
   
    </tbody>
</table>

  </div><!-- /.box-body -->
</div><!-- /.box -->
@endif
@endif


@if(Auth::user()->id == $value->user->id)
@if($value->status <> 'pending')

<div class="box box-primary fixed-box">
    <div class="box-body table-responsive">
        @if (Session::has('message'))
        <div class="alert alert-info">{!! Session::get('message') !!}</div>
        @endif
        

<table id="table" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Type of Leave</th>
            <th>From Date</th>
            <th>To Date</th>
            <th>Duration</th>
            <th>Note</th>
            <th>Remarks</th>
            <th>Status</th>
            <th>Date & Time Approved</th>
        </tr>
    </thead>
    <tbody>
        @if(Auth::user()->id == $value->user->id)
        <tr>
            <td>{!! $value->type !!}</td>
            <td>{!! $value->from_dt !!}</td>
            <td>{!! $value->to_dt !!}</td>
            <td>{!! $value->duration !!}</td>
            <td>{!! $value->note !!}</td>
            <td>{!! $value->remark !!}</td>
            <td>@if($value->status == 'approved')
                    <span class="label label-success">Approved</span>
                @elseif($value->status == 'rejected')
                    <span class="label label-primary">Rejected</span>
                @endif</td>
            <td>{!! date("M d, Y - H:i",strtotime($value->updated_at)) !!}</td>
        </tr>
        @endif
    </tbody>
</table>

  </div><!-- /.box-body -->
</div><!-- /.box -->
@endif
@endif
@endforeach
@stop
