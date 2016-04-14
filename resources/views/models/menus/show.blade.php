@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-10">
								<h2 style="margin: 0">{{ $menu->title }}</h2>
								<small>{{ $menu->slug }}</small>
							</div>
							<div class="col-md-2 align-right">
								<a class="btn btn-sm btn-naked btn-highlight" href="{{ route('menus.edit', $menu->slug) }}">
									<i class="glyphicon glyphicon-pencil"></i>
								</a>
								<form method="POST" action="{{ route('menus.destroy', $menu->slug) }}" class="inline-block">
									{{ csrf_field() }}
									{{ method_field(method('menus.destroy')) }}

									<button type="submit" class="btn btn-sm btn-naked btn-highlight">
										<i class="glyphicon glyphicon-trash"></i>
									</button>
								</form>
							</div>
						</div>
					</div>

					<div class="panel-body">
						<ul class="menu-items list-group">
							<li class="list-group-item active">Items</li>

							@foreach($menu->items as $item)
								<li class="list-group-item">
									<h5 class="list-group-item-heading --bold">{{ $item->name }}</h5>
									<small class="list-group-item-text">{{ $item->route }}</small>

									<small class="list-group-item-text pull-right --faded">
										{{ implode(', ', $item->permissions->pluck('name')->toArray()) }}
									</small>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection