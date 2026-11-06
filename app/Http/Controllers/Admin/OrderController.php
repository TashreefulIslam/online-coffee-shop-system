<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::with('user', 'items')
            ->latest()
            ->paginate(10);
        
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id): View
    {
        $order = Order::with('user', 'items.product')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled',
        ]);

        if ($validated['status'] === 'completed' && !$order->completed_at) {
            $validated['completed_at'] = now();
        }

        $order->update($validated);

        return redirect()->route('admin.orders.show', $id)->with('success', 'Order status updated successfully');
    }
}
