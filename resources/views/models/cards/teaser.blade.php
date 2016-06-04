<div class="card-teaser">
	<div class="container-flex">
		<img class="card-teaser-image" src="http://www.tradingcarddb.com/Images/Cards/Football/3241/3241-71Fr.jpg" width="43px" height="60px">
		<div class="card-teaser-body">
			<h3 class="list-group-item-heading">
				<a href="{{ route('cards.show', ['sport' => $card->sport, 'card' => $card->slug]) }}">
					{{ $card->year }} - {{ $card->manufacturer }} - {{ $card->team }} - {{ $card->player }}

					@if($card->rookie)
						(R)
					@endif
				</a>
			</h4>
			<p class="list-group-item-text">{{ $card->price()->asCurrency() }}</p>
		</div>
	</div>
</div>