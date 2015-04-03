@extends('layouts.master')

@section('title')
    Manager - Edit a leave
@stop

@section('pagetitle')
    Edit <b>{!! $leave->user->username !!}</b>'s <b>{!! $leave->type !!}</b> request from <b>{!! date("M d, Y",strtotime($leave->from_dt)) !!}</b> to <b>{!! date("M d, Y",strtotime($leave->to_dt)) !!}</b>
@stop

@section('breadcrumbs')
    @if((Auth::user()->role) == 'manager')
    <li><a href="/manager"><i class="fa fa-home"></i> Manager Dashboard</a></li>
    @elseif((Auth::user()->role) == 'member')
    <li><a href="/user"><i class="fa fa-home"></i> User Dashboard</a></li>
    @endif
    <li class="active"><a href="">Edit Request</a></li>
@stop

@section('content')
    
    <div class="row">
            <div class="col-md-4 col-sm-5 col-xs-12">
    <div class="box box-warning">
                <div class="box-body chat" id="chat-box">
                 
                  <!-- chat item -->
                  <div class="item">
                    @if(Auth::user()->gender == 'M')
                      <img src="/theme/dist/img/avatar5.png" alt="user image" class="online"//>
                    @else
                        <img src="/theme/dist/img/avatar2.png" alt="user image" class="online"//>
                    @endif
                    <p class="message">
                      <a href="" class="name">
                        <small class="text-muted pull-right" style="color:#c5c5c5"><i class="fa fa-clock-o"></i> {!! date("M d, Y",strtotime($leave->created_at)) !!}</small>
                        {!!$leave->user->firstname!!} {!!$leave->user->lastname!!}
                      </a>
                      <b>On leave: </b><b style="color: green">{!!$leave->duration!!} days</b> from {!! date("M d",strtotime($leave->from_dt)) !!} - {!! date("mM d",strtotime($leave->to_dt)) !!}
                      <br>
                      <b>Leave Type: </b> @if($leave->type == 'SL')
                                <span class="label label-primary ">SICK LEAVE</span> 
                              @else
                                <span class="label label-success">VACATION LEAVE</span> 
                              @endif
                              <br>
                      <b>Reason: </b>{!!$leave->note!!}
                    </p>
                  </div><!-- /.item -->
                  <!-- chat item -->
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->
    </div><!-- /.col -->  

            <div class="col-md-8">
            <div class="box box-warning">
            <div class="box-header with-border">
                    Change the status whether Approve/Reject. Input the remark.
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

            {!! Form::model($leave, array('route' => array('leaves.updatePending', $leave->id), 'method' => 'PUT')) !!}

            <div class="form-group">
                {!! Form::label('status', 'Status') !!}
                <div class="input-group">
                {!! Form::select('status', array('' => 'Select status ', 'approved' => 'Approved', 'rejected' => 'Rejected'), Input::old('status'), array('class' => 'form-control')) !!}
                <div class="input-group-addon">
                                <i class="fa fa-chevron-down"></i>
                              </div>
            </div>
            <br>

            <div class="form-group">
                {!! Form::label('remark', "Manager's Remark") !!}
                {!! Form::textarea('remark', Input::old('remark'), array('class' => 'form-control', 'size' => '30x3', 'placeholder' => 
                'Input the remark.')) !!}
            </div>

            </div>

            {!! Form::submit('Submit changes', array('class' => 'btn btn-primary')) !!}

        {!! Form::close() !!}

        </div>

        </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->

@stop
