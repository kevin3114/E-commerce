<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\brand;
use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('admin_home');
        $productData = Product::all();
        return view('show_product',compact('productData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoryData = category::all();
        $brandData = brand::all();
        return view('add_product',compact('categoryData','brandData'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_img'=>'required',
            'product_name'=>'required',
            'product_price'=>'required',
            'product_category'=>'required',
            'product_weight'=>'required',
            'product_brand'=>'required',
            'manufacturing_date'=>'required',
            'product_desc'=>'required',
        ]); 

         // Handle the image upload
         $imagename = null;
         if ($request->hasFile('product_img')) {
             $file = $request->file('product_img');
             $imagename = time() . '.' . $file->extension();
             $file->move(public_path('uploads'), $imagename);
         }
        
        $product = new product;
        
            $product -> product_img =$imagename;
            $product -> product_name = $request->product_name;
            $product -> product_price = $request->product_price;
            $product -> product_category = $request->product_category;
            $product -> product_weight = $request->product_weight;
            $product -> product_brand = $request->product_brand;
            $product -> manufacturing_date = $request->manufacturing_date;
            $product -> product_desc = $request->product_desc;

        $product->save();

        return redirect('/admin/create')
        ->with('alert','Successfully Product Added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(admin $admin)
    {
        //
    }
    public function logout()
    {
        return redirect('/login_form');
    }
}
