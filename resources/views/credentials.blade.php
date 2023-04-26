@extends('layouts.app')

@section('header')
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/functions.js'])
@endsection
@section('content')
    <div id="appCredentials">

        @auth
            <livewire:credentials id="credentials" />
            {{-- @livewire('credentials') --}}
        @else
            <div class="text-center">
                <a class="text-black-50" href="{{ Route('login') }}">
                    <h2>Login for see your credentials</h2>
                </a>
            </div>
        @endauth
    </div>
@endsection
