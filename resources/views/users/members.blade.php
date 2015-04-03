@extends('layouts.master')

@section('title')
    Manager - {!! Auth::user()->team->team_name !!}'s Members
@stop

@section('pagetitle')
    View {!! Auth::user()->team->team_name !!}'s Members
@stop
	
@section('breadcrumbs')
    <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">All Members</li>
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
                <th>Date Hired</th>
                <th>Registration Date</th>
            </tr>
        </thead>
        <tbody>

        @foreach($manager->members as $member)
            <tr>
                <td>{!! $member->team->team_name!!}</td>
                <td>{!! $member->firstname . ' ' . $member->lastname !!}</td>
                <td>{!! $member->username !!}</td>
                <td>
                    @if($member->role == 'manager')
                    <span class="label label-primary">Manager</span>
                    @else
                    <span class="label label-success">Member</span>
                    @endif
                </td>
                <td>{!! date("M d, Y",strtotime($member->date_hired)) !!}</td>
                <td>{!! date("M d, Y",strtotime($member->created_at)) !!}</td>
            </tr>
        @endforeach
        </tbody>
</table>

  </div><!-- /.box-body -->
</div><!-- /.box -->
@stop
