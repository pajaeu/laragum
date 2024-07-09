<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ProductGrid extends Component
{

    public ?int $userId = null;
    public int $perPage = 9;

    public ?string $search = null;
    public int $staticPerPage;

    public function mount(
        int $perPage = 9,
        ?int $userId = null,
        ?string $search = null
    ): void
    {
        $this->perPage = $perPage;
        $this->userId = $userId;
        $this->search = $search;
        $this->staticPerPage = $perPage;
    }

    public function loadMore(): void
    {
        $this->perPage += $this->staticPerPage;
    }

    public function render(): View
    {
        $products = Product::with('user')
            ->select('id', 'name', 'slug', 'price', 'thumbnail', 'user_id');

        if ($this->userId) {
            $products->where('user_id', $this->userId);
        }

        if (!$this->userId && $this->search) {
            $products->where('name', 'like', "%{$this->search}%");
        }

        $products = $products->paginate($this->perPage, page: 1);

        return view('livewire.product-grid', [
            'products' => $products
        ]);
    }
}
