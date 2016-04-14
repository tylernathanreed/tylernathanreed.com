<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Tyler Nathan Reed</title>

		<!-- Fonts -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
		<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

		<!-- Styles -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
		<link href="/media/css/all.min.css" rel="stylesheet">

		@yield('head')

		<style>
			body {
				font-family: 'Lato';
			}

			.fa-btn {
				margin-right: 6px;
			}
		</style>
	</head>

	<body id="app-layout">
		@include('partials.header')

		@include('reed/flash::flashes')

		@yield('content')

		<div id="tail" style="display: none;">
			<!-- Scripts -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
			<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

			<div class="templates" style="display: none;">
				@yield('templates')
			</div>

			@yield('tail')
		</div> <!-- </tail> -->
	</body>
</html>