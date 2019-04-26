<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <title>@yield('title', config('app.name'))</title>
        <meta name="description" content="{{ config('app.description') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @stack('head')
    </head>

    <body>
        @yield('body')
    </body>

</html>