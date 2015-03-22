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
    @foreach($employees as $employee)
        <tr>
            <td>{!! $employee->team->team_name !!}</td>
            <td>{!! $employee->firstname . ' ' . $employee->lastname !!}</td>
            <td>{!! $employee->date_hired !!}</td>
            <td>{!! $employee->sl_bal !!}</td>
            <td>{!! $employee->vl_bal !!}</td>

            <!--edit and delete buttons -->
            <td>
                <a class="btn btn-small btn-info" href="{{ URL::to('admin/' . $employee->id . '/editemployee') }}">Edit Employee Info</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@stop
