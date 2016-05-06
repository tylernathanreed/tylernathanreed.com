<?php unset($attributes['options']); ?>

{!! Form::select($name, $options, $value, array_merge(['class' => 'form-control'], $attributes)) !!}