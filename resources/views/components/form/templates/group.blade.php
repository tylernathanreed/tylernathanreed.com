<?php $group['class'] = "form-group {$type}-field" . (isset($group['class']) ? ' ' . $group['class'] : ''); ?>

<div{!! Html::attributes($group) !!} data-field-name="{{ $name }}">

	@if(!is_null($label))
		{{ Form::label($label, null, ['class' => 'form-label']) }}
	@endif

	@if(isset($attributes['prefix']) || isset($attributes['suffix']))
		<?php $inputGroup = true; ?>
		<div class="input-group">

			@if(isset($attributes['prefix']))
				<span class="input-group-addon input-group-prefix">{{ $attributes['prefix'] }}</span>
				<?php unset($attributes['prefix']); ?>
			@endif

			@if(isset($attributes['suffix']))
				<?php $suffix = $attributes['suffix']; ?>
				<?php unset($attributes['suffix']); ?>
			@endif
	@endif

	@if($type == 'select')
		@include('components.form.templates.groups.select', [
			'name' => $name,
			'options' => $attributes['options'],
			'value' => $value,
			'attributes' => $attributes
		])
	@else
		@include('components.form.templates.groups.' . $type, [
			'name' => $name,
			'value' => $value,
			'attributes' => $attributes
		])
	@endif

	@if(isset($inputGroup) && $inputGroup)
		@if(isset($suffix))
			<span class="input-group-addon input-group-suffix">{{ $suffix }}</span>
			<?php unset($suffix); ?>
		@endif

		</div>
	@endif
</div>