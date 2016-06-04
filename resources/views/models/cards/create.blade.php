@extends('layouts.form', [
	'form' => [
		'class' => 'primary',
		'heading' => 'Create new ' . ucfirst($sport) . ' Card',
		'route' => 'cards.store',
		'params' => ['sport' => $sport]
	]
])

@section('content.form')

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<div class="form-left">
					<div class="form-group">
						<label class="form-label">Team:</label>

						<input name="team" class="form-control" list="teams" value="{{ old('team') }}" title="The Player's Team" autofocus required>

						<datalist id="teams">
							@foreach($teams as $team)
								<option value="{{ $team }}">{{ $team }}</option>
							@endforeach
						</datalist>
					</div> <!-- </form-group> -->

					<div class="form-group">
						<label class="form-label">Player:</label>

						<input name="player" class="form-control" value="{{ old('player') }}" autocomplete="on" title="The Player's Name" required>
					</div> <!-- </form-group> -->

					<div class="form-group">
						<label class="form-label">Position:</label>

						<input name="position" class="form-control" value="{{ old('position') }}" list="positions" title="The Player's Position">

						<datalist id="positions">
							@foreach($positions as $position)
								<option value="{{ $position }}">{{ $position }}</option>
							@endforeach
						</datalist>
					</div> <!-- </form-group> -->

					<div class="form-group">
						<label class="form-label">Rookie Card:</label>

						<div class="radio-group">

							<div class="radio-group-item">
								<input type="radio" name="rookie" class="form-control" value="1"{{ old('rookie') == '1' ? ' checked' : '' }} title="This is a Rookie Card">
								<label>&nbsp;Yes</label>
							</div> <!-- </radio-group-item> -->

							<div class="radio-group-item">
								<input type="radio" name="rookie" class="form-control" value="0"{{ old('rookie') == '1' ? '' : ' checked' }}  title="This is not a Rookie Card">
								<label>&nbsp;No</label>
							</div> <!-- </radio-group-item> -->

						</div> <!-- </radio-group> -->
					</div> <!-- </form-group> -->
				</div> <!-- </form-left> -->
			</div> <!-- </col> -->
		
			<div class="col-sm-6 col-xs-12">
				<div class="form-right">
					<div class="form-group">
						<label class="form-label">Manufacturer:</label>

						<input name="manufacturer" class="form-control" value="{{ old('manufacturer') }}" list="manufacturers" title="The Company that made the Card" required>

						<datalist id="manufacturers">
							@foreach($manufacturers as $manufacturer)
								<option value="{{ $manufacturer }}">{{ $manufacturer }}</option>
							@endforeach
						</datalist>
					</div> <!-- </form-group> -->

					<div class="form-group">
						<label class="form-label">Year:</label>

						<div class="input-group">
							<div class="input-group-addon">19</div>
							<input type="number" name="year" class="form-control" value="{{ old('year') }}" min="0" max="99" title="The Year the Card was made" required>
						</div> <!-- </input-group> -->
					</div> <!-- </form-group> -->

					<div class="form-group">
						<label class="form-label">Number:</label>

						<input type="number" name="number" class="form-control" value="{{ old('number') }}" min="1" max="600" title="The Card Number" required>
					</div> <!-- </form-group> -->

					<div class="form-group">
						<label class="form-label">Price:</label>

						<div class="input-group">
							<div class="input-group-addon">$</div>
							<input type="text" name="price" class="form-control" value="{{ old('price') }}" pattern="^\d*(\.\d{2}$)?" title="The Price of the Card" required>
						</div> <!-- </input-group> -->
					</div> <!-- </form-group> -->
				</div> <!-- </form-right> -->
			</div> <!-- </col> -->
		</div> <!-- </row> -->

		<div class="form-group">
			<label>Description:</label>

			<textarea name="description" class="form-control" style="min-width: 100%; max-width: 100%;">{{ old('description') }}</textarea>
		</div> <!-- </form-group> -->

		<div class="row">
			<div class="col-sm-10 col-sm-offset-1 col-xs-12 --no-padding">
				<button type="submit" class="btn btn-primary --full-width">
					<i class="glyphicon glyphicon-plus"></i>
					<span>Create Card</span>
				</button>
			</div> <!-- </col> -->
		</div> <!-- </row> -->

	</div> <!-- </container-fluid> -->

@endsection