@extends('layouts.base')

@section('body-class', 'error-page')

@section('body')
    <div class="wrap">
        <div class="error error-@yield('code')">
            <div class="error__header">
                <h1 class="header__title">@yield('title')</h1>
            </div>
            <div class="error__content">
                <p>@yield('message')</p>
                <a href="{{ route('home') }}" class="button">Back home</a>
            </div>
        </div>
    </div>
@endsection
