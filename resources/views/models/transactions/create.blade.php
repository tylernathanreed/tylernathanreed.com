@extends('layouts.app')

@section('content')

	<div class="container">
		<form method="POST" action="{{ route('transactions.store') }}">
			{{ csrf_field() }}
			{{ method_field(method('transactions.store')) }}

			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Create Transaction</h3>
						</div>

						<div class="panel-body">
							<div class="row">
								{!! Form::group('text', 'name', 'Name', old('name'), [
									'placeholder' => 'Transaction Title...'
								], ['class' => 'col-sm-6 col-xs-12']) !!}

								{!! Form::group('select', 'tags[]', 'Tags', old('tags[]'), [
									'data-placeholder' => 'Tags...',
									'multiple' => 'true',
									'options' => $tags
								], ['class' => 'col-sm-6 col-xs-12']) !!}
							</div>

							<div class="row">
								{!! Form::group('date', 'settled_at', 'Settled At', old('settled_at', date('Y-m-d')), [
								], ['class' => 'col-sm-6 col-xs-12']) !!}

								{!! Form::group('number', 'cents', 'Amount', old('cents', 0), [
									'prefix' => '$',
									'min' => 0,
									'placeholder' => 'The amount due...'
								], ['class' => 'col-sm-6 col-xs-12']) !!}
							</div>

							<div class="row">
								{!! Form::group('select', 'paid_by[]', 'Paid By', null, [
									'multiple' => 'true',
									'data-placeholder' => 'The people who paid...',
									'options' => $users
								], ['class' => 'col-sm-6 col-xs-12']) !!}

								{!! Form::group('select', 'paid_for[]', 'Paid For', null, [
									'multiple' => 'true',
									'data-placeholder' => 'The people who participated...',
									'options' => $users
								], ['class' => 'col-sm-6 col-xs-12']) !!}
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<button type="submit" class="btn btn-success form-control">Create Transaction</button>
				</div>
			</div>
		</form>
	</div>

@endsection

@section('tail')

	<script src="/media/js/chosen-select.js"></script>

	<script>
		$("select[multiple]").chosen();
	</script>

@endsection