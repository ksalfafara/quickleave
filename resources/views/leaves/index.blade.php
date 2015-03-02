@extends('layouts.usermaster')

@section('title')
    User - Pending request(s)
@stop

@section('pagetitle')
    View Request
@stop

@section('boxname')
    Your pending request/s
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
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($leaves as $key => $value)
    @if(($value->status) === 'Pending')
        <tr>
            <td>{!! $value->id !!}</td>
            <td>{!! $value->type !!}</td>
            <td>{!! $value->from_dt !!}</td>
            <td>{!! $value->to_dt !!}</td>
            <td>{!! $value->duration !!}</td>
            <td>{!! $value->note !!}</td>
            <td>{!! $value->remark !!}</td>
            <td>{!! $value->status !!}</td>
            <td>
                <a class="btn btn-small btn-info" href="{!! URL::to('leaves/' . $value->id . '/edit') !!}">Edit this Request</a>
            
                {!! Form::open(array('url' => 'leaves/' . $value->id, 'class' => 'btn')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Delete this Request', array('class' => 'btn btn-warning')) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endif
    @endforeach
    </tbody>
</table>
@stop
