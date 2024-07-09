<?php

namespace App\Cart;

use App\Models\Product;
use Illuminate\Support\Collection;

class Cart
{

    private const SESSION_KEY = '_laragum_cart';

    private Collection $contents;

    public function __construct()
    {
        $this->contents = session(self::SESSION_KEY) ? session(self::SESSION_KEY) : collect();
    }

    public function add(Product $product, int $quantity = 1): void
    {
        $cartItem = CartItemFactory::createFromProduct($product, $quantity);

        $this->contents->put($cartItem->getId(), $cartItem);

        $this->updateSession();
    }

    public function remove(int $id): void
    {
        $this->contents->forget($id);

        $this->updateSession();
    }

    public function clear(): void
    {
        $this->contents = collect();

        $this->updateSession();
    }

    public function content(): Collection
    {
        return $this->contents;
    }

    public function total(): float
    {
        return $this->contents->sum(function (CartItem $item) {
            return $item->getTotal();
        });
    }

    public function count(): int
    {
        return $this->contents->sum(function (CartItem $item) {
            return $item->getQuantity();
        });
    }

    private function updateSession(): void
    {
        session()->put(self::SESSION_KEY, $this->contents);
    }
}