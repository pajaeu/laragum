<article class="product">
    <a href="{{ route('products.show', ['user' => $product->user, 'product' => $product, 'slug' => $product->slug]) }}" class="product__link">
        <div class="product__top">
            <x-front.product-image :product="$product" field="thumbnail" />
        </div>
        <div class="product__bottom">
            <h3 class="product__name">{{ $product->name }}</h3>
            @if (!request()->routeIs('profile'))
                <div class="product__profile">
                    <a href="{{ route('profile', ['user' => $product->user]) }}" class="profile__link">{{ $product->user->name }}</a>
                </div>
            @endif
            <div class="product__price">
                <x-front.price-with-currency :price="$product->price" />
            </div>
        </div>
    </a>
</article>