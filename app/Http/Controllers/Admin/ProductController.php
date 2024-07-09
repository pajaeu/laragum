<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreProductRequest;
use App\Http\Requests\Admin\Product\UpdateContentRequest;
use App\Http\Requests\Admin\Product\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $products = auth()->user()
            ->products()
            ->select('id', 'name', 'slug', 'price', 'user_id')
            ->with('user')
            ->orderByDesc('id')
            ->paginate(30);

        return view('admin.products.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['slug'] = Str::slug(Str::random(15));

        $product = auth()->user()
            ->products()
            ->with('user')
            ->create($data);

        return to_route('admin.products.edit', $product)
            ->with('success', 'Product created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        Gate::authorize('update-product', [$product]);

        return view('admin.products.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')
                ->store("products/{$product->id}", 'public');
        }

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')
                ->store("products/{$product->id}", 'public');
        }

        $product->update($data);

        return to_route('admin.products.edit', $product)
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        Gate::authorize('delete-product', [$product]);

        $product->delete();

        return back()
            ->with('success', 'Product deleted successfully');
    }

    public function editContent(Product $product): View
    {
        Gate::authorize('update-product', [$product]);

        return view('admin.products.edit-content', [
            'product' => $product
        ]);
    }

    public function updateContent(UpdateContentRequest $request, Product $product): RedirectResponse
    {
        $data = $request->validated();

        $product->update($data);

        return to_route('admin.products.edit-content', $product)
            ->with('success', 'Product content updated successfully');
    }
}
