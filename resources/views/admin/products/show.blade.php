@extends('layouts.admin')

@section('title', 'Product Details - Admin Panel')

@section('content')
<div class="p-8">
    <div class="mb-8">
        <a href="{{ route('admin.products.index') }}" class="text-orange-600 hover:text-orange-800 font-bold">← Back to Products</a>
    </div>

    <div class="bg-white p-8 rounded-lg shadow grid md:grid-cols-2 gap-8">
        <div>
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full rounded-lg object-cover">
            @else
                <div class="w-full h-80 bg-orange-200 rounded-lg flex items-center justify-center text-6xl">☕</div>
            @endif
        </div>

        <div>
            <div class="flex justify-between items-start mb-6">
                <div>
                    <p class="text-orange-600 font-semibold mb-1">{{ $product->category->name }}</p>
                    <h1 class="text-4xl font-bold mb-2">{{ $product->name }}</h1>
                    <p class="text-3xl font-bold text-orange-600">${{ number_format($product->price, 2) }}</p>
                </div>
                <a href="{{ route('admin.products.edit', $product->id) }}" class="bg-orange-600 text-white px-6 py-2 rounded hover:bg-orange-700">
                    Edit Product
                </a>
            </div>

            <div class="mb-6">
                <h2 class="text-2xl font-bold mb-3">Description</h2>
                <p class="text-gray-700 leading-relaxed">{{ $product->description ?: 'No description available.' }}</p>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gray-50 p-4 rounded">
                    <p class="text-sm text-gray-600">Stock</p>
                    <p class="text-xl font-bold">{{ $product->stock }}</p>
                </div>
                <div class="bg-gray-50 p-4 rounded">
                    <p class="text-sm text-gray-600">Rating</p>
                    <p class="text-xl font-bold">{{ $product->rating }}</p>
                </div>
                <div class="bg-gray-50 p-4 rounded">
                    <p class="text-sm text-gray-600">Sales Count</p>
                    <p class="text-xl font-bold">{{ $product->sales_count }}</p>
                </div>
                <div class="bg-gray-50 p-4 rounded">
                    <p class="text-sm text-gray-600">Category</p>
                    <p class="text-xl font-bold">{{ $product->category->name }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
