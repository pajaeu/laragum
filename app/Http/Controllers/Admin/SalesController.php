<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Contracts\View\View;

class SalesController extends Controller
{

    public function index(): View
    {
        $sales = OrderItem::select('id', 'order_id', 'product_name', 'quantity', 'price')
            ->where('user_id', auth()->id())
            ->with('order')
            ->orderByDesc('id')
            ->paginate(20);

        return view('admin.sales.index', [
            'sales' => $sales
        ]);
    }
}
