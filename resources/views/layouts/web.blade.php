<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <!-- Boilerplate -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="Tyler Reed"/>
        <meta name="description" content="My personal website."/>

        <!-- Title -->
        <title>@yield('title', config('app.name', 'Reedware'))</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @stack('head')
    </head>

    <body{!! isset($body['class']) ? ' class="' . $body['class'] . '"' : '' !!}>
        @yield('body')
    </body>

</html>
