@extends('layouts.admin')

@section('title', 'Customers - Admin Panel')

@section('content')
<div class="p-8">
    <h1 class="text-4xl font-bold mb-8">Customer Management</h1>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left px-6 py-4 font-bold">Customer Name</th>
                    <th class="text-left px-6 py-4 font-bold">Email</th>
                    <th class="text-left px-6 py-4 font-bold">Phone</th>
                    <th class="text-left px-6 py-4 font-bold">Orders</th>
                    <th class="text-left px-6 py-4 font-bold">Joined</th>
                    <th class="text-left px-6 py-4 font-bold">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-bold">{{ $customer->name }}</td>
                        <td class="px-6 py-4">{{ $customer->email }}</td>
                        <td class="px-6 py-4">{{ $customer->phone ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $customer->orders_count }}</td>
                        <td class="px-6 py-4">{{ $customer->created_at->format('M d, Y') }}</td>
                        <td class="px-6 py-4 space-x-3">
                            <a href="{{ route('admin.customers.show', $customer->id) }}" class="text-blue-600 hover:text-blue-800 font-bold">
                                View
                            </a>
                            <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-bold">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-8">
        {{ $customers->links() }}
    </div>
</div>
@endsection
