@extends('layouts.auth')

@section('header')
    <a href="{{ route('auth.login') }}" class="auth__link">Login</a>
@endsection

@section('title', 'Join creators on Laragum selling digital products and memberships.')

@section('content')
    <form action="{{ route('auth.register') }}" method="post" class="form">
        <div class="form__group">
            <label for="username" class="form__label">Username</label>
            <input type="text" class="form__input" name="username" id="username" value="{{ old('username') }}">
            @error('username')
                <div class="form__error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form__group">
            <label for="email" class="form__label">E-mail address</label>
            <input type="text" class="form__input" name="email" id="email" value="{{ old('email') }}">
            @error('email')
                <div class="form__error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form__group">
            <label for="password" class="form__label">Password</label>
            <input type="password" class="form__input" name="password" id="password">
            @error('password')
                <div class="form__error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form__group">
            @csrf
            <button type="submit" class="form__submit">Create account</button>
        </div>
    </form>
@endsection
