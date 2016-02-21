<footer class="footer">
	<div class="footer-content">
		<ul class="flex-left">
			<li>
				<a itemprop="url" href="/">
					<img itemprop="logo" src="/media/images/misc/sa-logo.svg" alt="Bible.org">
				</a>
			</li>

			@yield('footer-left')
		</ul>

		<ul class="flex-right">
			@yield('footer-right')

			<li><p>&copy; {{ date('Y') }} Bible.org</p></li>
		</ul>
	</div>
</footer>