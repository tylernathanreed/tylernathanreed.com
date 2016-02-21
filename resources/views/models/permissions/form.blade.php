@extends('layouts.app')

@section('content')

	<?php $permission = isset($form['permission']) ? $form['permission'] : null ?>

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

							<input type="text" name="display" placeholder="Permission Name..." class="form-control" value="{{ val('display', $permission) }}">

							@error('display')
						</div>

						<div class="panel-body">
							<div class="form-group{{ has_error('description') }}">
								<label for="description" class="control-label col-md-12">Description</label>
								<textarea name="description" placeholder="Permission Description..." class="form-control">{{ val('description', $permission) }}</textarea>

								@error('description')
							</div>

							<div class="form-group">
								<label for="roles" class="control-label col-md-12">Roles</label>
								<select id="roles" name="roles[]" data-placeholder="Roles..." multiple class="chosen-select form-control">
									@foreach($roles as $role)
										<?php $selected = !is_null($permission) && $role->can($permission); ?>
										<option value="{{ $role->name }}"{{ $selected ? ' selected' : '' }}>{{ $role->display }}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<button type="submit" class="btn btn-{{ $form['type'] }} form-control">{{ $form['submit'] }} Permission</button>
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