<?php
	// Compute Button Attributes
	$method = isset($button['route'])  ? method($button['route']) : 'GET';

	$params = isset($button['params']) ? $button['params'] : [];
	$href =   isset($button['link'])   ? $button['link']   : route($button['route'], $params);
	$class =  isset($button['class'])  ? $button['class']  : 'primary';
	$icon =   isset($button['icon'])   ? $button['icon']   : null;
	$value =  isset($button['value'])  ? $button['value']  : null;
?>

@if($method == 'GET')

	<a class="btn btn-{{ $class }}" href="{{ $href }}">
		@if(!is_null($icon))
			<i class="glyphicon glyphicon-{{ $icon }}"></i>
		@endif

		@if(!is_null($value))
			<span>{{ $value }}</span>
		@endif
	</a>

@else

	<form action="{{ $href }}" method="POST" class="btn btn-{{ $class }}">

		{{ csrf_field() }}

		@if($method != 'POST')
			{{ method_field($method) }}
		@endif

		<button type="submit" class="btn-bare">
			@if(!is_null($icon))
				<i class="glyphicon glyphicon-{{ $icon }}"></i>
			@endif

			@if(!is_null($value))
				<span>{{ $value }}</span>
			@endif
		</button>
	</form>

@endif