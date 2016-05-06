<h4 class="list-group-item-heading">{{ $tag->name }}</h4>
<p class="list-group-item-text">{{ $tag->slug }}</p>
<div class="list-group-item-actions">
	<a class="btn btn-sm btn-naked btn-highlight" href="{{ route('tags.edit', $tag->slug) }}">
		<i class="glyphicon glyphicon-pencil"></i>
	</a>

	<form method="POST" action="{{ route('tags.destroy', $tag->slug) }}" class="--inline-block">
		{{ csrf_field() }}
		{{ method_field(method('tags.destroy')) }}

		<button type="submit" class="btn btn-sm btn-naked btn-highlight">
			<i class="glyphicon glyphicon-trash"></i>
		</button>
	</form>
</div>