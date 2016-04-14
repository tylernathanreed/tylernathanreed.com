{{ Form::label($name, null, ['class' => 'form-label']) }}
{{ Form::text($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}