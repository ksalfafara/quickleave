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

<table id="members" class="table table-bordered table-hover">
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
            <td>{!! $member->role !!}</td>
            <td>{!! date("M d, Y - H:i",strtotime($member->created_at)) !!}</td>
            <td>
                <a class="btn btn-small btn-info" href="{{ URL::to('teams/' . $member->id . '/editrole') }}">Edit Role</a>
                {!! Form::open(array('url' => 'teams/' . $member->id . '/deletemember', 'class' => 'btn')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Delete', array('class' => 'btn btn-warning')) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>    
@stop
