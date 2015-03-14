@extends('layouts.master')

@section('title')
    User - Profile Info
@stop

@section('pagetitle')
    Your profile info
@stop

@section('boxname')
    Your profile info
@stop

@section('content')
    @if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif

    {!! Auth::user()->username !!}

@stop
