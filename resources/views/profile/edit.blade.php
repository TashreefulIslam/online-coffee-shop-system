@extends('layouts.app')

@section('title', 'Edit Profile - Brew Haven')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-12">
    <h1 class="text-4xl font-bold mb-8">Edit Profile</h1>

    <div class="bg-white p-8 rounded-lg shadow">
        <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-semibold mb-2">Full Name *</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-semibold mb-2">Email Address *</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-semibold mb-2">Phone Number</label>
                <input type="tel" name="phone" value="{{ old('phone', $user->phone) }}" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                @error('phone')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-semibold mb-2">Address</label>
                <textarea name="address" rows="4" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">{{ old('address', $user->address) }}</textarea>
                @error('address')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4">
                <button type="submit" class="btn-primary py-3 px-6">Save Changes</button>
                <a href="{{ route('orders.index') }}" class="btn-outline py-3 px-6">Cancel</a>
            </div>
        </form>

        <hr class="my-8">

        <div>
            <h3 class="text-xl font-bold mb-4">Change Password</h3>
            <p class="text-gray-600 mb-4">Use the link below to change your password:</p>
            <a href="{{ route('password.request') }}" class="text-orange-600 hover:text-orange-800 font-bold">Request Password Reset →</a>
        </div>
    </div>
</div>
@endsection
