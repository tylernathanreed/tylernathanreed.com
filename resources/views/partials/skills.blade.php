<!-- Skills -->
<?php $legend = [
	'blue' => [5, null],
	'green' => [3, 4],
	'yellow' => [1, 2],
	'red' => [null, 0]
]; ?>

<?php $calc = function($age) use ($legend) {

	// Iterate through each legend item
	foreach($legend as $key => $range) {

		// Check for upper bound
		if(is_null($range[0]) && $age <= $range[1]) {
			return $key;
		}

		// Check for upper bound
		else if(is_null($range[1]) && $age >= $range[0]) {
			return $key;
		}

		// Check if the age is within (inclusive) the range
		else if(!is_null($range[0]) && !is_null($range[1]) && in_array($age, range($range[0], $range[1]))) {
			return $key;
		}

	}

	// Unknown
	return 'black';

}; ?>

<section class="mb-6">
	<h2 class="text-center">Skills</h2>

	<div class="row">
		@foreach($groups as $name => $skills)
			<div class="col-md-6">
				<h3 class="text-center mb-3">{{ $name }}</h3>

				<table class="text-center mx-auto mb-4 w-full table-fixed">
					<tbody>
						@foreach(array_chunk($skills, 4, true) as $chunk)
							<tr>
								@foreach($chunk as $skill => $year)
									<?php $age = max(date('Y') - $year, 0); ?>
									<?php $color = $calc($age); ?>
									<td class="bg-{{ $color }} text-white py-1">{{ $skill }}</td>
								@endforeach
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		@endforeach
	</div>

	<div class="skill-legend">
		@foreach($legend as $key => $range)
			<div class="skill-legend-item">
				<div class="skill-legend-key bg-{{ $key }}"></div>
				<span class="skill-legend-value">
					@if(is_null($range[0]))
						< {{ $range[1] + 1 }} @choice('year|years', $range[1] + 1)
					@elseif(is_null($range[1]))
						{{ $range[0] }}+ years
					@else
						{{ $range[0] }} - {{ $range[1] }} years
					@endif
				</span>
			</div>
		@endforeach
	</div>
</section>