@extends('layouts.master')

@section('title')
    Manager - All members
@stop

@section('pagetitle')
    View {!! Auth::user()->team->team_name !!}
@stop
	
@section('boxname')
	Displaying all members of your team
@stop

@section('content')
    @if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
    @endif
<!--
<table id="example1" class="table table-hover table-bordered">
    <thead>
        <tr>  
            <th>Team Name</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Username</th>
            <th>Role</th>
            <th>Registration Date Time</th>
        </tr>
    </thead>
    <tbody>

@foreach($users as $member)
    @if((Auth::user()->team->team_name) === $member->team->team_name)
        <tr>
            <td>{!! $member->team->team_name!!}</td>
            <td>{!! $member->firstname !!}</td>
            <td>{!! $member->lastname !!}</td>
            <td>{!! $member->username !!}</td>
            <td>{!! $member->role !!}</td>
            <td>{!! $member->created_at !!}</td>
		</tr>
    @endif
@endforeach
    </tbody>
</table>	
-->
<table id="members" class="table table-bordered table-hover">
        <thead>
            <tr>  
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Username</th>
                <th>Role</th>
                <th>Registration Date Time</th>
            </tr>
        </thead>
        <tbody>

    @foreach($users as $member)
        @if((Auth::user()->team->team_name) === $member->team->team_name)
            <tr>
                <td>{!! $member->firstname !!}</td>
                <td>{!! $member->lastname !!}</td>
                <td>{!! $member->username !!}</td>
                <td>{!! $member->role !!}</td>
                <td>{!! $member->created_at !!}</td>
            </tr>
        @endif
    @endforeach
        </tbody>
</table>
@stop
