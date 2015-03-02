@extends('layouts.managermaster')

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

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Type of Leave</td>
            <td>From Date</td>
            <td>To Date</td>
            <td>Duration</td>
            <td>Note</td>
            <td>Remarks</td>
            <td>Status</td>
        </tr>
    </thead>
    <tbody>
    @foreach($leaves as $key => $value)
    @if(($value->status) <> 'Pending')
        <tr>
            <td>{!! $value->id !!}</td>
            <td>{!! $value->type !!}</td>
            <td>{!! $value->from_dt !!}</td>
            <td>{!! $value->to_dt !!}</td>
            <td>{!! $value->duration !!}</td>
            <td>{!! $value->note !!}</td>
            <td>{!! $value->remark !!}</td>
            <td>{!! $value->status !!}</td>
        </tr>
    @endif
    @endforeach
    </tbody>
</table>
@stop
