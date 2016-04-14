@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Settings</div>

					<div class="panel-body">
						<form method="POST">
							{{ csrf_field() }}

							<div class="form-group{{ has_error('name') }}">
								<label class="col-md-12 control-label">Name</label>
								<input type="text" class="form-control" name="name" placeholder="Enter your Name..." value="{{ val('name', $auth) }}">

								@error('name')
							</div>

							<div class="form-group{{ has_error('email') }}">
								<label class="col-md-12 control-label">Email</label>
								<input type="email" class="form-control" name="email" placeholder="Enter your Email Address..." value="{{ val('email', $auth) }}">

								@error('email')
							</div>

							<hr class="hr">

							<div class="form-group{{ has_error('password_current') }}">
								<label class="col-md-12 control-label">Current Password</label>
								<input type="password" class="form-control" name="password_current" placeholder="Enter your Current Password...">

								@error('password_current')
							</div>

							<div class="form-group{{ has_error('password') }}">
								<label class="col-md-12 control-label">New Password</label>
								<input type="password" class="form-control" name="password" placeholder="Enter your New Password...">

								@error('password')
							</div>

							<div class="form-group{{ has_error('password_confirmation') }}">
								<label class="col-md-12 control-label">Confirm New Password</label>
								<input type="password" class="form-control" name="password_confirmation" placeholder="Confirm your New Password...">

								@error('password_confirmation')
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<button type="submit" class="btn btn-primary form-control">Update Profile</button>
			</div>
		</div>
	</div>

@endsection