@extends('layouts.app')

@section('title', $product->name . ' - Brew Haven')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-12">
    <div class="grid md:grid-cols-2 gap-12">
        <!-- Product Image -->
        <div>
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full rounded-lg shadow-lg">
            @else
                <div class="w-full h-96 bg-orange-200 rounded-lg flex items-center justify-center text-6xl">☕</div>
            @endif
        </div>

        <!-- Product Details -->
        <div>
            <div class="mb-6">
                <span class="text-orange-600 font-semibold text-lg">{{ $product->category->name }}</span>
                <h1 class="text-4xl font-bold mb-2">{{ $product->name }}</h1>
                <div class="flex items-center gap-4">
                    <span class="text-3xl font-bold text-orange-600">${{ number_format($product->price, 2) }}</span>
                    <span class="text-yellow-400 text-lg">⭐ {{ $product->rating }} (120 reviews)</span>
                </div>
            </div>

            <div class="mb-6">
                <h3 class="font-bold text-lg mb-2">Description</h3>
                <p class="text-gray-700 leading-relaxed">{{ $product->description }}</p>
            </div>

            <div class="mb-6">
                <p class="text-lg mb-4">
                    <span class="font-bold">Stock:</span>
                    @if($product->stock > 0)
                        <span class="text-green-600">{{ $product->stock }} Available</span>
                    @else
                        <span class="text-red-600">Out of Stock</span>
                    @endif
                </p>
            </div>

            @auth
                <form action="{{ route('cart.add') }}" method="POST" class="mb-6">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="flex gap-4 mb-4">
                        <div class="flex items-center border rounded">
                            <button type="button" class="px-4 py-2 text-xl" onclick="decrementQuantity()">-</button>
                            <input type="number" id="quantity" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="w-12 text-center border-0 focus:ring-0">
                            <button type="button" class="px-4 py-2 text-xl" onclick="incrementQuantity()">+</button>
                        </div>
                    </div>
                    <button type="submit" @disabled($product->stock == 0) class="w-full btn-primary py-3 text-lg mb-4" @if($product->stock == 0) disabled @endif>
                        🛒 Add to Cart
                    </button>
                </form>

                <form action="{{ route('wishlist.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full btn-outline py-3 text-lg">
                        ❤️ Add to Wishlist
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block w-full text-center btn-primary py-3 text-lg mb-4">
                    Login to Add to Cart
                </a>
            @endauth
        </div>
    </div>

    <!-- Related Products -->
    @if($relatedProducts->count() > 0)
        <div class="mt-16">
            <h2 class="text-3xl font-bold mb-8">Related Products</h2>
            <div class="grid md:grid-cols-4 gap-6">
                @foreach($relatedProducts as $related)
                    <div class="bg-white rounded-lg overflow-hidden shadow-lg">
                        @if($related->image)
                            <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->name }}" class="w-full h-40 object-cover">
                        @else
                            <div class="w-full h-40 bg-orange-200 flex items-center justify-center text-3xl">☕</div>
                        @endif
                        <div class="p-4">
                            <h3 class="font-bold mb-1">{{ $related->name }}</h3>
                            <p class="text-orange-600 text-lg font-bold mb-2">${{ number_format($related->price, 2) }}</p>
                            <a href="{{ route('product-details', $related->id) }}" class="block w-full text-center btn-primary text-sm py-2">
                                View
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>

<script>
    function incrementQuantity() {
        const input = document.getElementById('quantity');
        input.value = parseInt(input.value) + 1;
    }

    function decrementQuantity() {
        const input = document.getElementById('quantity');
        if (input.value > 1) {
            input.value = parseInt(input.value) - 1;
        }
    }
</script>
@endsection
