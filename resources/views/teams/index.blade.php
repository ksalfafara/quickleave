@extends('layouts.master')

@section('title')
    Admin - Teams
@stop

@section('pagetitle')
    View all Teams
@stop

@section('content')
    @if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Team Name</td>
            <td>Team Code</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($teams as $key => $value)
        <tr>
            <td>{!! $value->id !!}</td>
            <td>{!! $value->name !!}</td>
            <td>{!! $value->code !!}</td>

            <!-- show, edit, and delete buttons -->
            <td>
                 <!-- show the team (uses the show method found at GET /teams/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('teams/' . $value->id) }}">Show this Team</a>

                <!-- edit this team (uses the edit method found at GET /teams/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('teams/' . $value->id . '/edit') }}">Edit this Team</a>

                {!! Form::open(array('url' => 'teams/' . $value->id, 'class' => 'btn')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Delete this Team', array('class' => 'btn btn-warning')) !!}
                {!! Form::close() !!}

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@stop
