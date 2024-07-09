<form action="{{ route('products.add-to-cart') }}" method="post" class="add-to-cart">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <input type="hidden" name="quantity" value="1">
    <button type="submit" class="add-to-cart__button">Add to cart</button>
</form>