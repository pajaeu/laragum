<?php

namespace App\View\Components\Front;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductItem extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Product $product
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.front.product-item');
    }
}
