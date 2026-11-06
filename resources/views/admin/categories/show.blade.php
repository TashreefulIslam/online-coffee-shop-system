@extends('layouts.admin')

@section('title', 'Category Details - Admin Panel')

@section('content')
<div class="p-8">
    <div class="mb-8">
        <a href="{{ route('admin.categories.index') }}" class="text-orange-600 hover:text-orange-800 font-bold">← Back to Categories</a>
    </div>

    <div class="bg-white p-8 rounded-lg shadow">
        <div class="flex justify-between items-start mb-6">
            <div>
                <h1 class="text-4xl font-bold mb-2">{{ $category->name }}</h1>
                <p class="text-gray-600">{{ $category->products->count() }} product(s) in this category</p>
            </div>
            <a href="{{ route('admin.categories.edit', $category->id) }}" class="bg-orange-600 text-white px-6 py-2 rounded hover:bg-orange-700">
                Edit Category
            </a>
        </div>

        <div class="mb-8">
            <h2 class="text-2xl font-bold mb-3">Description</h2>
            <p class="text-gray-700 leading-relaxed">{{ $category->description ?: 'No description available.' }}</p>
        </div>

        <hr class="my-6">

        <h2 class="text-2xl font-bold mb-4">Products in this Category</h2>

        @if($category->products->count() > 0)
            <div class="grid md:grid-cols-2 gap-4">
                @foreach($category->products as $product)
                    <div class="border rounded-lg p-4 flex justify-between items-center">
                        <div>
                            <p class="font-bold">{{ $product->name }}</p>
                            <p class="text-sm text-gray-600">${{ number_format($product->price, 2) }}</p>
                        </div>
                        <a href="{{ route('admin.products.show', $product->id) }}" class="text-orange-600 hover:text-orange-800 font-bold">View</a>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600">No products are assigned to this category yet.</p>
        @endif
    </div>
</div>
@endsection
