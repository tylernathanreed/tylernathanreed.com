@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Modal Test</div>

					<div class="panel-body">
						<button type="button" class="btn btn-primary btn-lg" href="{{ route('menus.items.create') }}" data-toggle="modal" data-target="#modal">
							Launch demo modal
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('modal')

	@include('partials.modal')

@endsection