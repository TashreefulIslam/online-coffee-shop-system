<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\View\View;

class WishlistController extends Controller
{
    public function index(): View
    {
        $wishlists = auth()->user()->wishlists()
            ->with('product.category')
            ->paginate(12);

        return view('wishlist', compact('wishlists'));
    }

    public function add($productId)
    {
        $existing = Wishlist::where('user_id', auth()->id())
            ->where('product_id', $productId)
            ->first();

        if (!$existing) {
            Wishlist::create([
                'user_id' => auth()->id(),
                'product_id' => $productId,
            ]);
        }

        return redirect()->back()->with('success', 'Added to wishlist');
    }

    public function remove($id)
    {
        $wishlist = Wishlist::where('user_id', auth()->id())
            ->findOrFail($id);
        
        $wishlist->delete();

        return redirect()->back()->with('success', 'Removed from wishlist');
    }
}
