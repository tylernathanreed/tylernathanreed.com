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

@push('tail')

    <!-- Bootstrap core JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Third party plugin JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <!-- Core theme JS -->
    <script src="js/scripts.js"></script>

@endpush