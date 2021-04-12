@extends('layouts.web', [
    'body' => [
        'class' => 'bg-40 text-black min-h-full'
    ]
])

@push('head')

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="/favicon.ico"/>

    <!-- Font Awesome icons (free version)-->
    <script defer src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'/>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet"/>

@endpush

@section('body')

    <div id="app">
        @yield('content')
    </div>

    <div id="tail">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>

        @stack('tail')

    </div>

@endsection
