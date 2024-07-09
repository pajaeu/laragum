@extends('layouts.mail')

@section('content')
    <table style="border-collapse: separate; width: 100%;">
        <tr>
            <td>
                <table style="width: 100%">
                    <tr>
                        <td></td>
                        <td style="width: 600px; text-align: center;">
                            <table style="width: 100%; text-align: left; border: 1px solid #000000">
                                <tr>
                                    <td>
                                        <div style="padding: 40px;">
                                            <div style="margin-bottom: 40px; text-align: center">
                                                <h1 style="margin: 0 0 10px; font-size: 1.2rem; font-weight: 600">Thank you for your purchase</h1>
                                                <p style="font-size: 0.8rem;text-transform: uppercase">Order number #{{ $order->id }}</p>
                                            </div>
                                            <table style="width: 100%; font-size: 0.8rem; border-collapse: collapse">
                                                @foreach($order->items as $item)
                                                    <tr>
                                                        <td style="padding: 10px 0; border-bottom: 1px solid #525252;">
                                                            {{ $item->product_name }}
                                                            @if($item->product->link)
                                                                <br/>
                                                                <a href="{{ $item->product->link }}" style="color: #000000; font-size: 0.7rem; text-decoration: underline">Get product</a>
                                                            @endif
                                                        </td>
                                                        <td style="padding: 10px 0; border-bottom: 1px solid #525252;">{{ $item->quantity }}</td>
                                                        <td style="padding: 10px 0; border-bottom: 1px solid #525252; text-align: right">{{ $item->quantity * $item->price }} EUR</td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                            <table style="width: 100%; font-size: 1rem; border-collapse: collapse">
                                                <tr>
                                                    <td style="padding: 10px 0; border-bottom: 1px solid #525252">Total</td>
                                                    <td style="padding: 10px 0; border-bottom: 1px solid #525252; text-align: right">{{ $order->items->sum(function ($item) { return $item->price * $item->quantity; } ) }} EUR</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <table style="width: 100%">
                                <tr>
                                    <td style="padding: 20px; text-align: center">
                                        <a href="{{ config('app.url') }}" style="color: #000000; font-size: 1rem; line-height: 2rem; text-decoration: none;">
                                            Powered by
                                            <img src="{{ asset('logo.png') }}" alt="Laragum" height="30">
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
@endsection