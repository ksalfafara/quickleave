@extends('layouts.master')

@section('title')
    Director Dashboard
@stop

@section('breadcrumbs')
  <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
  <li class="active">All Pending Requests</li>
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
                  <span class="info-box-text"> Pending Requests</span>
                  <span class="info-box-number">{{ $leaves->count() }} </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

          </div><!-- /.row -->
  
@stop