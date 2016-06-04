<h2>Search</h2>
<form id="search" action="{{ route('cards.sport', $sport) }}" method="GET">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 --clear-fix">
				<div class="form-group">
					<label class="form-label">Team:</label>

					<input name="team" class="form-control" list="teams" value="{{ old('team', $search['team']) }}" title="The Player's Team" autofocus>

					<datalist id="teams">
						@foreach($teams as $team)
							<option value="{{ $team }}">{{ $team }}</option>
						@endforeach
					</datalist>
				</div> <!-- </form-group> -->
			</div> <!-- </col> -->

			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 --clear-fix">
				<div class="form-group">
					<label class="form-label">Player:</label>

					<input name="player" class="form-control" value="{{ old('player', $search['player']) }}" autocomplete="on" title="The Player's Name">
				</div> <!-- </form-group> -->
			</div> <!-- </col> -->

			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 --clear-fix">
				<div class="form-group">
					<label class="form-label">Position:</label>

					<input name="position" class="form-control" value="{{ old('position', $search['position']) }}" list="positions" title="The Player's Position">

					<datalist id="positions">
						@foreach($positions as $position)
							<option value="{{ $position }}">{{ $position }}</option>
						@endforeach
					</datalist>
				</div> <!-- </form-group> -->
			</div> <!-- </col> -->

			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 --clear-fix">
				<div class="form-group">
					<label class="form-label">Rookie Card:</label>

					<div class="radio-group">
						<div class="radio-group-item">
							<input type="radio" name="rookie" class="form-control" value="1"{{ old('rookie', $search['rookie']) == '1' ? ' checked' : '' }} title="Only Rookie Cards">
							<label>&nbsp;Yes</label>
						</div> <!-- </radio-group-item> -->

						<div class="radio-group-item">
							<input type="radio" name="rookie" class="form-control" value="0"{{ old('rookie', $search['rookie']) == '0' ? ' checked' : '' }}  title="No Rookie Cards">
							<label>&nbsp;No</label>
						</div> <!-- </radio-group-item> -->

						<div class="radio-group-item">
							<input type="radio" name="rookie" class="form-control" value="2"{{ is_null(old('rookie', $search['rookie'])) ? ' checked' : '' }}  title="Both Rookie and Non-Rookie Cards">
							<label>&nbsp;Either</label>
						</div> <!-- </radio-group-item> -->
					</div> <!-- </radio-group> -->
				</div> <!-- </form-group> -->
			</div> <!-- </col> -->
		
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 --clear-fix">
				<div class="form-group">
					<label class="form-label">Manufacturer:</label>

					<input name="manufacturer" class="form-control" value="{{ old('manufacturer', $search['manufacturer']) }}" list="manufacturers" title="The Company that made the Card">

					<datalist id="manufacturers">
						@foreach($manufacturers as $manufacturer)
							<option value="{{ $manufacturer }}">{{ $manufacturer }}</option>
						@endforeach
					</datalist>
				</div> <!-- </form-group> -->
			</div> <!-- </col> -->

			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 --clear-fix">
				<div class="form-group">
					<label class="form-label">Year:</label>

					<div class="input-group">
						<div class="input-group-addon">19</div>
						<input type="number" name="year" class="form-control" value="{{ old('year', $search['year']) }}" min="0" max="99" title="The Year the Card was made">
					</div> <!-- </input-group> -->
				</div> <!-- </form-group> -->
			</div> <!-- </col> -->

			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 --clear-fix">
				<div class="form-group">
					<label class="form-label">Number:</label>

					<input type="number" name="number" class="form-control" value="{{ old('number', $search['number']) }}" min="1" max="600" title="The Card Number">
				</div> <!-- </form-group> -->
			</div> <!-- </col> -->

			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 --clear-fix">
				<div class="form-group">
					<label class="form-label">Price:</label>

					<div class="input-group">
						<div class="input-group-addon">$</div>
						<input type="text" name="price" class="form-control" value="{{ old('price', $search['price']) }}" pattern="^\d*(\.\d{2}$)?" title="The Price of the Card">
					</div> <!-- </input-group> -->
				</div> <!-- </form-group> -->
			</div> <!-- </col> -->
		</div> <!-- </row> -->

		<div class="row">
			<div class="col-xs-12">
				<button type="submit" class="btn btn-primary form-control">
					<i class="glyphicon glyphicon-search"></i>
					<span>Search</span>
				</button>
			</div>
		</div> <!-- </row> -->
	</div> <!-- </container-fluid> -->
</form>

@section('tail')
	<script>
		$(document).ready(function() {
			$("#search").submit(function() {
				$("input", this).each(function() {
					if($(this).val() == "" || (this.name == 'rookie' && $(this).val() == "2"))
						$(this).remove();
				});
			});
		 });
	</script>
@endsection