<?php

namespace App\Http\Controllers;

use App\Models\cart_item;
use App\Models\category;
use App\Models\order;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orderData = cart_item::with('product')->get();
        return view('order',compact('orderData'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user_id = Auth::id();
        $order = new order;
            $order->product_id = $request->product_id;
            $order->user_id = $user_id;
            $order->full_name = $request->full_name;
            $order->email = $request->email;
            $order->delivery_address = $request->delivery_address;
            $order->phone_no = $request->phone_no;
        $order->save();

        return redirect('/order')->with('success','Order Placed Successfully');
    }

    public function show(order $order)
    {
        //
    }

    public function edit(order $order)
    {
        //
    }

    public function update(Request $request, order $order)
    {
        //
    }

    public function destroy(order $order)
    {
        //
    }

    public function my_order()
    {
        $myOrderData = order::with('product')->where('user_id',Auth::id())->get();
        // return $myOrderData;
        $categoryData = category::all();
        // return $categoryData;
        return view('my_order',compact('myOrderData','categoryData'));
    }

    public function filterCategory(Request $request)
    {
        $productCategory = $request->input('product_category');
        
        $query = Order::with('product')->where('user_id', auth()->id());
    
        if ($productCategory && $productCategory != 'Filter by Category') {
            $query->whereHas('product', function ($query) use ($productCategory) {
                $query->where('product_category', $productCategory);
            });
        }
    
        $myOrderData = $query->get();
    
        $categoryData = Category::all();
    
        return view('my_order', compact('myOrderData', 'categoryData'));
    }
    
    
}
