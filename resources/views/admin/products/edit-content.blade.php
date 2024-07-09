@extends('layouts.admin')

@section('content')
    <div class="content__header">
        <div class="header__title-with-links">
            <h1 class="header__title">{{ $product->name }}</h1>
            <div class="header__links">
                <a href="{{ route('admin.products.edit', ['product' => $product]) }}" class="links__link">Product</a>
                <a href="{{ route('admin.products.edit-content', ['product' => $product]) }}" class="links__link links__link--active">Content</a>
            </div>
        </div>
        <div class="header__actions">
            <button type="submit" form="save-product" class="actions__link">Save product</button>
        </div>
    </div>
    <div class="content__content">
        <form action="{{ route('admin.products.update-content', ['product' => $product]) }}" method="post" class="form" id="save-product" enctype="multipart/form-data">
            <div class="form__group">
                <label for="link" class="form__label">
                    Link to the product<br/>
                    <small>Link to the product, that user will get after purchase</small>
                </label>
                <input type="text" name="link" id="link" class="form__input" value="{{ old('link', $product->link) }}">
                @error('link')
                    <div class="form__error">{{ $message }}</div>
                @enderror
            </div>
            @method('PUT')
            @csrf
        </form>
    </div>
@endsection