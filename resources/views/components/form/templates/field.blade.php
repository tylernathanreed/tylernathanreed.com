<div class="form-group{{ has_error($field['name']) }}">
	<label class="col-md-4 control-label">{{ $field['label'] }}</label>

	<div class="col-md-6">
		<input type="{{ $field['type'] }}" class="form-control{{ isset($field['class']) ? $field['class'] : '' }}" name="{{ $field['name'] }}" value="{{ old($field['name']) }}">

		@error($field['name'])
	</div>
</div>