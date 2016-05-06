@extends('layouts.app')

@section('head')

	@script('https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/8.4.0/nouislider.min.js')
	@stylesheet('https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/8.4.0/nouislider.min.css')

	<style>
		.form-control.noUi-horizontal {
			padding: 0;
			margin: 4px 0;
			height: 24px;
		}

		.form-control.noUi-horizontal .noUi-handle {
			width: 40px;
			height: 32px;
			left: -20px;
		}

		.form-control.noUi-horizontal .noUi-handle:before,
		.form-control.noUi-horizontal .noUi-handle:after {
			height: 18px;
			left: 16px;
		}

		.form-control.noUi-horizontal .noUi-handle:after {
			left: 21px;
		}
	</style>
@endsection

@section('content')

	<div class="container">
		<div class="form-group slider-group">
			@for($i = 1; $i <= 3; $i++)
				<div class="form-group">
					<div class="row">
						<div class="col-md-2 col-sm-3 col-xs-4">
							<div class="input-group">
								<span class="input-group-addon">$</span>
								<input type="number" name="slider-{{ $i }}" class="form-control">
							</div>
						</div>
						<div class="col-md-10 col-sm-9 col-xs-8">
							<p class="slider form-control" data-input-first="slider-{{ $i }}"></p>
						</div>
					</div>
				</div>
			@endfor
		</div>
	</div>

@endsection

@section('tail')

	<script>
		$('.slider-group').each(function()
		{
			// Determine all of the Sliders within this Group
			var sliders = $('.slider');
			var count = sliders.length;

			/**
			 * Calculates the Sum of all Sliders (within the current context)
			 * provided the specified Handle of which to sum.
			 *
			 * @param  int  $handle  The Slider Handle to Sum.
			 *
			 * @return int
			 */
			var sum = function(handle) {
				// Compare Sum of last Values
				var sum = 0;

				sliders.each(function() {
					var value = this.noUiSlider.get();

					sum += (value instanceof Array) ? +value[handle] : +value;
				});

				return sum;
			}

			// Register each Slider
			sliders.each(function(index, value)
			{
				// Remember ths Slider for Later
				var slider = this;

				// Remember the Slider Index for Later
				var current = index;

				// Determine the Maximum Values
				var max = [2000];

				// Determine the Slider Options
				var options = {
					start: [max[0] / count],
					connect: 'lower',
					step: 1,
					range: {
						min: [0],
						max: max
					}
				};

				// Add Pips to last Slider
				if(index + 1 == count)
					options['pips'] = {
						mode: 'count',
						values: 5,
						density: 4,
						stepped: true,
						format: {
							to: function (value) {
								return '$' + value / 100;
							},

							from: function (value) {
								return value.replace('$', '');
							}
						}
					};

				// Register the Slider
				noUiSlider.create(this, options);

				// Define the Balance Function
				var balance = function(slider, handle)
				{
					// Determine the Total of the Handles
					var total = sum(handle);

					// Track the Extra Cent
					var extra = false;

					// Check Sum for Overflow / Underflow
					if(total != max[handle])
					{
						sliders.each(function(index) {
							// Ignore Self
							if(current === index)
								return;

							// Determine Offset
							var offset = (total - max[handle]) / (count - 1);

							// Determine if the Extra Cent should be Given
							if(!extra)
							{
								offset = Math.ceil(offset);
								extra = true;
							}
							else
								offset = Math.floor(offset);

							// Determine new Slider Value
							var value = this.noUiSlider.get();
							value instanceof Array ? value[value.length - 1] -= offset : value -= offset;

							// Apply the new Slider Value
							this.noUiSlider.set(value);
						});
					}
				};

				// Register the Slide Event on each Slider
				this.noUiSlider.on('slide', function(values, handle)
				{
					balance(this, handle);
				});

				// Register the Update Event on each Slider
				this.noUiSlider.on('update', function(values, handle)
				{
					// Determine the Input Name of the First Input
					var first = this.target.dataset.inputFirst;

					// Stop if Undefined
					if(first === undefined)
						return;

					// Attempt to find the Input
					$('input[name=' + first + ']').each(function() {
						this.value = (values[0] / 100).toFixed(2);
					});
				});

				// Link Input Fields to the Sliders
				var first = $(this).data('input-first');

				// Make sure the Input specification is Defined
				if(first !== undefined)
				{
					$('input[name=' + first + ']').change(function() {
						slider.noUiSlider.set(this.value * 100);
						balance(slider, 0);
					});
				}
			});
		});
	</script>

@endsection