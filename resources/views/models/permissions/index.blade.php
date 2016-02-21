@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<a class="btn btn-primary" href="{{ route('permissions.create') }}">
					<i class="glyphicon glyphicon-plus"></i>
					<span>Create New Permission</span>
				</a>
			</div>
		</div>
		<br>

		@foreach($permissions as $permission)
			@include('models.permissions.teaser')
		@endforeach
	</div>

@endsection