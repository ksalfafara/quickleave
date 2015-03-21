@extends('layouts.master')

@section('title')
    Manager - All Request(s) from team
@stop

@section('pagetitle')
    Approved/Rejected Leave Request(s) of Members
@stop

@section('boxname')
    Approved/Rejected Leave Request(s) of Members
@stop

@section('content')
    @if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif

<table id="teamrequest" class="table table-bordered table-hover">
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
    @foreach($leaves as $leave)
    @if(($leave->status) <> 'Pending')
        @if((Auth::user()->team->team_name) == $leave->user->team->team_name)
        <tr>
            <td>{!! $leave->type !!}</td>
            <td>{!! $leave->from_dt !!}</td>
            <td>{!! $leave->to_dt !!}</td>
            <td>{!! $leave->duration !!}</td>
            <td>{!! $leave->note !!}</td>
            <td>{!! $leave->remark !!}</td>
            <td>{!! $leave->status !!}</td>
            <td>{!! $leave->updated_at !!}</td>
        </tr>
        @endif
    @endif
    @endforeach
    </tbody>
</table>
@stop
