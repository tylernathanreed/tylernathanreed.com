@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="content-header">
			<h1 class="content-heading">
				{{ $card->year }} - {{ $card->manufacturer }} - {{ $card->team }} - {{ $card->player }}

				@if($card->rookie)
					(R)
				@endif
			</h1>

			<div class="actions">
				<a class="btn btn-primary action" href="{{ route('cards.sport', $sport) }}">
					<i class="glyphicon glyphicon-chevron-left"></i>
					<span>Back to {{ ucfirst($sport) }} Cards</span>
				</a>

				<a class="btn btn-warning action" href="{{ route('cards.edit', ['sport' => $sport, 'card' => $card->slug]) }}">
					<i class="glyphicon glyphicon-pencil"></i>
					<span>Edit</span>
				</a>

				@include('components.button', [
					'button' => [
						'class'  => 'danger action',
						'route'  => 'cards.destroy',
						'params' => ['sport' => $sport, 'card' => $card->slug],
						'icon' 	 => 'trash',
						'value'  => 'Delete'
					]
				])
			</div>
		</div>

		<div class="card-wrapper">
			<div class="card-header row">
				<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-12">
					<h2 class="card-heading">Card Information</h2>
				</div>
			</div>
			<div class="card">
				<div class="card-wrapper-left">
					<img class="card-image-front" src="http://www.tradingcarddb.com/Images/Cards/Football/3241/3241-71Fr.jpg" width="343px" height="480px" style="margin-right: 30px">
				</div> <!-- </card-wrapper-left> -->

				<div class="card-wrapper-right">
					<div class="card-information">
						<p>
							<b>Number:</b> {{ $card->number }}<br>
							<b>Year:</b> {{ $card->year }}<br>
							<b>Manufacturer:</b> {{ $card->manufacturer }}<br>
							<b>Team:</b> {{ $card->team }}<br>
							<b>Player:</b> {{ $card->player }}<br>
							<b>Position:</b> {{ $card->position }}<br>
							<b>Rookie Card:</b> {{ $card->rookie ? 'Yes' : 'No' }}<br>
							<b>Price:</b> {{ $card->price()->asCurrency() }}
						</p>
					</div> <!-- </card-information> -->

					<img class="card-image-back" src="http://www.tradingcarddb.com/Images/Cards/Football/3241/3241-71Bk.jpg" width="171px" height="240px">
				</div> <!-- </card-wrapper-right> -->
			</div> <!-- </card> -->

			@if(trim($card->description) != "")
				<div class="card-description col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-12">
					<h3>Description:</h3>
					<p>{{ $card->description }}</p>
				</div> <!-- </card-description> -->
			@endif
		</div>
	</div> <!-- </container> -->

@endsection