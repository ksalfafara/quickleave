@extends('layouts.master')

@section('title')
    Manager - Pending Leave Request(s)
@stop

@section('pagetitle')
    View Leave Request(s)
@stop

@section('boxname')
    Your Members' Leave Request(s)
@stop

@section('content')
    @if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif

<table id="pending" class="table table-bordered table-hover">
    <thead>
        <tr>
            <td>User</td>
            <td>Type of Leave</td>
            <td>From Date</td>
            <td>To Date</td>
            <td>Duration</td>
            <td>Note</td>
            <td>Date Created</td>
            <td>Status</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($leaves as $leave)
    @if(($leave->status) === 'Pending')
        @if((Auth::user()->team->team_name) === $leave->user->team->team_name)
        <tr>
            <td>{!! $leave->user->username!!}</td>
            <td>{!! $leave->type !!}</td>
            <td>{!! $leave->from_dt !!}</td>
            <td>{!! $leave->to_dt !!}</td>
            <td>{!! $leave->duration !!}</td>
            <td>{!! $leave->note !!}</td>
            <td>{!! $leave->created_at !!}</td>
            <td>{!! $leave->status !!}</td>
            <td>
                <a class="btn btn-small btn-info" href="{!! URL::to('leaves/pending/' . $leave->id . '/edit') !!}">Change Status</a>
            </td>
        </tr>
        @endif
    @endif
    @endforeach
    </tbody>
</table>
@stop
