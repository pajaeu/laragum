@extends('layouts.auth')

@section('header')
    <a href="{{ route('auth.signup') }}" class="auth__link">Sign up</a>
@endsection

@section('title', 'Login')

@section('content')
    <form action="{{ route('auth.authenticate') }}" method="post" class="form">
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
            <button type="submit" class="form__submit">Login</button>
        </div>
    </form>
@endsection
