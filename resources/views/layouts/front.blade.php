@extends('layouts.base')

@section('body-class', 'app')

@section('body')
    @include('front.partials.header.main')
    <main class="main">@yield('content')</main>
    @include('front.partials.footer')
@endsection