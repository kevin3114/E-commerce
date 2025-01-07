<?php

namespace App\Http\Controllers;

use App\Models\cart_item;
use App\Models\checkout;
use App\Models\product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $productData = product::all();
        $productId = $productData->pluck('id');
        $cartItemData = cart_item::with('product')
                        ->whereIn('product_id', $productId)
                        ->get();
        return view('checkout',compact('cartItemData'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name'=>'required',
            'email'=>'required',
            'shipping_address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'zipcode'=>'required',
            'country'=>'required',
            'cart_item_id'=>'required'
        ]); 
        
        $checkout = new checkout;

        $checkout->full_name = $request->full_name;
        $checkout->email = $request->email;
        $checkout->shipping_address = $request->shipping_address;
        $checkout->city = $request->city;
        $checkout->state = $request->state;
        $checkout->zipcode = $request->zipcode;
        $checkout->country = $request->country;
        $checkout->cart_item_id = $request->cart_item_id;
        $checkout->save();

        if($checkout){
            return redirect()->route('order.index');
        }   
    }

    public function show(checkout $checkout)
    {
        //
    }

    public function edit(checkout $checkout)
    {
        //
    }

    public function update(Request $request, checkout $checkout)
    {
        //
    }

    public function destroy(checkout $checkout)
    {
        //
    }
}
