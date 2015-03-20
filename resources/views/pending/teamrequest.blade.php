@extends('layouts.master')

@section('title')
    Manager - All Request(s) from team
@stop

@section('pagetitle')
    All submitted requests by your members
@stop

@section('boxname')
    Displaying all of approved/rejected requests of your members
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
    @foreach($leaves as $key => $value)
    @if(($value->status) <> 'Pending')
        @if((Auth::user()->team->team_name) === $value->user->team->team_name)
        <tr>
            <td>{!! $value->type !!}</td>
            <td>{!! $value->from_dt !!}</td>
            <td>{!! $value->to_dt !!}</td>
            <td>{!! $value->duration !!}</td>
            <td>{!! $value->note !!}</td>
            <td>{!! $value->remark !!}</td>
            <td>{!! $value->status !!}</td>
            <td>{!! $value->updated_at !!}</td>
        </tr>
        @endif
    @endif
    @endforeach
    </tbody>
</table>
@stop
