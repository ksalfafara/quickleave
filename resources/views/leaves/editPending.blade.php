@extends('layouts.master')

@section('title')
    Manager - Edit a leave
@stop

@section('pagetitle')
    Edit a request
@stop

@section('boxname')
    Edit leave #{!! $leave->id !!}
@stop

@section('content')
 <!-- if there are creation errors, they will show here -->
    @if ($errors->has())
        <div class="alert alert-danger">
          <i><strong>Whoops!</strong> There were some problems with your input.</i><br><br>
            @foreach ($errors->all() as $error)
                {{ $error }}<br>        
            @endforeach
        </div>
    @endif


{!! Form::model($leave, array('route' => array('leaves.updatePending', $leave->id), 'method' => 'PUT')) !!}

    <div class="form-group">
        {!! Form::label('status', 'Status') !!}
        <div class="input-group">
        {!! Form::select('status', array('' => 'Select status ', 'Approved' => 'Approved', 'Rejected' => 'Rejected'), Input::old('status'), array('class' => 'form-control')) !!}
        <div class="input-group-addon">
                        <i class="fa fa-chevron-down"></i>
                      </div>
    </div>

    <div class="form-group">
        {!! Form::label('remark', "Manager's Remark") !!}
        {!! Form::textarea('remark', Input::old('remark'), array('class' => 'form-control', 'size' => '30x3', 'placeholder' => 
        'If request is rejected, input the reason.')) !!}
    </div>

    

    </div>

    {!! Form::submit('Submit changes', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}

</div>
@stop
