@extends('layouts.master')

@section('title')
    User - Pending request(s)
@stop

@section('pagetitle')
    Pending Requests
@stop

@section('boxname')
    Your Pending Request(s)
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
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($leaves as $leave)
    @if(($leave->status) == 'Pending')
        @if((Auth::user()->id) == $leave->user->id)
        <tr>
            <td>{!! $leave->type !!}</td>
            <td>{!! $leave->from_dt !!}</td>
            <td>{!! $leave->to_dt !!}</td>
            <td>{!! $leave->duration !!}</td>
            <td>{!! $leave->note !!}</td>
            <td>{!! date("M d, Y - H:i",strtotime($leave->created_at)) !!}</td>
            <td>{!! date("M d, Y - H:i",strtotime($leave->updated_at)) !!}</td>
            <td>
                <a class="btn btn-small btn-info" href="{!! URL::to('leaves/' . $leave->id . '/edit') !!}">Edit</a>
            
                {!! Form::open(array('url' => 'leaves/' . $leave->id . '/delete', 'class' => 'btn')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Delete', array('class' => 'btn btn-warning')) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endif
    @endif
    @endforeach
    </tbody>
</table>
@stop
