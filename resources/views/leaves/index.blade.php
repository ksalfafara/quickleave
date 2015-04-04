@extends('layouts.master')

@section('title')
    @if((Auth::user()->role) == 'manager')
    Manager - All request(s)
    @else
    User - All request(s)
    @endif
@stop

@section('pagetitle')
    All Leave Requests
@stop

@section('breadcrumbs')
    <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">All Leave Requests</li>
@stop

@section('content')
<!-- START CUSTOM TABS -->
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Approved/Rejected</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Pending</a></li>
                  <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <table id="table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Type of Leave</th>
                            <th>From Date</th>
                            <th>To Date</th>
                            <th>Duration</th>
                            <th>Note</th>
                            <th>Remarks</th>
                            <th>Status</th>
                            <th>Date & Time Approved</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($leaves as $key => $value)
                        @if(Auth::user()->id == $value->user->id)

                        @if($value->status <> 'pending')
                        <tr>
                            <td>{!! $value->type !!}</td>
                            <td>{!! $value->from_dt !!}</td>
                            <td>{!! $value->to_dt !!}</td>
                            <td>{!! $value->duration !!}</td>
                            <td>{!! $value->note !!}</td>
                            <td>{!! $value->remark !!}</td>
                            <td>@if($value->status == 'approved')
                                    <span class="label label-success">Approved</span>
                                @elseif($value->status == 'rejected')
                                    <span class="label label-primary">Rejected</span>
                                @endif</td>
                            <td>{!! date("M d, Y - H:i",strtotime($value->updated_at)) !!}</td>
                        </tr>
                        @endif
                        @endif
                        @endforeach
                    </tbody>
                    </table>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Type of Leave</th>
                            <th>From Date</th>
                            <th>To Date</th>
                            <th>Duration</th>
                            <th>Note</th>
                            <th>Status</th>
                            <th>Date & Time Created</th>
                        </tr>
                    </thead>
                    <tbody>    
                        <tr>
                            @foreach($leaves as $key => $value)
                            @if(Auth::user()->id == $value->user->id)

                            @if($value->status == 'pending')
                            <td>{!! $value->type !!}</td>
                            <td>{!! $value->from_dt !!}</td>
                            <td>{!! $value->to_dt !!}</td>
                            <td>{!! $value->duration !!}</td>
                            <td>{!! $value->note !!}</td>
                            <td>@if($value->status == 'pending')
                                    <span class="label label-warning">Pending</span>
                                @endif</td>
                            <td>{!! date("M d, Y - H:i",strtotime($value->created_at)) !!}</td>
                        </tr>
                            @endif
                            @endif
                            @endforeach
                    </tbody>
                    </table>
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->

          <!-- END CUSTOM TABS -->

@stop
