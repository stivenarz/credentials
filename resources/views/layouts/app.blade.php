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

<body>
    <header>
        @include('partials.nav')
    </header>
    <div id="app" class="h-full">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="d-flex h-full w-full footer-end m-auto">
        <p class="text-secondary text-center mb-2">
            Copyright ©® 2023 | created by SNARZ | general idea by Lean
        </p>
    </footer>
    @livewireScripts

</body>

</html>
