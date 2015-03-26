@extends('layouts.master')

@section('title')
    Admin - Edit Employee Info
@stop

@section('pagetitle')
    Edit {!! $employee->firstname !!}'s Balances
@stop

@section('breadcrumbs')
  <li><a href="/admin"><i class="fa fa-home"></i> Admin Dashboard</a></li>
  <li><a href="">{!! $employee->firstname !!}</a></li>
  <li class="active"><a href="">Edit Balance</a></li>
@stop

@section('content')
<div class="box box-warning">
    <div class="box-header with-border">
            Create a team and designate the code to the members
    <div class="box-tools pull right"></div>
    </div>

    <div class="box-body table-responsive">
        @if (Session::has('message'))
        <div class="alert alert-info">{!! Session::get('message') !!}</div>
        @endif
        @if ($errors->has())
            <div class="alert alert-danger">
              <i><strong>Whoops!</strong> There were some problems with your input.</i><br><br>
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>        
                @endforeach
            </div>
        @endif


    {!! Form::model($employee, array('route' => array('admin.updateEmployee', $employee->id), 'method' => 'PUT')) !!}

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
  </div><!-- /.box-body -->
</div><!-- /.box -->
@stop
