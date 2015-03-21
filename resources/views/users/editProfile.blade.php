@extends('layouts.master')

@section('title')
    Edit Profile
@stop

@section('pagetitle')
    Edit Profile Information
@stop
    
@section('boxname')
    {!! Auth::user()->username !!}'s Profile Information
@stop

@section('right')

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


    {!! Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) !!}

    <div class="col-md-6">

            <div class="box-header">
                <i class="fa fa-user"></i>
                <h3 class="box-title">PERSONAL INFORMATION</h3>
            </div><!-- /.box-header -->

            <div class="box-body">
                <dl class="dl-horizontal">
                    <dt>Username:</dt>
                    <dd>{!! Form::text('username', Input::old('username'), array('class' => 'form-control',
        'placeholder' => 'Username')) !!} </dd> <br>
                    <dt>Email:</dt>
                    <dd>{!! Form::text('email', Input::old('email'), array('class' => 'form-control',
        'placeholder' => 'Email Address')) !!}</dd> <br>
                    <dt>First Name:</dt>
                    <dd>{!! Form::text('firstname', Input::old('firstname'), array('class' => 'form-control',
        'placeholder' => 'Firstname')) !!}</dd> <br>
                    <dt>Last Name:</dt>
                    <dd>{!! Form::text('lastname', Input::old('lastname'), array('class' => 'form-control',
        'placeholder' => 'Lastname')) !!}</dd>
                    
                </dl>
            </div><!-- /.box-body -->


           <center> {!! Form::submit('Save changes', array('class' => 'btn btn-primary')) !!} </center>
    </div><!-- ./col -->
       

    {!! Form::close() !!}

@stop
