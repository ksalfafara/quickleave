@extends('layouts.master')

@section('title')
    Manager - All Request(s) from team
@stop

@section('pagetitle')
    Approved/Rejected Leave Request(s) of <b>{!! Auth::user()->team->team_name !!}</b>'s Members
@stop

@section('breadcrumbs')
    @if((Auth::user()->role) == 'manager')
    <li><a href="/manager"><i class="fa fa-home"></i> Manager Dashboard</a></li>
    @elseif((Auth::user()->role) == 'member')
    <li><a href="/user"><i class="fa fa-home"></i> User Dashboard</a></li>
    @endif
    <li class="active"><a href="">{!! Auth::user()->team->team_name !!}</a></li>
    <li class="active"><a href="">History</a></li>
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
            <th>Employee Name</th>
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
    @foreach($leaves as $leave)
        @if($leave->status <> 'pending')
            @if((Auth::user()->team->team_name) == $leave->user->team->team_name)
            <tr>
                <td>{!! $leave->user->firstname . ' ' . $leave->user->lastname !!}
                <td>{!! $leave->type !!}</td>
                <td>{!! $leave->from_dt !!}</td>
                <td>{!! $leave->to_dt !!}</td>
                <td>{!! $leave->duration !!}</td>
                <td>{!! $leave->note !!}</td>
                <td>{!! $leave->remark !!}</td>
                <td>
                    @if(($leave->status) == 'approved')
                        <button class="btn btn-success btn-xs">Approved</button>
                    @else
                        <button class="btn btn-danger btn-xs">Rejected</button>
                    @endif

                </td>
                <td>{!! $leave->updated_at !!}</td>
            </tr>
            @endif
        @endif
    @endforeach
    </tbody>
</table>
  </div><!-- /.box-body -->
</div><!-- /.box -->
@stop
