@extends('layouts.form', array(
	'form' => [
		'heading' 	=> 'Register',
		'route' 	=> 'auth.register.submit'
	]
))

@section('content.form')

	@include('components.form.field.name')
	@include('components.form.field.email')
	@include('components.form.field.password')
	@include('components.form.field.comfirmation')

	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			<button type="submit" class="btn btn-primary">
				<i class="fa fa-btn fa-user"></i>Register
			</button>
		</div>
	</div>

@endsection
