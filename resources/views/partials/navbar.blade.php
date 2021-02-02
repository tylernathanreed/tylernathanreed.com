<nav class="site-nav navbar bg-secondary {{ isset($stickyNav) ? ' fixed-top' : '' }}">
    <div class="container">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto md:navbar-expand">
            <li class="nav-item">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Reedware
                </a>
            </li>
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav navbar-expand ml-auto">
            <li class="nav-item ml-4">
                <a class="nav-link" href="{{ route('pages.resume') }}">{{ __('Resume') }}</a>
            </li>

            <li class="nav-item ml-4">
                <a class="nav-link" href="{{ route('pages.about') }}">{{ __('About') }}</a>
            </li>
        </ul>
    </div>
</nav>