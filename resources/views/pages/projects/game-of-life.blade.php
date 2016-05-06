@extends('layouts.app')

@section('head')
	<meta charset="utf-8">
	<title>Game of Life</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@stylesheet('/media/css/projects.min.css')
@endsection


@section('content')
	<section id="game-of-life" class="container">
		<div class="panel panel-primary">
			<header class="panel-heading">
				<h1 class="panel-title">The Game of Life</h1>
			</header>

			<div class="panel-body">
				<div id="game">
					<div class="navbar-flex navbar-top navbar-game">
						<ul class="navbar-left">
							<li>
								<button class="btn btn-primary btn-run" data-toggle="tooltip" title="Play">
									<i class="glyphicon glyphicon-play"></i>
								</button>
							</li>
							<li>
								<button class="btn btn-primary btn-clear" data-toggle="tooltip" title="Clear All">
									<i class="glyphicon glyphicon-trash"></i>
								</button>
							</li>
							<li>
								<button class="btn btn-primary btn-refresh" data-toggle="tooltip" title="Restart">
									<i class="glyphicon glyphicon-refresh"></i>
								</button>
							</li>
						</ul>
						<ul class="navbar-right">
							<li><div class="counter">Generation: 0</div></li>
						</ul>
					</div> <!-- </navbar> -->

					<div class="wrapper">
						<canvas class="canvas"></canvas>
					</div> <!-- </wrapper> -->
				</div> <!-- </game> -->
			</div> <!-- </panel-body> -->
		</div> <!-- </panel> -->
	</section>
@endsection

@section('tail')
	<script src="/media/js/projects/game-of-life.min.js"></script>
	<script>
		$(function() {
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
@endsection