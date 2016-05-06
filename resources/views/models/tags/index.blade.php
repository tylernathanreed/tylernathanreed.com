@extends('layouts.app')

@section('content')

	<div class="container">
		<p class="actions">
			@include('models.tags.actions.create')
		</p>

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h1 class="panel-title">Tags</h1>
			</div>
			<ul class="list-group list-group-hover">
				@foreach($tags as $tag)
					<li class="list-group-item">
						@include('models.tags.teaser')
					</li>
				@endforeach
			</ul>
		</div>
	</div>

@endsection