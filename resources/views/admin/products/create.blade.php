@extends('layouts.admin')

@section('content')
    <div class="content__header">
        <h1 class="header__title">What are you creating?</h1>
        <div class="header__actions">
            <a href="{{ route('admin.products.index') }}" class="actions__link actions__link--grey">Cancel</a>
            <button type="submit" form="save-product" class="actions__link">Save product</button>
        </div>
    </div>
    <div class="content__content">
        <form action="{{ route('admin.products.store') }}" method="post" class="form" id="save-product">
            <div class="form__group">
                <label for="name" class="form__label">Name</label>
                <input type="text" name="name" id="name" class="form__input" value="{{ old('name') }}" placeholder="Name of product">
                @error('name')
                    <div class="form__error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form__group">
                <label for="price" class="form__label">Price</label>
                <input type="text" name="price" id="price" class="form__input" value="{{ old('price') }}" placeholder="Price your product">
                @error('price')
                    <div class="form__error">{{ $message }}</div>
                @enderror
            </div>
            @csrf
        </form>
    </div>
@endsection