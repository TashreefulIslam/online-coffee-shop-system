<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $featuredProducts = Product::orderBy('sales_count', 'desc')
            ->with('category')
            ->take(6)
            ->get();
        
        $categories = Category::all();

        return view('home', compact('featuredProducts', 'categories'));
    }

    public function menu(): View
    {
        $products = Product::with('category')->paginate(12);
        $categories = Category::all();

        return view('menu', compact('products', 'categories'));
    }

    public function productDetails($id): View
    {
        $product = Product::with('category')->findOrFail($id);
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $id)
            ->take(4)
            ->get();

        return view('product-details', compact('product', 'relatedProducts'));
    }
}
