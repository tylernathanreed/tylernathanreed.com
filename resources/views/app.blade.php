<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>
			@yield('title')
		</title>
		<link rel="stylesheet" href="/media/css/bootstrap.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

		@yield('head')
	</head>
	<body>
		@yield('content')
	</body>
</html>
