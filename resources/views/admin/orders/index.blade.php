@extends('layouts.admin')

@section('title', 'Orders - Admin Panel')

@section('content')
<div class="p-8">
    <h1 class="text-4xl font-bold mb-8">Orders Management</h1>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left px-6 py-4 font-bold">Order ID</th>
                    <th class="text-left px-6 py-4 font-bold">Customer</th>
                    <th class="text-left px-6 py-4 font-bold">Items</th>
                    <th class="text-left px-6 py-4 font-bold">Total</th>
                    <th class="text-left px-6 py-4 font-bold">Status</th>
                    <th class="text-left px-6 py-4 font-bold">Date</th>
                    <th class="text-left px-6 py-4 font-bold">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-bold">#{{ $order->id }}</td>
                        <td class="px-6 py-4">{{ $order->user->name }}</td>
                        <td class="px-6 py-4">{{ $order->items->count() }}</td>
                        <td class="px-6 py-4 font-bold text-orange-600">${{ number_format($order->total_price, 2) }}</td>
                        <td class="px-6 py-4">
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
                        <td class="px-6 py-4">{{ $order->created_at->format('M d, Y') }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="text-blue-600 hover:text-blue-800 font-bold">
                                View
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-8">
        {{ $orders->links() }}
    </div>
</div>
@endsection
