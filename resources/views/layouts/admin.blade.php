@extends('layouts.base')

@section('body-class', 'admin')

@section('body')
    @include('admin.partials.sidebar')
    @include('messages')
    <main class="content">@yield('content')</main>
@endsection