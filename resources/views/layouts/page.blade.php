@extends('layouts.app')

@section('content')

    @include('partials.navbar')

    <main class="py-4">
        @yield('page.content')
    </main>
@endsection