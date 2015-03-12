@extends('layouts.master')

@section('title')
    Manager - Pending request(s)
@stop

@section('pagetitle')
    View Request/s
@stop

@section('boxname')
    Your member's request
@stop

@section('content')
    @if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Type of Leave</td>
            <td>From Date</td>
            <td>To Date</td>
            <td>Duration</td>
            <td>Note</td>
            <td>Date Created</td>
            <td>Last Updated</td>
            <td>Status</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($leaves as $key => $value)
    @if(($value->status) === 'Pending')
        <tr>
            <td>{!! $value->type !!}</td>
            <td>{!! $value->from_dt !!}</td>
            <td>{!! $value->to_dt !!}</td>
            <td>{!! $value->duration !!}</td>
            <td>{!! $value->note !!}</td>
            <td>{!! $value->created_at !!}</td>
            <td>{!! $value->updated_at !!}</td>
            <td>{!! $value->status !!}</td>
            <td>
                <a class="btn btn-small btn-info" href="{!! URL::to('pending/' . $value->id . '/edit') !!}">Change Remark</a>
            </td>
        </tr>
    @endif
    @endforeach
    </tbody>
</table>
@stop
