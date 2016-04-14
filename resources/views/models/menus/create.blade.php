@extends('layouts.app')

@section('content')

	<div class="container">
		@include('partials.errors')

		<form method="POST" action="{{ route('menus.store') }}">
			{{ csrf_field() }}
			{{ method_field(method('menus.store')) }}

			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="panel panel-default">
						<div class="panel-heading">
							<input type="text" name="title" placeholder="Enter Menu Title..." class="form-control" value="{{ old('title') }}">
						</div>

						<div class="panel-body">
							<div class="form-group">
								<label for="class" class="form-label">Class</label>
								<input type="text" name="class" placeholder="Enter Menu Class... (e.g. 'menu-header')" class="form-control" value="{{ old('class') }}">
							</div>

							<div class="form-group">
								<label for="items" class="form-label">Items</label>
								<ul id="form-items" class="list-group">
									@foreach((array) old('items') as $index => $item)
										@include('models.menus.items.template', compact($index, $item))
									@endforeach
								</ul>
								<a id="add-form-item" class="btn btn-primary form-control" href="#">
									<i class="glyphicon glyphicon-plus"></i>
									<span>Create Menu Item</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<button type="submit" class="btn btn-success form-control">Create Menu</button>
				</div>
			</div>
		</form>
	</div>

@endsection

@section('tail')

	<script src="/media/js/forms.js"></script>

	<script>
		$('#form-items').listable({
			template: '#form-item-template',
			add: '#add-form-item',
			remove: '[data-id=remove-form-item]'
		});
	</script>

@endsection

@section('templates')

	<div id="form-item-template" class="template">
		@include('models.menus.items.template')
	</div>

@endsection