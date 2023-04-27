@extends('layouts.app')

@section('header')
    @vite(['resources/js/functions.js'])
@endsection
@section('content')
    @auth
        <livewire:credentials />
        {{-- @livewire('credentials') --}}
    @endauth
@endsection
