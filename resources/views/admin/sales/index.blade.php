@extends('layouts.admin')

@section('content')
    <div class="content__header">
        <h1 class="header__title">Sales</h1>
    </div>
    <div class="content__content">
        <x-admin.table>
            <x-slot name="head">
                <x-admin.table.row>
                    <x-admin.table.column type="th">Product</x-admin.table.column>
                    <x-admin.table.column type="th">Customer</x-admin.table.column>
                    <x-admin.table.column type="th">Date created</x-admin.table.column>
                    <x-admin.table.column type="th" style="text-align: right">Total</x-admin.table.column>
                </x-admin.table.row>
            </x-slot>
            @if($sales->isEmpty())
                <x-admin.table.row>
                    <x-admin.table.column colspan="4">No sales yet</x-admin.table.column>
                </x-admin.table.row>
            @else
                @foreach($sales as $item)
                    <x-admin.table.row>
                        <x-admin.table.column>{{ $item->product_name }}</x-admin.table.column>
                        <x-admin.table.column>{{ $item->order->customer_email }}</x-admin.table.column>
                        <x-admin.table.column>{{ $item->order->created_at->format('d. m. Y H:i:s') }}</x-admin.table.column>
                        <x-admin.table.column style="text-align: right">{{ $item->quantity * $item->price }} €</x-admin.table.column>
                    </x-admin.table.row>
                @endforeach
            @endif
        </x-admin.table>
        {{ $sales->links('admin.pagination.default') }}
    </div>
@endsection