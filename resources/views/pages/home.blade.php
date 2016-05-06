@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				{!! Form::panel(null, 'Welcome', 'This is the Home page.') !!}
			</div>
		</div>
	</div>

@endsection
