@extends('layouts.master')

@section('title')
    User Dashboard
@stop

@section('pagetitle')
    Dashboard
    <small>Page</small>
@stop

@section('breadcrumbs')
  <li><a href="/user"><i class="fa fa-home"></i> Home</a></li>
  <li class="active"><a href="/user">User Dashboard</a></li>
@stop

@section('content')
<!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-3 col-sm-5 col-xs-12">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{ $members->count() }}
                  <sup style="font-size: 20px"> member(s) </sup>
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
                  <span class="info-box-text">Pending Request</span>
                  <span class="info-box-number">{{ $pending->count() }}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Leaves</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    @foreach($team->leaves as $leaves)
                    @if($leaves == ('approved' || 'rejected'))
                      <li class="item">
                        <div class="product-img">
                          @if(Auth::user()->gender == 'M')
                            <img src="/theme/dist/img/avatar5.png" alt="Product Image"/>
                          @else
                            <img src="/theme/dist/img/avatar2.png" alt="Product Image"/>
                          @endif
                        </div>
                        <div class="product-info">
                          <a href="javascript::;" class="product-title">
                            {!!$leaves->user->username!!}'s' on leave for <b style="color: green">{!!$leaves->duration!!} days</b> from {!! date("M d",strtotime($leaves->from_dt)) !!} - {!! date("mM d",strtotime($leaves->to_dt)) !!}

                            @if($leaves->type == 'SL')
                              <span class="label label-primary pull-right">SICK LEAVE</span> 
                            @else
                              <span class="label label-success pull-right">VACATION LEAVE</span> 
                            @endif
                          </a>
                          <span class="product-description" style="color:#444">
                            <b>Reason: </b>{!!$leaves->note!!}
                          </span>
                        </div>
                      </li><!-- /.item -->
                    @endif
                    @endforeach
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="javascript::;" class="uppercase">View All Leaves</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
              

            </section><!-- /.Left col -->
            
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">
              <div class="box box-solid ">
                <div class="box-body">
                    @foreach($members as $team_member)
                      {!! $team_member->id !!}
                    @endforeach
                </div>
              </div>
            </section><!-- right col -->
          </div><!-- /.row (main row) -->
@stop
