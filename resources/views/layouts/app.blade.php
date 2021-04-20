@extends('layouts.web', [
    'body' => [
        'class' => 'bg-40 text-black min-h-full'
    ]
])

@push('head')

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="/favicon.ico"/>

    <!-- Theme Color -->
    <meta name="theme-color" content="#3490dc">

    <!-- Font Awesome icons (free version)-->
    <script defer src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet"/>

    <!-- Chartist -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>

    <!-- Config -->
    @config

    <!-- Routes -->
    @routes

@endpush

@section('body')

    @inertia

    <!-- Scripts -->
    <div id="tail">
        <script src="{{ mix('js/manifest.js') }}"></script>
        <script src="{{ mix('js/vendor.js') }}"></script>
        <script src="{{ mix('js/app.js') }}"></script>

        @stack('tail')
    </div>

@endsection
