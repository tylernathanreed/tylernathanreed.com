@extends('layouts.app')

@section('content')

	<div class="container">
		@can('manage-articles')
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<a class="btn btn-primary" href="{{ route('articles.create') }}">
						<i class="glyphicon glyphicon-plus"></i>
						<span>Create New Article</span>
					</a>
				</div>
			</div>
			<br>
		@endcan

		@foreach($articles as $article)
			@include('models.articles.teaser')
		@endforeach
	</div>

@endsection