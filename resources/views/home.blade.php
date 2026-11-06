@extends('layouts.app')

@section('title', 'Home - Brew Haven')

@section('content')
<!-- Hero Section -->
<div class="relative h-96 bg-gradient-to-r from-orange-900 to-orange-700 text-white overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-40"></div>
    <div class="absolute inset-0 flex items-center justify-center text-center">
        <div class="z-10">
            <h1 class="text-5xl font-bold mb-4">Fresh Coffee, Fresh Day ☕</h1>
            <p class="text-xl mb-8">Experience the finest specialty coffee from around the world</p>
            <div class="flex justify-center gap-4">
                <a href="{{ route('menu') }}" class="btn-secondary">Order Now</a>
                <a href="{{ route('menu') }}" class="btn-outline text-white border-white hover:bg-white hover:text-orange-900">Explore Menu</a>
            </div>
        </div>
    </div>
</div>

<!-- About Us -->
<section class="py-16 px-4 max-w-6xl mx-auto">
    <h2 class="text-4xl font-bold mb-8 text-center">About Us</h2>
    <div class="grid md:grid-cols-2 gap-8">
        <div>
            <h3 class="text-2xl font-bold mb-4">Our Story</h3>
            <p class="text-gray-700 leading-relaxed mb-4">
                {{ \App\Models\Setting::get('about_us', 'We serve freshly roasted coffee beans from around the world. Founded in 2023, Brew Haven has been committed to bringing the finest coffee experience to our community.') }}
            </p>
            <p class="text-gray-700 leading-relaxed">
                Every cup is carefully crafted by our expert baristas using premium beans sourced directly from sustainable farms.
            </p>
        </div>
        <div class="bg-orange-100 rounded-lg p-8 flex items-center justify-center">
            <div class="text-6xl">☕</div>
        </div>
    </div>
</section>

<!-- Featured Coffee -->
<section class="py-16 px-4 bg-orange-50">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-4xl font-bold mb-12 text-center">Featured Coffee ⭐</h2>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($featuredProducts as $product)
                <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-orange-200 flex items-center justify-center text-4xl">☕</div>
                    @endif
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-xl font-bold">{{ $product->name }}</h3>
                            <span class="bg-yellow-400 text-orange-900 px-2 py-1 rounded text-sm font-bold">⭐ {{ $product->rating }}</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-2">{{ $product->category->name }}</p>
                        <p class="text-gray-700 text-sm mb-4">{{ Str::limit($product->description, 50) }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-orange-600">${{ number_format($product->price, 2) }}</span>
                            @auth
                                <a href="{{ route('product-details', $product->id) }}" class="btn-primary text-sm">View</a>
                            @else
                                <a href="{{ route('login') }}" class="btn-primary text-sm">View</a>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-16 px-4 max-w-6xl mx-auto">
    <h2 class="text-4xl font-bold mb-12 text-center">Why Choose Us?</h2>
    <div class="grid md:grid-cols-4 gap-8">
        <div class="text-center p-6 bg-orange-50 rounded-lg hover:bg-orange-100 transition">
            <div class="text-4xl mb-4">🌿</div>
            <h3 class="font-bold mb-2">Premium Beans</h3>
            <p class="text-gray-700 text-sm">Sourced from the finest sustainable farms worldwide</p>
        </div>
        <div class="text-center p-6 bg-orange-50 rounded-lg hover:bg-orange-100 transition">
            <div class="text-4xl mb-4">🚚</div>
            <h3 class="font-bold mb-2">Fast Delivery</h3>
            <p class="text-gray-700 text-sm">Quick and reliable delivery to your doorstep</p>
        </div>
        <div class="text-center p-6 bg-orange-50 rounded-lg hover:bg-orange-100 transition">
            <div class="text-4xl mb-4">💰</div>
            <h3 class="font-bold mb-2">Affordable Price</h3>
            <p class="text-gray-700 text-sm">Best quality at competitive prices</p>
        </div>
        <div class="text-center p-6 bg-orange-50 rounded-lg hover:bg-orange-100 transition">
            <div class="text-4xl mb-4">⏱️</div>
            <h3 class="font-bold mb-2">Freshly Brewed</h3>
            <p class="text-gray-700 text-sm">Prepared to perfection every single time</p>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-16 px-4 bg-orange-50">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-4xl font-bold mb-12 text-center">Customer Reviews ⭐</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h3 class="font-bold">Sarah Johnson</h3>
                        <p class="text-sm text-gray-600">Verified Customer</p>
                    </div>
                    <span class="text-yellow-400">★★★★★</span>
                </div>
                <p class="text-gray-700">"Best coffee I've ever had! The quality and freshness are unbeatable. Highly recommend Brew Haven!"</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h3 class="font-bold">Mike Chen</h3>
                        <p class="text-sm text-gray-600">Verified Customer</p>
                    </div>
                    <span class="text-yellow-400">★★★★★</span>
                </div>
                <p class="text-gray-700">"Fast delivery and excellent customer service. This is my go-to coffee shop now!"</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h3 class="font-bold">Emma Davis</h3>
                        <p class="text-sm text-gray-600">Verified Customer</p>
                    </div>
                    <span class="text-yellow-400">★★★★★</span>
                </div>
                <p class="text-gray-700">"Love the variety of options and the affordable prices. Perfect for my daily coffee needs!"</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 px-4 bg-orange-900 text-white">
    <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-4xl font-bold mb-4">Ready to Experience Great Coffee?</h2>
        <p class="text-lg mb-8">Join thousands of satisfied customers enjoying premium coffee from Brew Haven.</p>
        <a href="{{ route('menu') }}" class="bg-yellow-400 text-orange-900 font-bold py-3 px-8 rounded-lg hover:bg-yellow-300 transition text-lg">
            Start Shopping
        </a>
    </div>
</section>
@endsection
