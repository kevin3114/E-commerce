<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $productData = Product::all();
        return view('show_product',compact('productData'));
    }

    public function create()
    {
        //
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

        return redirect('/product/create')
        ->with('alert','Successfully Student Added.');
    }

    public function show(product $product)
    {
        //
    }

    public function edit(product $product)
    {
        //
    }

    public function update(Request $request, product $product)
    {
        //
    }

    public function destroy(product $product)
    {
        //
    }
}
