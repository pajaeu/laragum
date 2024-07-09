<?php

namespace App\Http\Controllers\Front;

use App\Cart\Facade\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Product\AddToCartRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{


    public function show(User $user, Product $product, string $slug): View
    {
        return view('front.products.show', [
            'product' => $product
        ]);
    }

    public function search(Request $request): View
    {
        $query = $request->get('q');

        return view('front.products.search', [
            'query' => $query,
        ]);
    }

    public function addToCart(AddToCartRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $product = Product::findOrFail($data['product_id']);
        $quantity = $data['quantity'];

        Cart::add($product, $quantity);

        return to_route('checkout');
    }
}
