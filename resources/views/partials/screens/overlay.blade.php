@optional('overlay')

	<section id="overlay" class="overlay hide">
		<div class="overlay-wrapper">
			<div id="overlay-content" class="overlay-content">
				@yield('overlay')
			</div>
			<button id="overlay-close" class="overlay-close" onclick="overlay.close()">Close</button>
		</div>
	</section>

	@section('footer-left')

		<li id="overlay-open"><a href="javascript:void(0);" onClick="overlay.open()">Open Overlay</a></li>

	@endsection

	@section('tail')

		<script src="/media/js/partials/overlay.min.js"></script>

	@endsection

@endoptional