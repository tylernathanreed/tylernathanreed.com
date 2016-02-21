@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-10">
								<h2 style="margin: 0">{{ $permission->display }}</h2>
								<small>{{ $permission->name }}</small>
							</div>
							<div class="col-md-2 align-right">
								<a class="btn btn-sm btn-naked btn-highlight" href="{{ route('permissions.edit', $permission->slug) }}">
									<i class="glyphicon glyphicon-pencil"></i>
								</a>
								<form method="POST" action="{{ route('permissions.destroy', $permission->slug) }}" class="inline-block">
									{{ csrf_field() }}
									{{ method_field(method('permissions.destroy')) }}

									<button type="submit" class="btn btn-sm btn-naked btn-highlight">
										<i class="glyphicon glyphicon-trash"></i>
									</button>
								</form>
							</div>
						</div>
					</div>

					<div class="panel-body">
						<p class="permission-description">
							{!! $permission->description !!}
						</p>

						@ifnotempty($permission->roles)
							<p class="permission-roles">
								<ul class="list-group">
									<li class="list-group-item active">Roles</li>

									@foreach($permission->roles as $role)
										<li class="list-group-item">{{ $role->display }}</li>
									@endforeach
								</ul>
							</p>
						@endifnotempty
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection