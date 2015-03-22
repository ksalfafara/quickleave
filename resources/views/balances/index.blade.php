@extends('layouts.master')

@section('title')
    Admin - Teams
@stop

@section('pagetitle')
    Employees
@stop

@section('boxname')

@stop

@section('content')
    @if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif

<table id="balances" class="table table-bordered table-hover">
    <thead>
        <tr>
            <td>Team Name</td>
            <td>Username</td>
            <td>Employee Name</td>
            <td>Date Hired</td>
            <td>SL Balance</td>
            <td>VL Balance</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($balances as $balance)
        <tr>
            <td>{!! $balance->team->team_name !!}</td>
            <td>{!! $balance->username !!}</td>
            <td>{!! $balance->firstname . ' ' . $balance->lastname !!}</td>
            <td>{!! $balance->date_hired !!}</td>
            <td>{!! $balance->sl_bal !!}</td>
            <td>{!! $balance->vl_bal !!}</td>

            <!--edit and delete buttons -->
            <td>
                <a class="btn btn-small btn-info" href="{{ URL::to('balances/' . $balance->id . '/edit') }}">Edit Employee Info</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@stop
