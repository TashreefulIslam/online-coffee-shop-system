<nav class="bg-orange-900 text-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">


        <!-- Logo -->
        <a href="{{ route('home') }}"
           class="text-2xl font-bold text-yellow-400">
            ☕ Brew Haven
        </a>

        <!-- Desktop Menu -->
        <div class="hidden md:flex space-x-6">

            <!-- Home -->
            <a href="{{ route('home') }}"
               class="hover:text-yellow-400 transition">
                Home
            </a>

            <!-- Menu -->
            <a href="{{ route('menu') }}"
               class="hover:text-yellow-400 transition">
                Menu
            </a>

            @auth

                @if(auth()->user()->isAdmin())

                    <!-- ================= ADMIN MENU ================= -->

                    <!-- Admin Orders -->
                    <a href="{{ route('admin.orders.index') }}"
                       class="hover:text-yellow-400 transition">
                        Orders
                    </a>

                    <!-- Admin Dashboard -->
                    <a href="{{ route('admin.dashboard') }}"
                       class="hover:text-yellow-400 transition">
                        Admin
                    </a>

                @else

                    <!-- ================= CUSTOMER MENU ================= -->

                    <!-- My Orders -->
                    <a href="{{ route('orders.index') }}"
                       class="hover:text-yellow-400 transition">
                        My Orders
                    </a>

                    <!-- Cart -->
                    <a href="{{ route('cart.index') }}"
                       class="hover:text-yellow-400 transition">
                        Cart
                    </a>

                @endif

            @endauth

        </div>

        <!-- Right Side -->
        <div class="flex items-center space-x-4">

            @auth

                <!-- User Role Dropdown -->
                <div class="relative group">

                    <button type="button"
                            class="hover:text-yellow-400 transition flex items-center">
                        
                        👤
                        
                        @if(auth()->user()->isAdmin())
                            Admin
                        @else
                            Customer
                        @endif

                    </button>

                    <!-- Dropdown -->
                    <div class="hidden group-hover:block absolute right-0 w-48 bg-white text-orange-900 rounded shadow-lg z-10">

                        <!-- Edit Profile -->
                        <a href="{{ route('profile.edit') }}"
                           class="block px-4 py-2 hover:bg-gray-100">
                            Edit Profile
                        </a>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit"
                                    class="block w-full text-left px-4 py-2 hover:bg-gray-100">
                                Logout
                            </button>
                        </form>

                    </div>
                </div>

            @else

                <!-- Guest Buttons -->
                <a href="{{ route('login') }}"
                   class="btn-secondary">
                    Login
                </a>

                <a href="{{ route('register') }}"
                   class="btn-outline">
                    Register
                </a>

            @endauth

        </div>

    </div>
</div>


</nav>
