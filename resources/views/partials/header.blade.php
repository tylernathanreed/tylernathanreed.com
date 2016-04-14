<header>
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">

				<!-- Collapsed Hamburger -->
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<!-- Branding Image -->
				<a class="navbar-brand" href="{{ route('pages.home') }}">
					Laravel
				</a>
			</div>

			<div class="collapse navbar-collapse" id="app-navbar-collapse">
				<!-- Left Side Of Navbar -->
				@include('components.menu', [
					'menu' => $mainMenuLeft
				])

				<!-- Right Side Of Navbar -->
				<ul class="nav navbar-nav navbar-right">
					<!-- Authentication Links -->
					@if(Auth::guest())
						<li><a href="{{ route('auth.login') }}">Login</a></li>
						<li><a href="{{ route('auth.register') }}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								{{ Auth::user()->name }} <span class="caret"></span>
							</a>

							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ route('dashboard.settings') }}"><i class="fa fa-btn fa-gear"></i>Settings</a></li>
								<li><a href="{{ route('auth.logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
</header>