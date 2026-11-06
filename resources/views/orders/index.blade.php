@extends('layouts.app')

@section('title', 'My Orders - Brew Haven')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-12">
    <h1 class="text-4xl font-bold mb-8">My Orders 📦</h1>

    @if($orders->count() > 0)
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-orange-100">
                    <tr>
                        <th class="text-left px-6 py-4 font-bold">Order ID</th>
                        <th class="text-left px-6 py-4 font-bold">Date</th>
                        <th class="text-left px-6 py-4 font-bold">Items</th>
                        <th class="text-left px-6 py-4 font-bold">Total</th>
                        <th class="text-left px-6 py-4 font-bold">Status</th>
                        <th class="text-left px-6 py-4 font-bold">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-4 font-bold">#{{ $order->id }}</td>
                            <td class="px-6 py-4">{{ $order->created_at->format('M d, Y') }}</td>
                            <td class="px-6 py-4">{{ $order->items->count() }} item(s)</td>
                            <td class="px-6 py-4 font-bold text-orange-600">${{ number_format($order->total_price, 2) }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-sm font-bold
                                    @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                                    @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                                    @elseif($order->status === 'completed') bg-green-100 text-green-800
                                    @else bg-red-100 text-red-800
                                    @endif
                                ">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('orders.show', $order->id) }}" class="text-orange-600 hover:text-orange-800 font-bold">
                                    View Details →
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $orders->links() }}
        </div>
    @else
        <div class="text-center py-16">
            <p class="text-6xl mb-4">📭</p>
            <p class="text-2xl mb-4 font-semibold">No orders yet</p>
            <p class="text-gray-600 mb-8">Start shopping to place your first order</p>
            <a href="{{ route('menu') }}" class="btn-primary py-3">Start Shopping</a>
        </div>
    @endif
</div>
@endsection
