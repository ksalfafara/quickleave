@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Apply for Leave</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="/auth/apply">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						
						<div class="form-group">
							<label class="col-md-4 control-label">Request Number</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('request_id') }}">

							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Type of leave</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="leave_Type" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">From</label>
							<div class="col-md-6">
								 <input type="datetime" class="form-control" id="frm_dt" name="frm_dt" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">To</label>
							<div class="col-md-6">
								<input type="text" class="form-control" id="to_dt" name="to_dt" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Duration</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="duration">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Note</label>
							<div class="col-md-6">
								<textarea name="message" rows="10" class="form-control" cols="55"></textarea>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Submit Request
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
