@extends('layouts.base')

@section('body-class', 'auth')

@section('body')
    <div class="auth__wrap">
        <header class="auth__header">
            <a href="{{ route('home') }}" class="auth__logo">laragum</a>
            @yield('header')
            <div class="auth__title">@yield('title')</div>
        </header>
        <main class="auth__content">@yield('content')</main>
    </div>
@endsection