
<!DOCTYPE html>
<html>
<head>
    <title>QUICKLEAVE</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{!! URL::to('/') !!}">QUICKLEAVE</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{!! URL::to('leaves') !!}">View All Requests</a></li>
        <li><a href="{!! URL::to('leaves/create') !!}">Request a Leave</a>
    </ul>
</nav>

<h1>Requests</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Type of Leave</td>
            <td>From Date</td>
            <td>To Date</td>
            <td>Duration</td>
            <td>Note</td>
            <td>Remarks</td>
            <td>Status</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($leaves as $key => $value)
        <tr>
            <td>{!! $value->id !!}</td>
            <td>{!! $value->type !!}</td>
            <td>{!! $value->from_dt !!}</td>
            <td>{!! $value->to_dt !!}</td>
            <td>{!! $value->duration !!}</td>
            <td>{!! $value->note !!}</td>
            <td>{!! $value->remark !!}</td>
            <td>{!! $value->status !!}</td>
            <td>
                <a class="btn btn-small btn-info" href="{!! URL::to('leaves/' . $value->id . '/edit') !!}">Edit this Request</a>

                {!! Form::open(array('url' => 'leaves/' . $value->id, 'class' => 'btn')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Delete this Request', array('class' => 'btn btn-warning')) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>