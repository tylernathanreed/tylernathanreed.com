<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	<h4 id="{{ $modal['id'] }}-label" class="modal-title">{{ $modal['title'] }}</h4>
</div> <!-- </modal-header> -->

<div class="modal-body">
	<form>
		<div data-control="formwidget" class="form-widget form-elements layout" role="form">
			<div class="layout-row min-size">
				<div class="form-tabless-fields">
					@foreach($modal['fields'] as $name => $field)
						<?php unset($type, $label, $value, $attributes, $group); ?>
						<?php extract($field, EXTR_OVERWRITE); ?>

						{!! Form::group($type, $name, $label, $value ?? null, $attributes ?? [], $group ?? []) !!}
					@endforeach
				</div> <!-- </form-tabless-fields> -->
			</div> <!-- </layout-row> -->
		</div> <!-- </form-widget> -->
	</form>
</div> <!-- </modal-body> -->

<div class="modal-footer">
	<button type="button" class="btn btn-primary">Apply</button>
	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
</div>