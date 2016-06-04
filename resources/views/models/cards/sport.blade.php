@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="content-header">
			<h1 class="content-heading">{{ ucfirst($sport) }}</h1>

			<div class="actions">
				<a class="btn btn-primary action" href="{{ route('cards.create', $sport) }}">
					<i class="glyphicon glyphicon-plus"></i>
					<span>Create new {{ ucfirst($sport) }} Card</span>
				</a>
			</div> <!-- </actions> -->
		</div> <!-- </content-header> -->

		@include('models.cards.search')

		<h2>Cards</h2>

		@ifempty($cards)
			<i>There are no Cards to display.</i>
		@else
			<ul class="list-group list-card">
				@foreach($cards as $card)
					<li class="list-group-item list-card-item">
						@include('models.cards.teaser', compact('card'))
					</li>
				@endforeach
			</li>
		@endifempty

		<div class="content-footer --center">
			{!! $cards->appends($append)->render() !!}
		</div> <!-- </content-footer> -->
	</div> <!-- </container> -->
@endsection