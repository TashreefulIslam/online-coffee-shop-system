@extends('layouts.admin')

@section('title', 'Customer Details - Admin Panel')

@section('content')
<div class="p-8">
    <div class="mb-8">
        <a href="{{ route('admin.customers.index') }}" class="text-orange-600 hover:text-orange-800 font-bold">← Back to Customers</a>
    </div>

    <div class="bg-white p-8 rounded-lg shadow">
        <div class="flex justify-between items-start mb-8">
            <div>
                <h1 class="text-4xl font-bold mb-2">{{ $customer->name }}</h1>
                <p class="text-gray-600">{{ $customer->email }}</p>
            </div>
            <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700">Delete Customer</button>
            </form>
        </div>

        <div class="grid md:grid-cols-2 gap-6 mb-8">
            <div class="bg-gray-50 p-4 rounded">
                <p class="text-sm text-gray-600">Phone</p>
                <p class="text-lg font-semibold">{{ $customer->phone ?: 'Not provided' }}</p>
            </div>
            <div class="bg-gray-50 p-4 rounded">
                <p class="text-sm text-gray-600">Role</p>
                <p class="text-lg font-semibold capitalize">{{ $customer->role }}</p>
            </div>
            <div class="bg-gray-50 p-4 rounded md:col-span-2">
                <p class="text-sm text-gray-600">Address</p>
                <p class="text-lg font-semibold">{{ $customer->address ?: 'Not provided' }}</p>
            </div>
            <div class="bg-gray-50 p-4 rounded">
                <p class="text-sm text-gray-600">Joined</p>
                <p class="text-lg font-semibold">{{ $customer->created_at->format('M d, Y') }}</p>
            </div>
            <div class="bg-gray-50 p-4 rounded">
                <p class="text-sm text-gray-600">Total Orders</p>
                <p class="text-lg font-semibold">{{ $customer->orders->count() }}</p>
            </div>
        </div>

        <hr class="my-6">

        <h2 class="text-2xl font-bold mb-4">Order History</h2>
        @if($customer->orders->count() > 0)
            <div class="space-y-3">
                @foreach($customer->orders as $order)
                    <div class="flex justify-between items-center border rounded p-4">
                        <div>
                            <p class="font-bold">Order #{{ $order->id }}</p>
                            <p class="text-sm text-gray-600">{{ $order->created_at->format('M d, Y') }}</p>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-orange-600">${{ number_format($order->total_price, 2) }}</p>
                            <p class="text-sm capitalize">{{ $order->status }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600">No orders found for this customer.</p>
        @endif
    </div>
</div>
@endsection
