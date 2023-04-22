@extends('layouts.app')

@section('content')
    @auth
    <livewire:credentials id="credentials"/>
        {{-- @livewire('credentials') --}}
    @else
    <div class="text-center">
        <a class="text-black-50" href="{{ Route('login') }}"><h2>Login for see your credentials</h2></a>
    </div>
    @endauth
@endsection
