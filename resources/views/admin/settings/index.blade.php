@extends('layouts.admin')

@section('content')
    <div class="content__header">
        <div class="header__title-with-links">
            <h1 class="header__title">Settings</h1>
            <div class="header__links">
                <a href="{{ route('admin.settings.index') }}" class="links__link links__link--active">Profile</a>
                <a href="{{ route('admin.settings.password') }}" class="links__link">Password</a>
            </div>
        </div>
        <div class="header__actions">
            <button type="submit" form="save-settings" class="actions__link">Update settings</button>
        </div>
    </div>
    <div class="content__content">
        <form action="{{ route('admin.settings.update') }}" method="post" class="form" id="save-settings" enctype="multipart/form-data">
            <div class="form__group">
                <label for="username" class="form__label">Username</label>
                <input type="text" name="username" id="username" class="form__input" value="{{ old('username', $user->username) }}">
                @error('username')
                    <div class="form__error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form__group">
                <label for="name" class="form__label">Your name</label>
                <input type="text" name="name" id="name" class="form__input" value="{{ old('name', $user->name) }}">
                @error('name')
                    <div class="form__error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form__group">
                <label for="bio" class="form__label">Bio</label>
                <textarea name="bio" id="bio" class="form__input" rows="5">{{ old('bio', $user->bio) }}</textarea>
                @error('bio')
                    <div class="form__error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form__group">
                <label for="avatar" class="form__label">Avatar</label>
                <x-admin.file-upload-button name="avatar" :image="$user->avatar" />
            </div>
            @method('PUT')
            @csrf
        </form>
    </div>
@endsection