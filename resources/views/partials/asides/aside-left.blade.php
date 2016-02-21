<aside id="aside-left" class="aside aside-left hide">
	<ul class="aside-list">
		@if(Auth::guest())
			<li class="aside-item">
				<a href="{{ route('auth.login') }}">Login</a>
			</li>
			<li class="aside-item">
				<a href="{{ route('auth.register') }}">Register</a>
			</li>
		@else
			<li class="aside-item">
				<a href="{{ route('my.profile') }}">Profile</a>
			</li>
			<li class="aside-item">
				<a href="{{ route('auth.logout') }}">Logout</a>
			</li>
		@endif

		</li>

		<li class="aside-item">
			<a href="{{ route('pages.about') }}">About Us</a>
		</li>

		<li class="aside-item">
			<a target="_blank" href="https://bible.org/article/contact-us?category=ChurchDiscipleshipToolsProject">Contact Us</a>
			<i class="item-note">through Bible.org</i>
		</li>

		<li class="aside-item">
			<a target="_blank" href="{{ route('pages.donate') }}">Donate</a>
			<i class="item-note">through Bible.org</i>
		</li>

		<li class="aside-item">
			<a href="{{ route('reports.create') }}">Report</a>
			<i class="item-note">a Problem</i>
		</li>

		@yield('aside-left')
	</ul>

	<ul class="aside-list aside-list-bottom">
		<li><a href="//www.bible.org"><img src="/media/images/misc/logo.svg" alt="Bible.org"></a></li> 
		<li><a href="//net.bible.org"><img src="/media/images/misc/net-logo.svg" alt="Lumina"></a></li>
		<li><a href="//store.bible.org">Bookstore</a></li>
		<li><a href="//labs.bible.org">Labs</a></li>
		<li><a href="//blogs.bible.org">Blogs</a></li>
	</ul>
</aside>