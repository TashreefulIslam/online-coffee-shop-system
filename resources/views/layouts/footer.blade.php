<footer class="bg-orange-900 text-white py-12 mt-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid md:grid-cols-4 gap-8 mb-8">
            <!-- About -->
            <div>
                <h3 class="text-2xl font-bold mb-4">☕ Brew Haven</h3>
                <p class="text-gray-300">We serve freshly roasted coffee beans from around the world.</p>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="font-bold mb-4">Quick Links</h4>
                <ul class="space-y-2 text-gray-300">
                    <li><a href="{{ route('home') }}" class="hover:text-yellow-400">Home</a></li>
                    <li><a href="{{ route('menu') }}" class="hover:text-yellow-400">Menu</a></li>
                    <li><a href="{{ route('orders.index') }}" class="hover:text-yellow-400">Orders</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="font-bold mb-4">Contact</h4>
                <p class="text-gray-300 text-sm">📞 {{ \App\Models\Setting::get('shop_phone', '+1 234 567 890') }}</p>
                <p class="text-gray-300 text-sm">📧 {{ \App\Models\Setting::get('shop_email', 'info@brewhaven.com') }}</p>
                <p class="text-gray-300 text-sm">📍 {{ \App\Models\Setting::get('shop_address', '123 Coffee Street, NYC') }}</p>
            </div>

            <!-- Social -->
            <div>
                <h4 class="font-bold mb-4">Follow Us</h4>
                <div class="flex space-x-4">
                    @if(\App\Models\Setting::get('facebook'))
                        <a href="{{ \App\Models\Setting::get('facebook') }}" class="hover:text-yellow-400">Facebook</a>
                    @endif
                    @if(\App\Models\Setting::get('twitter'))
                        <a href="{{ \App\Models\Setting::get('twitter') }}" class="hover:text-yellow-400">Twitter</a>
                    @endif
                    @if(\App\Models\Setting::get('instagram'))
                        <a href="{{ \App\Models\Setting::get('instagram') }}" class="hover:text-yellow-400">Instagram</a>
                    @endif
                </div>
            </div>
        </div>

        <hr class="border-orange-700 my-4">

        <div class="text-center text-gray-300 text-sm">
            <p>&copy; {{ date('Y') }} Brew Haven. All rights reserved.</p>
        </div>
    </div>
</footer>
