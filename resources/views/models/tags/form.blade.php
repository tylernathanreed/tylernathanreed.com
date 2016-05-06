@extends('layouts.app')

@section('content')

	<?php $tag = isset($form['tag']) ? $form['tag'] : null ?>

	<div class="container">
		<p class="actions">
			<a class="btn btn-danger" href="{{ route('tags.index') }}">
				<i class="glyphicon glyphicon-chevron-left"></i>
				<span>Cancel</span>
			</a>
		</p>

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

			<div class="panel panel-primary">
				<div class="panel-heading">
					<h1 class="panel-title">
						{{ $form['title'] }} Tag
					</h1>
				</div>

				<div class="panel-body">
					{!! Form::group('text', 'name', 'Name', val('name', $tag), [
						'placeholder' => 'Tag Name...'
					]) !!}

					@error('name')
				</div>
			</div>

			<button type="submit" class="btn btn-{{ $form['type'] }} form-control">{{ $form['submit'] }} Tag</button>
		</form>
	</div>


@endsection