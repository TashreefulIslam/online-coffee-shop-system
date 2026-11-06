@extends('layouts.app')

@section('title', 'Wishlist - Brew Haven')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-12">
    <h1 class="text-4xl font-bold mb-8">My Wishlist ❤️</h1>

    @if($wishlists->count() > 0)
        <div class="grid md:grid-cols-4 gap-6">
            @foreach($wishlists as $wishlist)
                <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition">
                    @if($wishlist->product->image)
                        <img src="{{ asset('storage/' . $wishlist->product->image) }}" alt="{{ $wishlist->product->name }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-orange-200 flex items-center justify-center text-4xl">☕</div>
                    @endif
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-1">{{ $wishlist->product->name }}</h3>
                        <p class="text-sm text-orange-600 mb-2">{{ $wishlist->product->category->name }}</p>
                        <p class="text-2xl font-bold text-orange-600 mb-4">${{ number_format($wishlist->product->price, 2) }}</p>
                        <div class="flex gap-2">
                            <form action="{{ route('cart.add') }}" method="POST" class="flex-1">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $wishlist->product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="w-full btn-primary text-sm py-2">Add to Cart</button>
                            </form>
                            <form action="{{ route('wishlist.remove', $wishlist->id) }}" method="POST" class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full btn-outline text-sm py-2">Remove</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $wishlists->links() }}
        </div>
    @else
        <div class="text-center py-16">
            <p class="text-6xl mb-4">💔</p>
            <p class="text-2xl mb-4 font-semibold">Your wishlist is empty</p>
            <p class="text-gray-600 mb-8">Add coffee to your wishlist to save them for later</p>
            <a href="{{ route('menu') }}" class="btn-primary py-3">Browse Menu</a>
        </div>
    @endif
</div>
@endsection
