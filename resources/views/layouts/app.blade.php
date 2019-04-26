@extends('layouts.web')

@push('head')

	<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
	<link href="{{ mix('css/app.css') }}" rel="stylesheet">

@endpush

@section('body')

	<div id="app">
		@yield('content')
	</div>

	<div id="tail">
		@stack('tail')
	</div>

@endsection
