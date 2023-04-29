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
    @auth
        <link rel="icon" href="/ico/security-open.svg">
    @else
        <link rel="icon" href="/ico/security-close.svg">
    @endauth

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/functions.js'])
    @yield('head')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    @livewireStyles
</head>

<body>
    <div id="root" class="root">
        <header class="header">
            @include('partials.nav')
        </header>
        <main id="main" class="main">
            @yield('content')
        </main>
        <footer class="footer control-style">
            Copyright ©® 2023 | created by SNARZ | general idea by Lean
        </footer>
    </div>
</body>

@livewireScripts

</html>

