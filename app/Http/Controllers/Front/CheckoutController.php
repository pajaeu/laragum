<?php

namespace App\Http\Controllers\Front;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class CheckoutController
{


    public function index(): View
    {
        return view('front.checkout');
    }

    public function success(Order $order): View|RedirectResponse
    {
        if (auth()->check() && $order->user_id !== auth()->id()) {
            return to_route('home');
        }

        if (!auth()->check() && session('order_key') !== $order->key) {
            return to_route('home');
        }

        return view('front.checkout.success');
    }
}