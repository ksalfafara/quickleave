@extends('layouts.master')

@section('title')
    Manager Dashboard
@stop

@section('pagetitle')
    Dashboard 
    <small>Page</small>
@stop

@section('breadcrumbs')
  <li><a href="/manager"><i class="fa fa-home"></i> Manager Dashboard</a></li>
  <li class="active"><a href="/manager">Manager Dashboard</a></li>
@stop


@section('content')
<!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-3 col-sm-5 col-xs-12">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{ $manager->members->count() }}
                  <sup style="font-size: 20px"> 
                    @if($manager->members->count() <= 1)
                      member
                    @else
                      members
                    @endif
                  </sup>
                  </h3>
                  <p>In your team</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
              </div>
            </div><!-- ./col -->
            
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-black"><i class="fa fa-car"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">VL Balance</span>
                  <span class="info-box-number">{!! Auth::user()->vl_bal !!}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-black"><i class="fa fa-heart"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">SL Balance</span>
                  <span class="info-box-number">{!! Auth::user()->sl_bal !!}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-black"><i class="fa fa-question-circle"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Pending Requests</span>
                  <span class="info-box-number">{{ $team->leaves->where('status','pending')->count() }}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

          </div><!-- /.row -->
          
          <!-- Main row -->
          <div class="row">

            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
            <!-- Chat box -->
              <div class="box box-success">
                <div class="box-header">
                  <i class="fa fa-users"></i>
                  <h3 class="box-title">Who's on leave?</h3>
                  <div class="box-tools pull-right">
                    <span class="label label-warning">{{ $team->leaves->where('status','approved')->count() }} </span>
                  </div>
                </div>
                <div class="box-body chat" id="chat-box">
                  @foreach($team->leaves as $leaves)
                   <!-- chat item -->
                  <div class="item">
                    @if($leaves->status == 'approved' && $leaves->from_dt >= date("Y-m-d"))
                          @if($leaves->user->gender == 'M')
                            <img src="/theme/dist/img/avatar5.png" alt="user image" class="online"//>
                          @else
                            <img src="/theme/dist/img/avatar2.png" alt="user image" class="online"//>
                          @endif
                    <p class="message">
                      <a href="" class="name">
                        <small class="text-muted pull-right" style="color:#c5c5c5"><i class="fa fa-clock-o"></i> {!! date("M d, Y",strtotime($leaves->created_at)) !!}</small>
                        {!!$leaves->user->firstname!!} {!!$leaves->user->lastname!!}
                      </a>
                      <b>On leave: </b><b style="color: green">{!!$leaves->duration!!} 
                      {{$leaves->duration == 1 ? 'day' : 'days'}} </b> from {!! date("M d",strtotime($leaves->from_dt)) !!} - {!! date("mM d",strtotime($leaves->to_dt)) !!}
                      <br>
                      <b>Leave Type: </b> @if($leaves->type == 'SL')
                                <span class="label label-primary ">SICK LEAVE</span> 
                              @else
                                <span class="label label-success">VACATION LEAVE</span> 
                              @endif
                              <br>
                      <b>Reason: </b>{!!$leaves->note!!}
                    </p>
                    @elseif($leaves->where('status','approved')->count() == 0)
                        <center><h2>No filed leaves from your team as of the moment.
                        </h2></center>
                    @endif                    
                  </div><!-- /.item -->
                @endforeach
                  <!-- chat item -->
                </div><!-- /.chat -->
                
              </div><!-- /.box (chat box) -->

            </section><!-- /.Left col -->

<!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Team Members</h3>
                  <div class="box-tools pull-right">

                    <span class="label label-danger">8 New Members</span>
                    
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                  @foreach($team->members as $member)
                    @if($member->username <> Auth::user()->username)
                      <li>
                        @if($member->gender == 'M')
                          <img src="/theme/dist/img/avatar5.png" alt="user image" class="online"//>
                        @else
                          <img src="/theme/dist/img/avatar2.png" alt="user image" class="online"//>
                        @endif
                        <a class="users-list-name" href="#">{{$member->firstname}}</a>
                        <!--<span class="users-list-date">Today</span>-->
                      </li>
                    @endif
                  @endforeach

                  </ul><!-- /.users-list -->
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="{{ URL::to('manager/' . $managerview . '/members') }}" class="uppercase">View All Members</a>
                </div><!-- /.box-footer -->
              </div><!--/.box -->
            </section><!-- right col -->
            
          </div><!-- /.row (main row) -->
@stop