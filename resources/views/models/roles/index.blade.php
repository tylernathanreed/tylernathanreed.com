@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<a class="btn btn-primary" href="{{ route('roles.create') }}">
					<i class="glyphicon glyphicon-plus"></i>
					<span>Create New Role</span>
				</a>
			</div>
		</div>
		<br>

		@foreach($roles as $role)
			@include('models.roles.teaser')
		@endforeach
	</div>

@endsection