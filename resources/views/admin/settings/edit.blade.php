@extends('layouts.admin')

@section('title', 'Settings - Admin Panel')

@section('content')
<div class="p-8">
    <h1 class="text-4xl font-bold mb-8">Website Settings</h1>

    <div class="max-w-3xl bg-white p-8 rounded-lg shadow">
        <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <h3 class="text-2xl font-bold mb-4">Shop Information</h3>

            <div>
                <label class="block font-semibold mb-2">Shop Name *</label>
                <input type="text" name="shop_name" value="{{ old('shop_name', $settings['shop_name']) }}" required class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block font-semibold mb-2">Email *</label>
                    <input type="email" name="shop_email" value="{{ old('shop_email', $settings['shop_email']) }}" required class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>

                <div>
                    <label class="block font-semibold mb-2">Phone *</label>
                    <input type="tel" name="shop_phone" value="{{ old('shop_phone', $settings['shop_phone']) }}" required class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
            </div>

            <div>
                <label class="block font-semibold mb-2">Address *</label>
                <textarea name="shop_address" rows="3" required class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">{{ old('shop_address', $settings['shop_address']) }}</textarea>
            </div>

            <div>
                <label class="block font-semibold mb-2">About Us</label>
                <textarea name="about_us" rows="4" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">{{ old('about_us', $settings['about_us']) }}</textarea>
            </div>

            <hr class="my-6">

            <h3 class="text-2xl font-bold mb-4">Social Media Links</h3>

            <div>
                <label class="block font-semibold mb-2">Facebook URL</label>
                <input type="url" name="facebook" value="{{ old('facebook', $settings['facebook']) }}" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
            </div>

            <div>
                <label class="block font-semibold mb-2">Twitter URL</label>
                <input type="url" name="twitter" value="{{ old('twitter', $settings['twitter']) }}" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
            </div>

            <div>
                <label class="block font-semibold mb-2">Instagram URL</label>
                <input type="url" name="instagram" value="{{ old('instagram', $settings['instagram']) }}" class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
            </div>

            <div class="flex gap-4 pt-4">
                <button type="submit" class="bg-orange-600 text-white px-6 py-2 rounded hover:bg-orange-700">
                    Save Settings
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
