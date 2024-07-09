<?php

namespace App\Services;

use App\Cart\CartItem;
use App\Cart\Facade\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class CheckoutService
{

    public function getCountries(): array
    {
        return config('countries.list');
    }

    public function process(array $data): Order
    {
        return DB::transaction(function () use ($data) {
            $items = Cart::content();

            if ($items->isEmpty()) {
                throw new \Exception('Cart is empty');
            }

            $key = md5(uniqid());

            $order = Order::create([
                'user_id' => auth()->id(),
                'customer_email' => $data['customer_email'] ?? '',
                'customer_country' => $data['customer_country'] ?? '',
                'key' => $key
            ]);

            /** @var CartItem $item */
            foreach ($items as $item) {
                $order->items()->create([
                    'product_id' => $item->getId(),
                    'user_id' => $item->getProduct()->user_id,
                    'product_name' => $item->getName(),
                    'quantity' => $item->getQuantity(),
                    'price' => $item->getPrice(),
                    'total' => $item->getTotal(),
                ]);
            }

            Cart::clear();

            session()->put('order_key', $key);

            return $order;
        });
    }
}