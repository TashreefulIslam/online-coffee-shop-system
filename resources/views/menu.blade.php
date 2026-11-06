@extends('layouts.app')

@section('title', 'Menu - Brew Haven')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="mb-8">
        <h1 class="text-4xl font-bold mb-2">Our Menu</h1>
        <p class="text-gray-600">Browse our selection of premium coffee and snacks</p>
    </div>

    <div class="grid md:grid-cols-4 gap-8">
        <!-- Sidebar Filters -->
        <div class="md:col-span-1">
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="font-bold text-lg mb-4">Categories</h3>
                <form method="GET" action="{{ route('menu') }}" class="space-y-2">
                    <label class="flex items-center">
                        <input type="checkbox" name="categories[]" value="" class="mr-2" onchange="this.form.submit()">
                        <span>All Categories</span>
                    </label>
                    @foreach($categories as $category)
                        <label class="flex items-center">
                            <input type="checkbox" name="categories[]" value="{{ $category->id }}" class="mr-2" onchange="this.form.submit()">
                            <span>{{ $category->name }}</span>
                        </label>
                    @endforeach
                </form>

                <hr class="my-6">

                <h3 class="font-bold text-lg mb-4">Search</h3>
                <form method="GET" action="{{ route('menu') }}" class="space-y-4">
                    <input type="text" name="search" placeholder="Search coffee..." class="w-full border rounded px-3 py-2">
                    <button type="submit" class="btn-primary w-full">Search</button>
                </form>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="md:col-span-3">
            <div class="grid md:grid-cols-3 gap-6">
                @forelse($products as $product)
                    <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-orange-200 flex items-center justify-center text-4xl">☕</div>
                        @endif
                        <div class="p-4">
                            <h3 class="font-bold text-lg mb-1">{{ $product->name }}</h3>
                            <p class="text-sm text-orange-600 mb-2">{{ $product->category->name }}</p>
                            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($product->description, 60) }}</p>
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-2xl font-bold text-orange-600">${{ number_format($product->price, 2) }}</span>
                                <span class="text-sm bg-orange-100 text-orange-800 px-2 py-1 rounded">Stock: {{ $product->stock }}</span>
                            </div>
                            <a href="{{ route('product-details', $product->id) }}" class="block w-full text-center btn-primary">View Details</a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12">
                        <p class="text-gray-600 text-lg">No products found. Please try another search.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
