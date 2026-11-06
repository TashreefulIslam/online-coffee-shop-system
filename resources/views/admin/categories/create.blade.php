@extends('layouts.admin')

@section('title', 'Create Category - Admin Panel')

@section('content')
<div class="p-8">
    <h1 class="text-4xl font-bold mb-8">Create New Category</h1>

    <div class="max-w-2xl bg-white p-8 rounded-lg shadow">
        <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block font-semibold mb-2">Category Name *</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-semibold mb-2">Description</label>
                <textarea name="description" rows="4" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-orange-600 text-white px-6 py-2 rounded hover:bg-orange-700">
                    Create Category
                </button>
                <a href="{{ route('admin.categories.index') }}" class="border border-gray-300 px-6 py-2 rounded hover:bg-gray-100">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
