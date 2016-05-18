<?php extract($attributes); ?>

<div class="paragraph col-sm-6 col-xs-12">
	<div class="--margin-auto" style="max-width: 400px">
		<h3 class="paragraph-heading"{{ isset($link) ? 'role=link' : '' }}>
			@if(isset($link))
				<a target="_blank" href="{{ $link }}">
			@endif

			<div class="heading-title">{{ $title }}</div>

			@if(isset($link))
				</a>
			@endif

			@if(isset($subtitle))
				<small class="heading-subtitle">{{ $subtitle }}</small>
			@endif
		</h3>
		<p class="paragraph-content">
			{{ $content }}
		</p>

		@if(isset($meta))
			<small class="paragraph-meta">
				<span>{!! $meta !!}</span>

				@if(isset($aside))
					<span class="pull-right">
						{{ $aside }}
					</span>
				@endif
			</small>
		@endif
	</div>
</div>