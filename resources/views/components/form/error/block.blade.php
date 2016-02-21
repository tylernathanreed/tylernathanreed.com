@if($errors->has($block['name']))
	<span class="help-block">
		<strong>{{ $errors->first($block['name']) }}</strong>
	</span>
@endif