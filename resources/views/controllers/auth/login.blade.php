@extends('layouts.form', array(
	'form' => [
		'heading' 	=> 'Login',
		'route' 	=> 'auth.login.submit'
	]
))

@section('content.form')

	@include('components.form.field.email')
	@include('components.form.field.password')

	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			<div class="checkbox">
				<label>
					<input type="checkbox" name="remember"> Remember Me
				</label>
			</div>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			<button type="submit" class="btn btn-primary">
				<i class="fa fa-btn fa-sign-in"></i>Login
			</button>

			<a class="btn btn-link" href="{{ route('auth.reset') }}">Forgot Your Password?</a>
		</div>
	</div>

@endsection