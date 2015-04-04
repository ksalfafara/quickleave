@extends('layouts.master')

@section('title')
    Admin Dashboard
@stop

@section('breadcrumbs')
  <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
  <li class="active">Admin Dashboard</li>
@stop

@section('pagetitle')
    Dashboard 
    <small>Page</small>
@stop

@section('content')
<!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-3 col-sm-5 col-xs-12">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>
                    <script>
                    /*Current date script credit: 
                    JavaScript Kit (www.javascriptkit.com)
                    Over 200+ free scripts here!
                    */

                    var mydate=new Date()
                    var year=mydate.getYear()
                    if (year < 1000)
                    year+=1900
                    var day=mydate.getDay()
                    var month=mydate.getMonth()
                    var daym=mydate.getDate()
                    if (daym<10)
                    daym="0"+daym
                    //var dayarray=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday")
                    var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December")
                    document.write("<small><font color='ffffff'><b>"+montharray[month]+" "+daym+", "+year+"</b></font></small>")
                    </script>
                  </h3>
                  <p id="clockbox"></p>
                </div>
                <div class="icon">
                  <i class="fa fa-clock-o"></i>
                </div>
              </div>
            </div><!-- ./col -->

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-black"><i class="ion ion-person-add"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Teams Created</span>
                  <span class="info-box-number">{{ $teams->count() }}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-black"><i class="fa fa-users"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Users Registered</span>
                  <span class="info-box-number">{{ $users->count() }}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-black"><i class="fa fa-check-circle"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"> Approved Requests</span>
                  <span class="info-box-number">{{ $leaves->count() }} </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

          </div><!-- /.row -->
          
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
              <div class="box box-success">
                <div class="box-header">
                  <i class="fa fa-users"></i>
                  <h3 class="box-title">Who's on leave?</h3>
                  <div class="box-tools pull-right">
                    <span class="label label-warning">{{ $leaves->where('status','approved')->count() }} </span>
                  </div>
                </div>
                <div class="box-body chat" id="chat-box">
                  @foreach($leaves as $leaves)
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
                  <h3 class="box-title">All Employees</h3>
                  <div class="box-tools pull-right">
                    <!--<span class="label label-danger">8 New Members</span>-->
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    @foreach($users as $user)
                        <li>
                          @if(Auth::user()->gender == 'M')
                            <img src="/theme/dist/img/avatar5.png" alt="User Image">
                          @else
                            <img src="/theme/dist/img/avatar2.png" alt="User Image">
                          @endif
                          <a class="users-list-name" href="#">{{$user->firstname}}</a>
                          <!--<span class="users-list-date">Today</span>-->                    
                        </li>
                    @endforeach
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="javascript::;" class="uppercase">View All Employees</a>
                </div><!-- /.box-footer -->
              </div><!--/.box -->
            </section><!-- right col -->
            
          </div><!-- /.row (main row) -->
@stop