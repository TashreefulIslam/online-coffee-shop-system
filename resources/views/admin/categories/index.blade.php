@extends('layouts.admin')

@section('title', 'Categories - Admin Panel')

@section('content')
<div class="p-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-bold">Categories</h1>
        <a href="{{ route('admin.categories.create') }}" class="bg-orange-600 text-white px-6 py-2 rounded hover:bg-orange-700">
            ➕ Add New Category
        </a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left px-6 py-4 font-bold">Category Name</th>
                    <th class="text-left px-6 py-4 font-bold">Products</th>
                    <th class="text-left px-6 py-4 font-bold">Description</th>
                    <th class="text-left px-6 py-4 font-bold">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-bold">{{ $category->name }}</td>
                        <td class="px-6 py-4">{{ $category->products_count }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ Str::limit($category->description, 50) }}</td>
                        <td class="px-6 py-4 space-x-3">
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="text-blue-600 hover:text-blue-800 font-bold">
                                Edit
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?')">
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
        {{ $categories->links() }}
    </div>
</div>
@endsection
