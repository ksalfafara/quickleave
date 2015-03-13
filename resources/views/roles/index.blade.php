@extends('layouts.master')

@section('title')
    Admin - Employees
@stop

@section('pagetitle')
    View Employees
@stop
	
@section('boxname')
	Displaying all employees
@stop

@section('content')
    @if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
    @endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>  
            <th>Team Name</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Username</th>
            <th>Role</th>
            <th>Registration Date Time</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

    @foreach($users as $member)
        <tr>
            <td>{!! $member->team->team_name!!}</td>
            <td>{!! $member->firstname !!}</td>
            <td>{!! $member->lastname !!}</td>
            <td>{!! $member->username !!}</td>
            <td>
                {!! $member->role !!}
            </td>
            <td>
                {!! $member->created_at !!}
            </td>
            
            <td>
                <a class="btn btn-small btn-info" href="{{ URL::to('roles/' . $member->id . '/edit') }}">Edit Role</a>
            </td>
		</tr>
    @endforeach
    </tbody>
</table>	
@stop
