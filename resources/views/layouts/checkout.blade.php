@extends('layouts.base')

@section('body-class', 'checkout')

@section('body')
    @include('front.partials.header.checkout')
    @include('messages')
    <main class="main">
        <div class="wrap">@yield('content')</div>
    </main>
@endsection