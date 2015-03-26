@extends('layouts.master')

@section('title')
    Manager - Pending Leave Request(s)
@stop

@section('pagetitle')
    Pending Requests from <b>{!! Auth::user()->team->team_name !!}</b>'s Members
@stop

@section('breadcrumbs')
    @if((Auth::user()->role) == 'manager')
    <li><a href="/manager"><i class="fa fa-home"></i> Manager Dashboard</a></li>
    @elseif((Auth::user()->role) == 'member')
    <li><a href="/user"><i class="fa fa-home"></i> User Dashboard</a></li>
    @endif
    <li class="active"><a href="">{!! Auth::user()->team->team_name !!}</a></li>
    <li class="active"><a href="">Pending Requests</a></li>
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

<table id="table" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>User</th>
            <th>Type of Leave</th>
            <th>From Date</th>
            <th>To Date</th>
            <th>Duration</th>
            <th>Note</th>
            <th>Date Created</th>
            <th>Status</th>
            <th>Actions</th>
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
  </div><!-- /.box-body -->
</div><!-- /.box -->
@stop
