@extends('layouts.master')

@section('title')
    Admin - Edit Balances
@stop

@section('pagetitle')
    Edit Balances
@stop

@section('boxname')
    Edit {!! $balance->firstname !!}'s Balances
@stop

@section('content')

    {!! HTML::ul($errors->all()) !!}

    {!! Form::model($balance, array('route' => array('balances.update', $balance->id), 'method' => 'PUT')) !!}

        <div class="form-group">
            {!! Form::label('sl_bal', 'SL Balance') !!}
            {!! Form::input('number','sl_bal', null, array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('vl_bal', 'VL Balance') !!}
            {!! Form::input('number','vl_bal', null, array('class' => 'form-control')) !!}
        </div>

        {!! Form::submit('Edit the Balance!', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}
@stop
