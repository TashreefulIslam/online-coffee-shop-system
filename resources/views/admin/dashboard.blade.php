@extends('layouts.admin')

@section('title', 'Dashboard - Admin Panel')

@section('content')
<div class="p-8">
    <h1 class="text-4xl font-bold mb-8">Dashboard</h1>

    <!-- Statistics Cards -->
    <div class="grid md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-lg shadow">
            <p class="text-gray-600 mb-2">Total Products</p>
            <p class="text-4xl font-bold text-orange-600">{{ $totalProducts }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <p class="text-gray-600 mb-2">Total Orders</p>
            <p class="text-4xl font-bold text-blue-600">{{ $totalOrders }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <p class="text-gray-600 mb-2">Total Customers</p>
            <p class="text-4xl font-bold text-green-600">{{ $totalCustomers }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <p class="text-gray-600 mb-2">Total Revenue</p>
            <p class="text-4xl font-bold text-purple-600">${{ number_format($totalRevenue, 2) }}</p>
        </div>
    </div>

    <!-- Order Status Distribution -->
    <div class="grid md:grid-cols-2 gap-6 mb-8">
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-xl font-bold mb-4">Order Status Distribution</h3>
            <div class="space-y-3">
                @foreach($orderStatuses as $status)
                    <div class="flex justify-between items-center">
                        <span class="capitalize">{{ $status->status }}</span>
                        <span class="font-bold">{{ $status->count }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-xl font-bold mb-4">Quick Links</h3>
            <div class="space-y-2">
                <a href="{{ route('admin.products.create') }}" class="block px-4 py-2 bg-orange-600 text-white rounded hover:bg-orange-700">
                    ➕ Add New Product
                </a>
                <a href="{{ route('admin.categories.create') }}" class="block px-4 py-2 bg-orange-600 text-white rounded hover:bg-orange-700">
                    ➕ Add New Category
                </a>
                <a href="{{ route('admin.orders.index') }}" class="block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    📦 View All Orders
                </a>
            </div>
        </div>
    </div>

    <!-- Recent Orders -->
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-xl font-bold mb-4">Recent Orders</h3>
        <table class="w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left px-4 py-2 font-bold">Order ID</th>
                    <th class="text-left px-4 py-2 font-bold">Customer</th>
                    <th class="text-left px-4 py-2 font-bold">Items</th>
                    <th class="text-left px-4 py-2 font-bold">Total</th>
                    <th class="text-left px-4 py-2 font-bold">Status</th>
                    <th class="text-left px-4 py-2 font-bold">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentOrders as $order)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2 font-bold">#{{ $order->id }}</td>
                        <td class="px-4 py-2">{{ $order->user->name }}</td>
                        <td class="px-4 py-2">{{ $order->items->count() }}</td>
                        <td class="px-4 py-2 font-bold text-orange-600">${{ number_format($order->total_price, 2) }}</td>
                        <td class="px-4 py-2">
                            <span class="px-2 py-1 rounded text-sm font-bold
                                @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                                @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                                @elseif($order->status === 'completed') bg-green-100 text-green-800
                                @else bg-red-100 text-red-800
                                @endif
                            ">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-2">{{ $order->created_at->format('M d, Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
