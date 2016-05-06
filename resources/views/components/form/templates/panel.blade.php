<div class="panel panel-{{ is_null($status) ? 'default' : $status }}">
	@if(!is_null($title))
		<div class="panel-heading">
			<h3 class="panel-title">{!! $title !!}</h3>
		</div>
	@endif

	@if(!is_null($body))
		<div class="panel-body">
			{!! is_callable($body) ? call_user_func($body) : $body !!}
		</div>
	@endif

	@if(!is_null($content))
		{!! $content !!}
	@endif

	@if(!is_null($footer))
		<div class="panel-footer">{!! $footer !!}</div>
	@endif
</div>