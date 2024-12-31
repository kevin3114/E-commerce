<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\User;
use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $wishlistData = Wishlist::with('product')->where('user_id', $userId)->get();

        // return $wishlistData;
        return view('my_wishlist',compact('wishlistData'));
    }

    public function create()
    {
        //
    }

    public function store(string $product_id)
    {
        $userId = Auth::User()->id;
        $productId = product::find($product_id);

        $existingWishlistItem = wishlist::where('user_id', $userId)->where('product_id', $productId->id)->first();

        if ($existingWishlistItem) 
        {
            return redirect('/product')->with('alert', 'This product is already in your wishlist.');
        }

        $wishlist = new wishlist;

        $wishlist -> product_id = $productId->id;
        $wishlist -> user_id = $userId;

        $wishlist->save();
        
        return redirect('/product')->with('alert','Successfully Add in whislist.');
    }

    public function show(wishlist $wishlist)
    {
        //
    }

    public function edit(wishlist $wishlist)
    {
        //
    }

    public function update(Request $request, wishlist $wishlist)
    {
        //
    }

    public function destroy(wishlist $wishlist)
    {
        //
    }
}
