@extends('layouts.master')

@section('title')
    Admin - Team Members
@stop

@section('pagetitle')
    View {!! $team->name !!}'s Members
@stop
	
@section('boxname')
	{!! $team->name !!}'s Members
@stop

@section('content')
    @if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Firstname</td>
            <td>Lastname</td>
            <td>Username</td>
            <td>Role</td>
        </tr>
    </thead>
    <tbody>
    @foreach($team->user as $member)
        <tr>
            <td>{!! $member->firstname !!}</td>
            <td>{!! $member->lastname !!}</td>
            <td>{!! $member->username !!}</td>
            <td>{!! $member->is_manager !!}</td>
            <td>
            	<a class="btn btn-small btn-success" href="{{ URL::to('teams/' . $member->id) }}">Edit this Member</a>
            </td>
		</tr>
    @endforeach
    </tbody>
</table>	
@stop
