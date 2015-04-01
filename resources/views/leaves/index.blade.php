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
    @if((Auth::user()->role) == 'manager')
    <li><a href="/manager"><i class="fa fa-home"></i> Manager Dashboard</a></li>
    @elseif((Auth::user()->role) == 'member')
    <li><a href="/user"><i class="fa fa-home"></i> User Dashboard</a></li>
    @endif
    <li class="active"><a href="">{!! Auth::user()->username !!}</a></li>
    <li class="active"><a href="">All Request</a></li>
@stop

@section('content')
<div class="box box-warning">

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
    @foreach($leaves as $key => $value)
        @if(Auth::user()->id == $value->user->id)
        <tr>
            <td>{!! $value->type !!}</td>
            <td>{!! $value->from_dt !!}</td>
            <td>{!! $value->to_dt !!}</td>
            <td>{!! $value->duration !!}</td>
            <td>{!! $value->note !!}</td>
            <td>{!! $value->remark !!}</td>
            <td>@if($value->status == 'approved')
                    <button class="btn btn-xs btn-block btn-success">Approved</button>
                @elseif($value->status == 'pending')
                    <button class="btn btn-xs btn-block btn-warning">Pending</button>
                @else
                    <button class="btn btn-xs btn-block btn-danger">Rejected</button>
                @endif</td>
            <td>{!! date("M d, Y - H:i",strtotime($value->updated_at)) !!}</td>
        </tr>
        @endif
    @endforeach
    </tbody>
</table>

  </div><!-- /.box-body -->
</div><!-- /.box -->
@stop
