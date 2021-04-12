<nav class="site-nav navbar navbar-expand-md bg-secondary {{ isset($stickyNav) ? ' fixed-top' : '' }}">
    <div class="container">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ url('images/brand_full.jpg') }}"/ alt="{{ config('app.name') }}" height="22" class="d-none d-sm-block"/>
                    <img src="{{ url('images/brand_letter.jpg') }}"/ alt="{{ config('app.name') }}" height="22" class="d-block d-sm-none"/>
                </a>
            </li>
        </ul>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-toggle" aria-controls="navbar-toggle" aria-expanded="false" aria-label="Toggle Navigation">
            <i class="fas fa-bars text-white"></i>
        </button>

        <!-- Right Side Of Navbar -->
        <div id="navbar-toggle" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto mt-2 mt-md-0">
                <li class="nav-item ml-4">
                    <a class="nav-link" href="{{ route('pages.resume') }}">{{ __('Resume') }}</a>
                </li>

                <li class="nav-item ml-4">
                    <a class="nav-link" href="{{ route('pages.projects') }}">{{ __('Projects') }}</a>
                </li>

                <li class="nav-item ml-4">
                    <a class="nav-link" href="{{ route('pages.about') }}">{{ __('About') }}</a>
                </li>

                <li class="nav-item ml-4">
                    <a class="nav-link" href="{{ route('pages.contact') }}">{{ __('Contact') }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>