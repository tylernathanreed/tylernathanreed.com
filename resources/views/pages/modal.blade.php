@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Modal Test</div>

					@include('partials.modal', [
						'modal' => [
							'title' => 'Edit Menu Item',
							'fields' => [
								'title' => [
									'label' => 'Title',
									'type' => 'text',
									'class' => 'span-left',
									'maxlength' => 255,
									'placeholder' => 'The Menu Item Title...'
								]
							]
						]
					])
				</div>
			</div>
		</div>
	</div>

@endsection