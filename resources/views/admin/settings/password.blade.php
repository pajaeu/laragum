@extends('layouts.admin')

@section('content')
    <div class="content__header">
        <div class="header__title-with-links">
            <h1 class="header__title">Settings</h1>
            <div class="header__links">
                <a href="{{ route('admin.settings.index') }}" class="links__link">Profile</a>
                <a href="{{ route('admin.settings.password') }}" class="links__link links__link--active">Password</a>
            </div>
        </div>
    </div>
    <div class="content__content">
        <form action="{{ route('admin.settings.update-password') }}" method="post" class="form" id="save-settings">
            <div class="form__group">
                <label for="password" class="form__label">Password</label>
                <input type="password" name="password" id="password" class="form__input">
                @error('password')
                    <div class="form__error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form__group">
                <label for="password_confirmation" class="form__label">Confirm password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form__input">
                @error('password_confirmation')
                    <div class="form__error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form__group">
                @method('PUT')
                @csrf
                <button type="submit" form="save-settings" class="form__submit form__submit--inline form__submit--password">Change password</button>
            </div>
        </form>
    </div>
@endsection