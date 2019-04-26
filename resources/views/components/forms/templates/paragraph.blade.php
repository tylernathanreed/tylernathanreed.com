<?php extract($attributes); ?>

<div class="col-md-6">
	<div class="mx-auto mb-6 last-2:mb-0" style="max-width: 400px">
		<h3 class="mb-1"{{ isset($link) ? 'role=link' : '' }}>
			@if(isset($link))
				<a target="_blank" href="{{ $link }}">
			@endif

			<div class="heading-title">{{ $title }}</div>

			@if(isset($link))
				</a>
			@endif
		</h3>

		@if(isset($subtitle))
			<h4 class="text-gray">{{ $subtitle }}</h4>
		@endif

		<p class="mt-2">
			{{ $content }}
		</p>

		@if(isset($footer))
			<p class="mt-2">
				{!! $footer !!}
			</p>
		@endif

		@if(isset($meta))
			<small class="block mt-3">
				<span>{!! $meta !!}</span>

				@if(isset($aside))
					<span class="float-right">
						{{ $aside }}
					</span>
				@endif
			</small>
		@endif
	</div>
</div>