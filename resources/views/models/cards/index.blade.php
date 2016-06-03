@extends('layouts.app')

@section('content')

	<div class="container">
		<h1 class="--center --no-margin-top">Select a Sport</h1>

		<ul class="list-naked --center">
			<li><a href="{{ route('cards.sport', ['sport' => 'football']) }}"><h2>Football</h2></a></li>
			<li><a href="{{ route('cards.sport', ['sport' => 'baseball']) }}"><h2>Baseball</h2></a></li>
			<li><a href="{{ route('cards.sport', ['sport' => 'hockey']) }}"><h2>Hockey</h2></a></li>
		</ul>
	</div> <!-- </container> -->

@endsection