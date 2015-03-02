@extends('layouts.master')

@section('title')
    Admin - Teams
@stop

@section('pagetitle')
    Leave Balances
@stop

@section('boxname')

@stop

@section('content')
    @if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Team Name</td>
            <td>Employee Name</td>
            <td>SL Balance</td>
            <td>VL Balance</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($balances as $balance)
        <tr>
            <td>{!! $balance->team->name !!}</td>
            <td>{!! $balance->firstname !!}</td>
            <td>{!! $balance->sl_bal !!}</td>
            <td>{!! $balance->vl_bal !!}</td>

            <!--edit and delete buttons -->
            <td>
                <a class="btn btn-small btn-info" href="{{ URL::to('balances/' . $balance->id . '/edit') }}">Edit balances</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@stop
