@extends('layouts.admin')

@section('content')
    <div class="content__header">
        <div class="header__title-with-links">
            <h1 class="header__title">{{ $product->name }}</h1>
            <div class="header__links">
                <a href="{{ route('admin.products.edit', ['product' => $product]) }}" class="links__link links__link--active">Product</a>
                <a href="{{ route('admin.products.edit-content', ['product' => $product]) }}" class="links__link">Content</a>
            </div>
        </div>
        <div class="header__actions">
            <button type="submit" form="save-product" class="actions__link">Save product</button>
        </div>
    </div>
    <div class="content__content">
        <form action="{{ route('admin.products.update', ['product' => $product]) }}" method="post" class="form" id="save-product" enctype="multipart/form-data">
            <div class="form__group">
                <label for="name" class="form__label">Name</label>
                <input type="text" name="name" id="name" class="form__input" value="{{ old('name', $product->name) }}">
                @error('name')
                    <div class="form__error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form__group">
                <label for="description" class="form__label">Description</label>
                <textarea name="description" id="description" class="form__input" rows="8">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <div class="form__error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form__group">
                <label for="slug" class="form__label">URL</label>
                <div class="form__fake-input">
                    <span>{{ config('app.url') }}/{{ auth()->user()->username }}/{{ $product->id }}/</span>
                    <input type="text" name="slug" id="slug" class="form__input" value="{{ old('slug', $product->slug) }}">
                </div>
                @error('slug')
                    <div class="form__error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form__group">
                <label for="price" class="form__label">Price</label>
                <input type="text" name="price" id="price" class="form__input" value="{{ old('price', $product->price) }}">
                @error('price')
                    <div class="form__error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form__group">
                <label for="cover" class="form__label">Cover</label>
                <div class="file-uploader-cover-wrap">
                    <x-admin.file-upload-button class="file" id="cover" name="cover" :image="$product->cover" label="Upload Cover Image" />
                </div>
            </div>
            <div class="form__group">
                <label for="thumbnail" class="form__label">Thumbnail</label>
                <x-admin.file-upload-button id="thumbnail" name="thumbnail" :image="$product->thumbnail" />
            </div>
            @method('PUT')
            @csrf
        </form>
    </div>
@endsection
