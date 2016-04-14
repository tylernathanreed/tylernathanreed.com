<?php $group['class'] = "form-group {$type}-field" . (isset($group['class']) ? ' ' . $group['class'] : ''); ?>

<div{!! Html::attributes($group) !!} data-field-name="{{ $name }}">
	@if($type == 'text')
		@include('components.form.templates.groups.text')
	@endif
</div>