@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">{{ $form['heading'] }}</div>
					<div class="panel-body">

						@if(isset($form['route']))
							<?php $form['link'] = route($form['route'], isset($form['params']) ? $form['params'] : []); ?>
						@endif

						<form class="form-horizontal" role="form" method="POST" action="{{ $form['link'] }}">
							{!! csrf_field() !!}

							@if(isset($form['method']))
								{!! method_field($form['method']) !!}
							@elseif(isset($form['route']))
								{!! method_field(method($form['route'])) !!}
							@endif

							@yield('content.form')

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection