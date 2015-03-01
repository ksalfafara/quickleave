@extends('layouts.master')

@section('title')
    Admin Board
@stop

@section('pagetitle')
    Dashboard
@stop

@section('content')
    <div class="jumbotron text-center">
        <h2>{!! $team->name !!}</h2>
        <p>
            <strong>Code:</strong> {!! $team->code !!}<br>
        </p>
    </div>
@stop
