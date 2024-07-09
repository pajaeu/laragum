@extends('layouts.front')

@section('content')
    <div class="wrap">
        <div class="product-detail">
            <div class="product-detail__top">
                <x-front.product-image :product="$product" field="cover" />
            </div>
            <div class="product-detail__bottom">
                <div class="bottom__left">
                    <h3 class="product-detail__name">{{ $product->name }}</h3>
                    <div class="product-detail__meta">
                        <div class="meta__price">
                            <x-front.price-with-currency :price="$product->price" />
                        </div>
                        <div class="meta__profile">
                            <a href="{{ route('profile', ['user' => $product->user]) }}"
                               class="profile__link">{{ $product->user->name }}</a>
                        </div>
                    </div>
                    <div class="product-detail__description">{{ $product->description }}</div>
                </div>
                <div class="bottom__right">
                    @if ($product->user->id === auth()->id())
                        <p>You can't buy your own product.</p>
                        <a href="{{ route('admin.products.edit', ['product' => $product]) }}" class="button">Edit product</a>
                    @else
                        <x-front.add-to-cart :product="$product"/>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection