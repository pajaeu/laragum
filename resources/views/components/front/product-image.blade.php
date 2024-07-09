<div class="product-image">
    @if($product->$field)
        <img src="{{ asset('storage/' . $product->$field) }}" alt="{{ $product->$field }}" class="product-image__img">
    @else
        <div style="display: flex; align-items: center; justify-content: center; width: 100%; height: 100%; background-color: #FF90E8;">
            <img src="{{ asset('/storage/images/item.png') }}" alt="{{ $product->$field }}" class="product-image__img product-image__img--placeholder">
        </div>
    @endif
</div>