@extends('layouts.master')

@section('title')
    Admin - Teams
@stop

@section('pagetitle')
    View all Teams
@stop

@section('breadcrumbs')
    <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">All Teams</li>
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
            <th>Team Name</th>
            <th>Team Code</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($teams as $team)
        <tr>
            <td>{!! $team->team_name !!}</td>
            <td>{!! $team->team_code !!}</td>

            <!-- show, edit, and delete buttons -->
            <td>
                 <!-- show the team members (uses the show method found at GET /teams/{id} -->
                <a class="btn btn-sm btn-success" href="{{ URL::to('teams/' . $team->id . '/showmembers') }}">Show Members</a>

                <!-- edit this team (uses the edit method found at GET /teams/{id}/edit -->
                <a class="btn btn-sm btn-info" href="{{ URL::to('teams/' . $team->id . '/edit') }}">Edit this Team</a>

                {!! Form::open(array('url' => 'teams/' . $team->id . '/delete', 'class' => 'btn', 'method' => 'DELETE')) !!}
                    <button class="btn btn-sm btn-danger">Delete this team</button>
                {!! Form::close() !!}

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
  </div><!-- /.box-body -->
</div><!-- /.box -->
@stop
