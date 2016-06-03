<div class="collapse navbar-collapse" id="app-navbar-collapse">
	<!-- Left Side Of Navbar -->
	<ul class="nav navbar-nav navbar-left">
		<li><a href="{{ route('pages.home') }}">Home</a></li>
		<li><a href="{{ route('articles.index') }}">Articles</a></li>
		<li><a href="{{ route('cards.index') }}">Sports Cards</a></li>
		<li><a href="{{ route('pages.resume') }}">Resume</a></li>
	</ul>
	

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