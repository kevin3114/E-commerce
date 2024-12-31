<?php

namespace App\Http\Controllers;

use App\Models\brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('add_brand');
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_name'=>'required',
        ]);

        $brand = new brand;

        $brand -> brand_name = $request -> brand_name;

        $brand->save();

        return redirect()->route('admin.create');
    }

    public function show(brand $brand)
    {
        //
    }
    public function edit(brand $brand)
    {
        //
    }

    public function update(Request $request, brand $brand)
    {
        //
    }

    public function destroy(brand $brand)
    {
        //
    }
}
