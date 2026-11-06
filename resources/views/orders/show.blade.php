@extends('layouts.app')

@section('title', 'Order #' . $order->id . ' - Brew Haven')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-12">
    <div class="mb-8">
        <a href="{{ route('orders.index') }}" class="text-orange-600 hover:text-orange-800 font-bold">← Back to Orders</a>
    </div>

    <div class="bg-white p-8 rounded-lg shadow mb-8">
        <div class="flex justify-between items-start mb-6">
            <div>
                <h1 class="text-4xl font-bold mb-2">Order #{{ $order->id }}</h1>
                <p class="text-gray-600">{{ $order->created_at->format('F d, Y \a\t g:i A') }}</p>
            </div>
            <span class="px-4 py-2 rounded-full text-sm font-bold
                @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                @elseif($order->status === 'completed') bg-green-100 text-green-800
                @else bg-red-100 text-red-800
                @endif
            ">
                {{ ucfirst($order->status) }}
            </span>
        </div>

        <hr class="my-6">

        <!-- Delivery Information -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4">Delivery Information</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <p class="text-gray-600 mb-1">Name</p>
                    <p class="font-semibold">{{ $order->customer_name }}</p>
                </div>
                <div>
                    <p class="text-gray-600 mb-1">Phone</p>
                    <p class="font-semibold">{{ $order->customer_phone }}</p>
                </div>
                <div class="md:col-span-2">
                    <p class="text-gray-600 mb-1">Address</p>
                    <p class="font-semibold">{{ $order->customer_address }}</p>
                </div>
                <div>
                    <p class="text-gray-600 mb-1">Payment Method</p>
                    <p class="font-semibold">{{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</p>
                </div>
            </div>
        </div>

        <hr class="my-6">

        <!-- Order Items -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4">Order Items</h2>
            <div class="space-y-4">
                @foreach($order->items as $item)
                    <div class="flex justify-between items-center p-4 bg-gray-50 rounded">
                        <div class="flex-1">
                            <p class="font-bold">{{ $item->product->name }}</p>
                            <p class="text-gray-600">{{ $item->product->category->name }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-600">Qty: {{ $item->quantity }}</p>
                            <p class="text-sm text-gray-600">${{ number_format($item->price, 2) }} each</p>
                            <p class="font-bold text-lg">${{ number_format($item->price * $item->quantity, 2) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <hr class="my-6">

        <!-- Order Summary -->
        <div class="bg-orange-50 p-6 rounded-lg mb-8">
            <div class="space-y-3">
                <div class="flex justify-between">
                    <span>Subtotal:</span>
                    <span class="font-semibold">${{ number_format($order->total_price, 2) }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Shipping:</span>
                    <span class="font-semibold">Free</span>
                </div>
                <div class="flex justify-between">
                    <span>Tax (10%):</span>
                    <span class="font-semibold">${{ number_format($order->total_price * 0.1, 2) }}</span>
                </div>
                <hr>
                <div class="flex justify-between text-lg font-bold">
                    <span>Total:</span>
                    <span>${{ number_format($order->total_price * 1.1, 2) }}</span>
                </div>
            </div>
        </div>

        @if($order->notes)
            <div class="mb-8">
                <h3 class="font-bold mb-2">Special Notes</h3>
                <p class="text-gray-700">{{ $order->notes }}</p>
            </div>
        @endif

        <div class="flex gap-4">
            <a href="{{ route('orders.index') }}" class="btn-outline py-3">← Back to Orders</a>
            @if($order->status === 'completed')
                <span class="flex items-center text-green-600 font-bold">
                    ✓ Order Delivered on {{ $order->completed_at->format('F d, Y') }}
                </span>
            @endif
        </div>
    </div>
</div>
@endsection
