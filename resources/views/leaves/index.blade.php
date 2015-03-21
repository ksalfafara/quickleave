@extends('layouts.master')

@section('title')
    User - All Request(s)
@stop

@section('pagetitle')
    All Approved/Rejected Leave Request(s)
@stop

@section('boxname')
    All Approved/Rejected Leave Request(s)
@stop

@section('content')
    @if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif

<table id="allrequest" class="table table-bordered table-hover">
    <thead>
        <tr>
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
        @if((Auth::user()->id) === $value->user->id)
        <tr>
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
    @endif
    @endforeach
    </tbody>
</table>
@stop
