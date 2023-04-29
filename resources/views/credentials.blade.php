@extends('layouts.app')

@section('content')
    @auth
    <div style="width: 100%; height:100%">
        <livewire:credentials />
    </div>
        {{-- @livewire('credentials') --}}
    @endauth
@endsection
