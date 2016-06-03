@extends('layouts.app')

@section('content')

	<div class="container">
		<?php $skills = collect([0, 1, 2, 3, 4, 5, 6, 7, 8, 9]); ?>

		@foreach($skills as $skill)
			@include('models.skills.teaser')
		@endforeach
	</div>

@endsection