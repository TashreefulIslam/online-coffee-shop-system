@extends('layouts.app')

@section('title', 'Checkout - Brew Haven')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-12">
    <h1 class="text-4xl font-bold mb-8">Checkout</h1>

    <div class="grid md:grid-cols-3 gap-8">
        <!-- Checkout Form -->
        <div class="md:col-span-2">
            <div class="bg-white p-8 rounded-lg shadow">
                <form action="{{ route('checkout.place') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="border-b pb-6">
                        <h2 class="text-2xl font-bold mb-4">Delivery Information</h2>
                        
                        <div class="mb-4">
                            <label class="block font-semibold mb-2">Full Name *</label>
                            <input type="text" name="customer_name" value="{{ $user->name }}" required class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                        </div>

                        <div class="mb-4">
                            <label class="block font-semibold mb-2">Phone Number *</label>
                            <input type="tel" name="customer_phone" value="{{ $user->phone ?? '' }}" required class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                        </div>

                        <div>
                            <label class="block font-semibold mb-2">Delivery Address *</label>
                            <textarea name="customer_address" required rows="3" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">{{ $user->address ?? '' }}</textarea>
                        </div>
                    </div>

                    <div class="border-b pb-6">
                        <h2 class="text-2xl font-bold mb-4">Payment Method</h2>
                        <div class="space-y-3">
                            <label class="flex items-center p-4 border rounded border-orange-500 cursor-pointer">
                                <input type="radio" name="payment_method" value="cash_on_delivery" checked class="mr-3" required>
                                <div>
                                    <span class="font-bold">Cash on Delivery</span>
                                    <p class="text-gray-600 text-sm">Pay when your order arrives</p>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block font-semibold mb-2">Special Notes (Optional)</label>
                        <textarea name="notes" rows="3" placeholder="Any special requests or notes for your order..." class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500"></textarea>
                    </div>

                    <div class="flex gap-4">
                        <a href="{{ route('cart.index') }}" class="btn-outline py-3 px-6">← Back to Cart</a>
                        <button type="submit" class="btn-primary py-3 px-6 flex-1">Place Order →</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="md:col-span-1">
            <div class="bg-orange-50 p-6 rounded-lg sticky top-20">
                <h3 class="font-bold text-lg mb-6">Order Summary</h3>
                <div class="space-y-3 mb-6">
                    @foreach($items as $item)
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <p class="font-semibold">{{ $item->product->name }}</p>
                                <p class="text-sm text-gray-600">Qty: {{ $item->quantity }}</p>
                            </div>
                            <span class="font-bold">${{ number_format($item->product->price * $item->quantity, 2) }}</span>
                        </div>
                    @endforeach
                </div>
                <hr class="my-4">
                <div class="space-y-2 mb-6">
                    <div class="flex justify-between">
                        <span>Subtotal:</span>
                        <span>${{ number_format($total, 2) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Shipping:</span>
                        <span>Free</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Tax (10%):</span>
                        <span>${{ number_format($total * 0.1, 2) }}</span>
                    </div>
                    <hr>
                    <div class="flex justify-between font-bold text-lg">
                        <span>Total:</span>
                        <span>${{ number_format($total * 1.1, 2) }}</span>
                    </div>
                </div>
                <p class="text-sm text-gray-600 text-center">
                    Free shipping on all orders!
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
