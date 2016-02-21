@extends('layouts.app')

@section('content')

	<?php $role = isset($form['role']) ? $form['role'] : null ?>

	<div class="container">
		@if(isset($form['route']))
			<?php $form['link'] = route($form['route'], isset($form['params']) ? $form['params'] : []); ?>
		@endif

		@if(isset($form['route']))
			<?php $form['method'] = method($form['route']); ?>
		@endif

		<form method="POST" action="{{ $form['link'] }}">
			{{ csrf_field() }}

			@if(isset($form['method']))
				{{ method_field($form['method']) }}
			@endif

			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="panel panel-default">
						<div class="panel-heading{{ has_error('display') }}">

							<input type="text" name="display" placeholder="Role Name..." class="form-control" value="{{ val('display', $role) }}">

							@error('display')
						</div>

						<div class="panel-body">
							<div class="form-group{{ has_error('description') }}">
								<label for="description" class="control-label col-md-12">Description</label>
								<textarea name="description" placeholder="Role Description..." class="form-control">{{ val('description', $role) }}</textarea>

								@error('description')
							</div>

							<div class="form-group">
								<label for="permissions" class="control-label col-md-12">Permissions</label>
								<select id="permissions" name="permissions[]" data-placeholder="Permissions..." multiple class="chosen-select form-control">
									@foreach($permissions as $permission)
										<?php $selected = !is_null($role) && $role->can($permission); ?>
										<option value="{{ $permission->name }}"{{ $selected ? ' selected' : '' }}>{{ $permission->display }}</option>
									@endforeach
								</select>
							</div>

							<div class="form-group">
								<label for="users" class="control-label col-md-12">Users</label>
								<select id="users" name="users[]" data-placeholder="Users..." multiple class="chosen-select form-control">
									@foreach($users as $user)
										<?php $selected = !is_null($role) && $user->is($role); ?>
										<option value="{{ $user->email }}"{{ $selected ? ' selected' : '' }}>{{ $user->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<button type="submit" class="btn btn-{{ $form['type'] }} form-control">{{ $form['submit'] }} Role</button>
				</div>
			</div>
		</form>
	</div>


@endsection

@section('tail')

	<script src="/media/js/chosen-select.js"></script>

	<script>
		$(".chosen-select").chosen();
	</script>

@endsection