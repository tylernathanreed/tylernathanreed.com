@extends('layouts.app')

@section('content')

    @include('partials.navbar')

    <main id="page-content">
        @yield('page.content')
    </main>

    @include('partials.footer')
    @include('partials.copyright')

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
    <div class="scroll-to-top d-lg-none position-fixed">
        <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
    </div>

@endsection