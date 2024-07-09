<div>
    <div class="products">
        @if($products->isNotEmpty())
            <div class="products__grid">
                @foreach ($products as $product)
                    <x-front.product-item :product="$product" wire:key="{{ $product->id }}" />
                @endforeach
            </div>
            @if($products->hasPages())
                <div class="products__pagination">
                    <a class="pagination__load-more button" wire:click="loadMore">Load more</a>
                </div>
            @endif
        @else
            <div class="products__empty">
                <div class="icon">
                    <svg width="512px" height="512px" viewBox="0 0 16 16" fill="currentColor" x="0" y="0" role="img" style="display:inline-block;vertical-align:middle" xmlns="http://www.w3.org/2000/svg"><g fill="currentColor"><path fill="currentColor" d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3Zm1 3h12v5.5a2.5 2.5 0 0 1-2.5 2.5h-7A2.5 2.5 0 0 1 2 11.5V6Zm4.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3Z"></path></g></svg>
                </div>
                <span>No products found.</span>
            </div>
        @endif
    </div>
</div>