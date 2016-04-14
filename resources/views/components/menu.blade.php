@if(!is_null($menu))
	<ul class="{{ $menu->class }}">
		@foreach($menu->items as $item)
			<?php $can = true; ?>

			@foreach($item->permissions as $permission)
				@if(!$auth || $auth->cannot($permission->name))
					<?php $can = false; ?>
					@break
				@endif
			@endforeach

			@if($can)
				<li class="{{ $item->active ? 'active' : ''}}"><a href="{{ route($item->route) }}">{{ $item->name }}</a></li>
			@endif
		@endforeach
	</ul>
@endif
