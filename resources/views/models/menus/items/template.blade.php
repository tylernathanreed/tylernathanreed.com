<?php $name = 'items[' . (isset($index) ? $index : '{0}'); ?>

<li class="list-group-item form-group ui-state-default">
	<div class="container-flex">
		<i class="btn btn-bare btn-highlight glyphicon glyphicon-move" style="padding-right: 15px"></i>

		<div class="container-flex --column flex-1">
			<div class="container-flex --full-width">
				<div class="form-group flex-1">
					<label for="name" class="form-label">Name</label>
					<input type="text" name="{{ $name }}[name]" placeholder="Enter Item Name..." class="form-control" value="{{ $item['name'] or '' }}">
				</div> <!-- </form-group> -->

				<span style="padding: 0 15px"></span>

				<div class="form-group flex-1">
					<label for="route" class="form-label">Route</label>
					<input type="text" name="{{ $name }}[route]" placeholder="Enter Item URL..." class="form-control" value="{{ $item['route'] or '' }}">
				</div> <!-- </form-group> -->
			</div>

			<div class="container-flex --full-width">
				<div class="form-group flex-1">
					<label for="permissions" class="form-label">Permissions</label>
					<select id="permissions" name="{{ $name }}[permissions][]" data-placeholder="Permissions..." multiple class="chosen-select form-control">
						@foreach($permissions as $permission)
							<?php
								// Intialize the Selected Status
								$selected = false;

								// Make sure the Item has Permissions Set
								if(isset($item['permissions']))
								{
									// Determine the Array of Permission Names
									$array = isset($item['permissions'][0]['name']) ? array_pluck($item['permissions'], 'name') : $item['permissions'];

									// Determine whether or not the Permission is Selected
									$selected = in_array($permission->name, $array);
								}
							?>
							<option value="{{ $permission->name }}"{{ $selected ? ' selected' : '' }}>{{ $permission->display }}</option>
						@endforeach
					</select>
				</div>
			</div>

			<a data-id="add-form-item" class="btn btn-primary form-control" href="#">
				<i class="glyphicon glyphicon-plus"></i>
				<span>Create Nested Menu Item</span>
			</a>
		</div>

		<input type="hidden" name="{{ $name }}[order]" value="{{ $index or '{0}' }}" data-name="order">
		
		<i class="btn btn-bare btn-highlight glyphicon glyphicon-remove" data-id="remove-form-item" style="padding-left: 15px"></i>
	</div>


</li>