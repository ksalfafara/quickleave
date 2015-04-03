@extends('layouts.master')

@section('title')
    Admin - Teams
@stop

@section('pagetitle')
    View All Employees
@stop

@section('breadcrumbs')
    <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">All Employees</li>
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
            <td>Team Name</td>
            <td>Employee Name</td>
            <td>Username</td>
            <td>Date Hired</td>
            <td>SL Balance</td>
            <td>VL Balance</td>
            <td>Role</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($employees as $employee)
        <tr>
            <td>{!! $employee->team->team_name !!}</td>
            <td>{!! $employee->firstname . ' ' . $employee->lastname !!}</td>
            <td>{!! $employee->username !!}
            @if($employee->date_hired == null)
                <td>No specified date hired</td>
            @else
                <td>{!! date("M d, Y",strtotime($employee->date_hired)) !!}</td>
            @endif
            <td>{!! $employee->sl_bal !!}</td>
            <td>{!! $employee->vl_bal !!}</td>
            <td>
                @if(($employee->role) == 'manager')
                    <span class="label label-warning">Manager</span>
                @elseif(($employee->role) == 'member')
                    <span class="label label-success">Mmeber</span>
                @elseif(($employee->role) == 'admin')
                    <span class="label label-danger">Admin</span>
                @elseif(($employee->role) == null)
                    <span class="label label-danger">No specified role</span>
                @endif
            </td>
            <!--edit and delete buttons -->
            <td>
                <a class="btn btn-small btn-info" href="{{ URL::to('admin/' . $employee->id . '/editemployee') }}">Edit Employee Info</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

  </div><!-- /.box-body -->
</div><!-- /.box -->
@stop
