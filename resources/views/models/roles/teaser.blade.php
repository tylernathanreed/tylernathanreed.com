<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-md-10">
						<h2 style="margin: 0">
							<a href="{{ route('roles.show', $role->slug) }}">
								{{ $role->display }}
							</a>
						</h2>
						<small>{{ $role->name }}</small>
					</div>
					<div class="col-md-2 align-right">
						<a class="btn btn-sm btn-naked btn-highlight" href="{{ route('roles.edit', $role->slug) }}">
							<i class="glyphicon glyphicon-pencil"></i>
						</a>
						<form method="POST" action="{{ route('roles.destroy', $role->slug) }}" class="--inline-block">
							{{ csrf_field() }}
							{{ method_field(method('roles.destroy')) }}

							<button type="submit" class="btn btn-sm btn-naked btn-highlight">
								<i class="glyphicon glyphicon-trash"></i>
							</button>
						</form>
					</div>
				</div>
			</div>

			<div class="panel-body">
				<p class="role-description">
					{!! $role->description !!}
				</p>

				@ifnotempty($role->permissions)
					<p class="role-permissions">
						<ul class="list-group">
							<li class="list-group-item active">Permissions</li>

							@foreach($role->permissions as $permission)
								<li class="list-group-item">{{ $permission->display }}</li>
							@endforeach
						</ul>
					</p>
				@endifnotempty

				@ifnotempty($role->users)
					<p class="role-users">
						<ul class="list-group">
							<li class="list-group-item active">Users</li>

							@foreach($role->users as $user)
								<li class="list-group-item">{{ $user->name }}</li>
							@endforeach
						</ul>
					</p>
				@endifnotempty
			</div>
		</div>
	</div>
</div>