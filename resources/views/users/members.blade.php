@extends('layouts.master')

@section('title')
    Manager - All members
@stop

@section('pagetitle')
    View {!! Auth::user()->team->team_name !!}'s' Members
@stop
	
@section('breadcrumbs')
    @if((Auth::user()->role) == 'manager')
    <li><a href="/manager"><i class="fa fa-home"></i> Manager Dashboard</a></li>
    @elseif((Auth::user()->role) == 'member')
    <li><a href="/user"><i class="fa fa-home"></i> User Dashboard</a></li>
    @endif
    <li><a href="">{!! Auth::user()->team->team_name !!}</a></li>
    <li class="active"><a href="">All Members</a></li>
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
                <th>Team</th>
                <th>Name</th>
                <th>Username</th>
                <th>Role</th>
                <th>Registration Date</th>
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
                <td>{!! date("M d, Y",strtotime($member->ceated_at)) !!}</td>
            </tr>
            @endif
        @endif
    @endforeach
        </tbody>
</table>

  </div><!-- /.box-body -->
</div><!-- /.box -->
@stop
