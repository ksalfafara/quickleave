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
                          @if($leaves->type == 'SL')
                            <img src="/theme/dist/img/avatar5.png" alt="Product Image"/>
                          @else
                            <img src="/theme/dist/img/avatar2.png" alt="Product Image"/>
                          @endif
                        </div>
                        <div class="product-info">
                          <a href="javascript::;" class="product-title" style="size:20px">{!!$leaves->user->username!!} On Leave <b style="color:green">{!!$leaves->from_dt!!} - {!!$leaves->to_dt!!}</b>. Duration of <b style="color:green">{!!$leaves->duration!!} days </b>
                            @if($leaves->type == 'SL')
                              <span class="label label-primary pull-right">{!!$leaves->type!!}</span> 
                            @else
                              <span class="label label-success pull-right">{!!$leaves->type!!}</span> 
                            @endif
                          </a>
                          <span class="product-description" style="color:#444">
                            {!!$leaves->note!!}
                          </span>
                        </div>
                      </li><!-- /.item -->
                    @endif
                    @endforeach
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="/leaves/history" class="uppercase">View All Leaves</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
              

            </section><!-- /.Left col -->

            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Members</h3>
                  <div class="box-tools pull-right">
                    <span class="label label-danger">8 New Members</span>
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    <li>
                      <img src="/theme/dist/img/user1-128x128.jpg" alt="User Image"/>
                      <a class="users-list-name" href="#">Alexander Pierce</a>
                      <span class="users-list-date">Today</span>
                    </li>
                    <li>
                      <img src="/theme/dist/img/user8-128x128.jpg" alt="User Image"/>
                      <a class="users-list-name" href="#">Norman</a>
                      <span class="users-list-date">Yesterday</span>
                    </li>
        
                  </ul><!-- /.users-list -->
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="javascript::;" class="uppercase">View All Users</a>
                </div><!-- /.box-footer -->
              </div><!--/.box -->
            </section><!-- right col -->
          </div><!-- /.row (main row) -->
@stop