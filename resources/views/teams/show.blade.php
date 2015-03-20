@extends('layouts.master')

@section('title')
    Admin - Team Members
@stop

@section('pagetitle')
    View {!! $team->team_name !!}'s Members
@stop
    
@section('boxname')
    {!! $team->team_name !!}'s Members
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
            <td>Registration Date Time</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($team->user as $member)
        <tr>
            <td>{!! $member->firstname !!}</td>
            <td>{!! $member->lastname !!}</td>
            <td>{!! $member->username !!}</td>
<!--
            @if(($member->role) == '0')
            <td>Member</td>
            @else
            <td>Manager</td>
            @endif
-->

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
