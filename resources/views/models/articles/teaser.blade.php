<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-md-10">
						<h2 style="margin: 0">{{ $article->title }}</h2>
					</div>

					@can('manage-articles')
						<div class="col-md-2 align-right">
							<a class="btn btn-sm btn-naked btn-highlight" href="{{ route('articles.edit', $article->slug) }}">
								<i class="glyphicon glyphicon-pencil"></i>
							</a>
							<form method="POST" action="{{ route('articles.destroy', $article->slug) }}" class="--inline-block">
								{{ csrf_field() }}
								{{ method_field(method('articles.destroy')) }}

								<button type="submit" class="btn btn-sm btn-naked btn-highlight">
									<i class="glyphicon glyphicon-trash"></i>
								</button>
							</form>
						</div>
					@endcan
				</div>
			</div>

			<div class="panel-body">
				<p class="article-body">
					{!! $article->body !!}
				</p>
				<hr class="hr hr-sm">
				<div class="article-date">
					<small class="text-muted">This article was posted on {{ $article->created_at->toFormattedDateString() }} by {{ $article->author->name }}.</small>
					@if($article->updated_at != $article->created_at)
						<br>
						<small class="text-muted">This article was last updated on {{ $article->updated_at->toFormattedDateString() }} by {{ $article->author->name }}.</small>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>