<?php

namespace App\Cart;

use App\Models\Product;

class CartItemFactory
{

    public static function createFromProduct(Product $product, int $quantity): CartItem
    {
        return (new CartItem())
            ->setId($product->id)
            ->setName($product->name)
            ->setPrice($product->price)
            ->setQuantity($quantity)
            ->setProduct($product);
    }
}