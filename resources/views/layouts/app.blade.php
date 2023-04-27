<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- TITLE SHEET --}}
    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- ICON SHEET --}}
    <link rel="icon" href="/ico/security.svg">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield('header')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    @livewireStyles
</head>
{{-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
    <!-- CSRF Token -->
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    {{-- TITLE SHEET --}}
    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    {{-- ICON SHEET --}}<!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="icon" href="/ico/security.svg"> --}}
    <!-- Scripts -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield('header')
@livewireStyles
</head> --}}

<body>
    <div id="root" class="root">
        <header class="header">
            @include('partials.nav')
        </header>
        <main id="main" class="main">
            @yield('content')
        </main>
        <footer class="footer">
            Copyright ©® 2023 | created by SNARZ | general idea by Lean
        </footer>
    </div>
</body>

@livewireScripts
</html>
