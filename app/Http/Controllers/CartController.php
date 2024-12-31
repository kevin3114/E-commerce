<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\cart_item;
use App\Models\checkout;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItemData = Cart::with('cartItems.product')
        ->where('user_id', Auth::id()) 
        ->get();

        foreach ($cartItemData as $cart) {
            foreach ($cart->cartItems as $cartItem) {
                return view('my_cart', compact('cartItemData'));
            }
        }

        // return $cartItemData;
        // return view('my_cart', compact('cartItemData'));
    }


    public function create()
    {
        //
    }

    public function store(string $product_id)
    {
        $userId = Auth::user()->id;
        $productData = Product::find($product_id);
        
        $existingCartItem = cart_item::whereHas('cart', function($query) use ($userId) {
            $query->where('user_id', $userId);
        })->where('product_id', $product_id)
        ->exists();
        
        if ($existingCartItem) {
            return redirect('/product')->with('alert', 'This product is already in your cart.');
        }
        $cart = Cart::firstOrCreate(['user_id' => $userId]);
        
        $cart_item = new cart_item;
        $cart_item->cart_id = $cart->id;
        $cart_item->product_id = $productData->id;
        $cart_item->product_qty = 1;
        $cart_item->total = $productData->product_price;
        $cart_item->save();
        
        return redirect('/product')->with('alert', 'Product successfully added to the cart.');
        
    }
    
    public function show(cart $cart)
    {
        //
    }

    public function edit(cart $cart)
    {
        //
    }

    public function update(Request $request,string $product_id)
    {
        $cart_id = $request->cart_id;
        $cartItem = cart_item::find($cart_id);
        $productData = Product::find($product_id);

        $cartItem->product_qty = $request->product_qty;
        $cartItem->total = $productData->product_price * $request->product_qty;
        $cartItem->save();

        return redirect()->route('cart.index');

    }
    public function destroy(cart $cart)
    {
        //
    }

}
