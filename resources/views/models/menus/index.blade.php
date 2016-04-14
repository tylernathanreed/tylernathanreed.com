@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<a class="btn btn-primary" href="{{ route('menus.create') }}">
					<i class="glyphicon glyphicon-plus"></i>
					<span>Create New Menu</span>
				</a>
			</div>
		</div>
		<br>

		@foreach($menus as $menu)
			@include('models.menus.teaser', compact('menu'))
		@endforeach
	</div>

@endsection