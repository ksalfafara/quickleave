@extends('layouts.master')

@section('title')
    Admin - Users
@stop

@section('pagetitle')
    View all Users
@stop

@section('content')
    @if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Username</td>
            <td>SL Balance</td>
            <td>VL Balance</td>
            <td>Date Registered</td>
            <td>Team Name</td>
        </tr>
</thead>
    <tbody>
   @foreach($users as $key => $value)
        <tr>
            <td>{!! $value->id !!}</td>
            <td>{!! $value->lastname !!}</td>
            <td>{!! $value->username !!}</td>
            <td>{!! $value->sl_bal !!}</td>
            <td>{!! $value->vl_bal !!}</td>
            <td>{!! $value->created_at !!}</td>
            <td>{!! $value->teams_id->team_name !!}</td>

            <!-- show, edit, and delete buttons -->
            <td>
                 <!-- show the team (uses the show method found at GET /teams/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('users/' . $value->id) }}">Show this User</a>

                <!-- edit this team (uses the edit method found at GET /teams/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('users/' . $value->id . '/edit') }}">Edit this User</a>

                {!! Form::open(array('url' => 'users/' . $value->id, 'class' => 'btn')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Delete this User', array('class' => 'btn btn-warning')) !!}
                {!! Form::close() !!}

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@stop
