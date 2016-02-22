<div class="col-md-3 col-sm-3 col-xs-7 text-small">{{ $skill['name'] }}</div>
<div class="col-md-3 col-sm-3 col-xs-5">
	@switch($skill['years'])
		@case(1)
			<?php $skill['type'] = 'danger'; ?>
			@break

		@case(2)
		@case(3)
			<?php $skill['type'] = 'warning'; ?>
			@break

		@case(4)
		@case(5)
			<?php $skill['type'] = 'primary'; ?>
			@break

		@default
			<?php $skill['type'] = 'success'; ?>
			@break
	@endswitch

	<span class="label label-{{ $skill['type'] }} label-as-badge">
		@choice('words.years', $skill['years'], ['years' => $skill['years']])
	</span>
</div>