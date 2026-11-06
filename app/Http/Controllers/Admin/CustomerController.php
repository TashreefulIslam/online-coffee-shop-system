<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index(): View
    {
        $customers = User::where('role', 'customer')
            ->withCount('orders')
            ->paginate(10);

        return view('admin.customers.index', compact('customers'));
    }

    public function show($id): View
    {
        $customer = User::with('orders')->findOrFail($id);
        return view('admin.customers.show', compact('customer'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.customers.index')->with('success', 'Customer deleted successfully');
    }
}
