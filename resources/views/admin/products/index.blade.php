@extends('layouts.admin')

@section('content')
    <div class="content__header">
        <h1 class="header__title">Products</h1>
        <div class="header__actions">
            <a href="{{ route('admin.products.create') }}" class="actions__link">New product</a>
        </div>
    </div>
    <div class="content__content">
        <x-admin.table>
            <x-slot name="head">
                <x-admin.table.row>
                    <x-admin.table.column type="th">Name</x-admin.table.column>
                    <x-admin.table.column type="th" style="text-align: right">Price</x-admin.table.column>
                    <x-admin.table.column type="th" style="text-align: right"></x-admin.table.column>
                </x-admin.table.row>
            </x-slot>
            @if($products->isEmpty())
                <x-admin.table.row>
                    <x-admin.table.column colspan="3">No products found</x-admin.table.column>
                </x-admin.table.row>
            @else
                @foreach($products as $product)
                    <x-admin.table.row>
                        <x-admin.table.column>
                            <a href="{{ route('admin.products.edit', ['product' => $product]) }}" class="table__link">{{ $product->name }}</a>
                            <small>
                                <a href="{{ route('products.show', ['user' => $product->user, 'product' => $product, 'slug' => $product->slug]) }}" class="table__link"><span>{{ config('app.url') }}/{{ $product->user->username }}/{{ $product->id }}/</span>{{ $product->slug }}</a>
                            </small>
                        </x-admin.table.column>
                        <x-admin.table.column style="text-align: right">{{ $product->price }} €</x-admin.table.column>
                        <x-admin.table.column style="text-align: right">
                            <div class="table__actions">
                                <a href="{{ route('admin.products.edit', ['product' => $product]) }}" class="actions__link">
                                    <svg width="512" height="512" viewBox="0 0 512 512" style="color:currentColor" xmlns="http://www.w3.org/2000/svg" class="h-full w-full"><rect width="512" height="512" x="0" y="0" rx="30" fill="transparent" stroke="transparent" stroke-width="0" stroke-opacity="100%" paint-order="stroke"></rect><svg width="512px" height="512px" viewBox="0 0 1024 1024" fill="currentColor" x="0" y="0" role="img" style="display:inline-block;vertical-align:middle" xmlns="http://www.w3.org/2000/svg"><g fill="currentColor"><path fill="currentColor" d="M880 836H144c-17.7 0-32 14.3-32 32v36c0 4.4 3.6 8 8 8h784c4.4 0 8-3.6 8-8v-36c0-17.7-14.3-32-32-32zm-622.3-84c2 0 4-.2 6-.5L431.9 722c2-.4 3.9-1.3 5.3-2.8l423.9-423.9a9.96 9.96 0 0 0 0-14.1L694.9 114.9c-1.9-1.9-4.4-2.9-7.1-2.9s-5.2 1-7.1 2.9L256.8 538.8c-1.5 1.5-2.4 3.3-2.8 5.3l-29.5 168.2a33.5 33.5 0 0 0 9.4 29.8c6.6 6.4 14.9 9.9 23.8 9.9z"/></g></svg></svg>
                                </a>
                                <form action="{{ route('admin.products.destroy', ['product' => $product]) }}" method="post">
                                    <button type="submit" class="actions__link actions__link--delete">
                                        <svg width="512" height="512" viewBox="0 0 512 512" style="color:currentColor" xmlns="http://www.w3.org/2000/svg" class="h-full w-full"><rect width="512" height="512" x="0" y="0" rx="30" fill="transparent" stroke="transparent" stroke-width="0" stroke-opacity="100%" paint-order="stroke"></rect><svg width="512px" height="512px" viewBox="0 0 1024 1024" fill="currentColor" x="0" y="0" role="img" style="display:inline-block;vertical-align:middle" xmlns="http://www.w3.org/2000/svg"><g fill="currentColor"><path fill="currentColor" d="M864 256H736v-80c0-35.3-28.7-64-64-64H352c-35.3 0-64 28.7-64 64v80H160c-17.7 0-32 14.3-32 32v32c0 4.4 3.6 8 8 8h60.4l24.7 523c1.6 34.1 29.8 61 63.9 61h454c34.2 0 62.3-26.8 63.9-61l24.7-523H888c4.4 0 8-3.6 8-8v-32c0-17.7-14.3-32-32-32zm-200 0H360v-72h304v72z"/></g></svg></svg>
                                    </button>
                                    @method('DELETE')
                                    @csrf
                                </form>
                            </div>
                        </x-admin.table.column>
                    </x-admin.table.row>
                @endforeach
            @endif
        </x-admin.table>
        {{ $products->links('admin.pagination.default') }}
    </div>
@endsection