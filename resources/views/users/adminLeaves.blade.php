@extends('layouts.master')

@section('title')
    Admin - All Requests
@stop

@section('pagetitle')
    Approved Requests
@stop

@section('boxname')
    Displaying All of Your Approved Requests
@stop

@section('content')
    @if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif

<table id="allrequest" class="table table-bordered table-hover">
    <thead>
        <tr>
            <td>Employee Name</td>
            <td>Type of Leave</td>
            <td>From Date</td>
            <td>To Date</td>
            <td>Duration</td>
            <td>Note</td>
            <td>Remarks</td>
            <td>Status</td>
            <td>Date & Time Approved</td>
        </tr>
    </thead>
    <tbody>
    @foreach($leaves as $key => $value)
    @if(($value->status) <> 'Pending')
        <tr>
            <td>{!! $value->user->firstname . ' ' . $value->user->lastname!!}</td>
            <td>{!! $value->type !!}</td>
            <td>{!! $value->from_dt !!}</td>
            <td>{!! $value->to_dt !!}</td>
            <td>{!! $value->duration !!}</td>
            <td>{!! $value->note !!}</td>
            <td>{!! $value->remark !!}</td>
            <td>{!! $value->status !!}</td>
            <td>{!! date("M d, Y - H:i",strtotime($value->updated_at)) !!}</td>
        </tr>
    @endif
    @endforeach
    </tbody>
</table>
@stop
