@extends('layouts.app')

@section('content')

	<div class="container">
		<form method="POST" action="{{ route('articles.store') }}">
			{{ csrf_field() }}
			{{ method_field(method('articles.store')) }}

			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="panel panel-default">
						<div class="panel-heading">
							<input type="text" name="title" placeholder="Enter Title Here..." class="form-control">
						</div>

						<div class="panel-body">
							<textarea name="body" placeholder="Enter Text Here..." class="form-control" style="height: 10em; height: calc(100vh - 240px);"></textarea>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<button type="submit" class="btn btn-success form-control">Create Article</button>
				</div>
			</div>
		</form>
	</div>

@endsection