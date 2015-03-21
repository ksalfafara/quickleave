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

    @if ($errors->has())
        <div class="alert alert-danger">
          <i><strong>Whoops!</strong> There were some problems with your input.</i><br><br>
            @foreach ($errors->all() as $error)
                {{ $error }}<br>        
            @endforeach
        </div>
    @endif


    {!! Form::model($balance, array('route' => array('balances.update', $balance->id), 'method' => 'PUT')) !!}

        <div class="form-group">
        {!! Form::label('date_hired', 'Date Hired') !!}
            <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
            {!! Form::text('date_hired', Input::old('date_hired'), array('class' => 'form-control', 'id' => 'date_hired',
            'placeholder' => 'Pick a date','required' => 'required' )) !!} 
            </div>
    </div>

        <div class="form-group">
            {!! Form::label('sl_bal', 'SL Balance') !!}
            {!! Form::input('number','sl_bal', null, array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('vl_bal', 'VL Balance') !!}
            {!! Form::input('number','vl_bal', null, array('class' => 'form-control')) !!}
        </div>

        {!! Form::submit('Submit changes', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}
@stop
