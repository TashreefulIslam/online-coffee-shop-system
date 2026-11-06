@extends('layouts.admin')

@section('title', 'Products - Admin Panel')

@section('content')
<div class="p-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-bold">Products</h1>
        <a href="{{ route('admin.products.create') }}" class="bg-orange-600 text-white px-6 py-2 rounded hover:bg-orange-700">
            ➕ Add New Product
        </a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left px-6 py-4 font-bold">Product Name</th>
                    <th class="text-left px-6 py-4 font-bold">Category</th>
                    <th class="text-left px-6 py-4 font-bold">Price</th>
                    <th class="text-left px-6 py-4 font-bold">Stock</th>
                    <th class="text-left px-6 py-4 font-bold">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-bold">{{ $product->name }}</td>
                        <td class="px-6 py-4">{{ $product->category->name }}</td>
                        <td class="px-6 py-4">${{ number_format($product->price, 2) }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded @if($product->stock > 10) bg-green-100 text-green-800 @elseif($product->stock > 0) bg-yellow-100 text-yellow-800 @else bg-red-100 text-red-800 @endif">
                                {{ $product->stock }}
                            </span>
                        </td>
                        <td class="px-6 py-4 space-x-3">
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="text-blue-600 hover:text-blue-800 font-bold">
                                Edit
                            </a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-bold">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-8">
        {{ $products->links() }}
    </div>
</div>
@endsection
