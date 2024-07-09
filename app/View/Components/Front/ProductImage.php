<?php

namespace App\View\Components\Front;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductImage extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Product $product,
        public string $field = 'image'
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.front.product-image');
    }
}
