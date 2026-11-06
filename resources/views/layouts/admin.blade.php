<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin - Brew Haven')</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-orange-900 text-white p-6 overflow-y-auto">
            <div class="mb-8">
                <h1 class="text-2xl font-bold">☕ Admin Panel</h1>
            </div>

            <nav class="space-y-4">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded hover:bg-orange-800 @if(request()->routeIs('admin.dashboard')) bg-orange-800 @endif">
                    📊 Dashboard
                </a>
                <a href="{{ route('admin.categories.index') }}" class="block px-4 py-2 rounded hover:bg-orange-800 @if(request()->routeIs('admin.categories.*')) bg-orange-800 @endif">
                    🏷️ Categories
                </a>
                <a href="{{ route('admin.products.index') }}" class="block px-4 py-2 rounded hover:bg-orange-800 @if(request()->routeIs('admin.products.*')) bg-orange-800 @endif">
                    🍵 Products
                </a>
                <a href="{{ route('admin.orders.index') }}" class="block px-4 py-2 rounded hover:bg-orange-800 @if(request()->routeIs('admin.orders.*')) bg-orange-800 @endif">
                    📦 Orders
                </a>
                <a href="{{ route('admin.customers.index') }}" class="block px-4 py-2 rounded hover:bg-orange-800 @if(request()->routeIs('admin.customers.*')) bg-orange-800 @endif">
                    👥 Customers
                </a>
                <a href="{{ route('admin.settings.edit') }}" class="block px-4 py-2 rounded hover:bg-orange-800 @if(request()->routeIs('admin.settings.*')) bg-orange-800 @endif">
                    ⚙️ Settings
                </a>
            </nav>

            <hr class="my-6 border-orange-800">

            <div class="space-y-2">
                <p class="text-sm text-orange-200">Logged in as</p>
                <p class="font-bold">{{ auth()->user()->name }}</p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm text-orange-200 hover:text-white">Logout</button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 m-4 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 m-4 rounded">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</body>
</html>
