@extends('layouts.admin')

@section('title', 'Order Details - Admin Panel')

@section('content')
<div class="p-8">
    <div class="mb-8">
        <a href="{{ route('admin.orders.index') }}" class="text-orange-600 hover:text-orange-800 font-bold">← Back to Orders</a>
    </div>

    <div class="bg-white p-8 rounded-lg shadow">
        <div class="flex justify-between items-start mb-8">
            <div>
                <h1 class="text-4xl font-bold mb-2">Order #{{ $order->id }}</h1>
                <p class="text-gray-600">{{ $order->created_at->format('F d, Y \a\t g:i A') }}</p>
            </div>
            
            <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="flex gap-2">
                @csrf
                @method('PUT')
                <select name="status" onchange="this.form.submit()" class="border rounded px-4 py-2">
                    <option value="pending" @selected($order->status === 'pending')>Pending</option>
                    <option value="processing" @selected($order->status === 'processing')>Processing</option>
                    <option value="completed" @selected($order->status === 'completed')>Completed</option>
                    <option value="cancelled" @selected($order->status === 'cancelled')>Cancelled</option>
                </select>
            </form>
        </div>

        <hr class="my-6">

        <!-- Customer Info -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4">Customer Information</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <p class="text-gray-600 mb-1">Name</p>
                    <p class="font-semibold">{{ $order->customer_name }}</p>
                </div>
                <div>
                    <p class="text-gray-600 mb-1">Email</p>
                    <p class="font-semibold">{{ $order->user->email }}</p>
                </div>
                <div>
                    <p class="text-gray-600 mb-1">Phone</p>
                    <p class="font-semibold">{{ $order->customer_phone }}</p>
                </div>
                <div>
                    <p class="text-gray-600 mb-1">Payment Method</p>
                    <p class="font-semibold">{{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</p>
                </div>
            </div>
        </div>

        <hr class="my-6">

        <!-- Delivery Address -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4">Delivery Address</h2>
            <p class="font-semibold">{{ $order->customer_address }}</p>
        </div>

        <hr class="my-6">

        <!-- Order Items -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4">Order Items</h2>
            <div class="space-y-4">
                @foreach($order->items as $item)
                    <div class="flex justify-between items-center p-4 bg-gray-50 rounded">
                        <div>
                            <p class="font-bold">{{ $item->product->name }}</p>
                            <p class="text-sm text-gray-600">{{ $item->product->category->name }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-600">Qty: {{ $item->quantity }}</p>
                            <p class="font-bold">${{ number_format($item->price * $item->quantity, 2) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <hr class="my-6">

        <!-- Order Summary -->
        <div class="bg-orange-50 p-6 rounded-lg">
            <div class="space-y-3">
                <div class="flex justify-between">
                    <span class="font-semibold">Subtotal:</span>
                    <span>${{ number_format($order->total_price, 2) }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-semibold">Tax (10%):</span>
                    <span>${{ number_format($order->total_price * 0.1, 2) }}</span>
                </div>
                <hr class="my-2">
                <div class="flex justify-between font-bold text-lg">
                    <span>Total:</span>
                    <span>${{ number_format($order->total_price * 1.1, 2) }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
