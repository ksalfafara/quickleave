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
    
<table id="members" class="table table-bordered table-hover">
        <thead>
            <tr>  
                <th>Team</th>
                <th>Name</th>
                <th>Username</th>
                <th>Role</th>
                <th>Registration Date Time</th>
            </tr>
        </thead>
        <tbody>

    @foreach($users as $member)
        @if((Auth::user()->team->team_name) == $member->team->team_name)
            @if($member->role <> 'manager')
            <tr>
                <td>{!! $member->team->team_name!!}
                <td>{!! $member->firstname . ' ' . $member->lastname !!}</td>
                <td>{!! $member->username !!}</td>
                <td>{!! $member->role !!}</td>
                <td>{!! $member->created_at !!}</td>
            </tr>
            @endif
        @endif
    @endforeach
        </tbody>
</table>
@stop
