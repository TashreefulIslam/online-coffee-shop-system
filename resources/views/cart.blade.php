@extends('layouts.app')

@section('title', 'Shopping Cart - Brew Haven')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-12">
    <h1 class="text-4xl font-bold mb-8">Shopping Cart 🛒</h1>

    @if(count($items) > 0)
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Cart Items -->
            <div class="md:col-span-2">
                <div class="bg-white rounded-lg shadow">
                    @foreach($items as $item)
                        <div class="border-b p-6 flex gap-4 items-center justify-between">
                            <div class="flex gap-4 flex-1">
                                @if($item->product->image)
                                    <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="w-24 h-24 object-cover rounded">
                                @else
                                    <div class="w-24 h-24 bg-orange-200 flex items-center justify-center rounded text-2xl">☕</div>
                                @endif
                                <div class="flex-1">
                                    <h3 class="font-bold text-lg">{{ $item->product->name }}</h3>
                                    <p class="text-gray-600">{{ $item->product->category->name }}</p>
                                    <p class="text-orange-600 font-bold mt-2">${{ number_format($item->product->price, 2) }}</p>
                                </div>
                            </div>

                            <div class="flex gap-4 items-center">
                                <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center border rounded">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="w-12 text-center border-0 focus:ring-0" onchange="this.form.submit()">
                                </form>

                                <p class="font-bold text-lg w-24 text-right">
                                    ${{ number_format($item->product->price * $item->quantity, 2) }}
                                </p>

                                <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 font-bold">✕</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6">
                    <form action="{{ route('cart.clear') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">Clear Cart</button>
                    </form>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="md:col-span-1">
                <div class="bg-orange-50 p-6 rounded-lg">
                    <h3 class="font-bold text-lg mb-6">Order Summary</h3>
                    <div class="space-y-4 mb-6">
                        <div class="flex justify-between">
                            <span>Subtotal:</span>
                            <span>${{ number_format($total, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Shipping:</span>
                            <span>Free</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Tax:</span>
                            <span>${{ number_format($total * 0.1, 2) }}</span>
                        </div>
                        <hr>
                        <div class="flex justify-between font-bold text-lg">
                            <span>Total:</span>
                            <span>${{ number_format($total * 1.1, 2) }}</span>
                        </div>
                    </div>
                    <a href="{{ route('checkout.show') }}" class="block w-full text-center btn-primary py-3">
                        Proceed to Checkout
                    </a>
                    <a href="{{ route('menu') }}" class="block w-full text-center btn-outline mt-3 py-3">
                        Continue Shopping
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-16">
            <p class="text-6xl mb-4">🛒</p>
            <p class="text-2xl mb-4 font-semibold">Your cart is empty</p>
            <p class="text-gray-600 mb-8">Start shopping to add items to your cart</p>
            <a href="{{ route('menu') }}" class="btn-primary py-3">Start Shopping</a>
        </div>
    @endif
</div>
@endsection
