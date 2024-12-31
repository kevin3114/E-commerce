<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('add_category');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name'=>'required',
        ]);

        $category = new category;

        $category -> category_name = $request -> category_name;

        $category->save();

        return redirect()->route('admin.create');
    }

    public function show(category $category)
    {
        //
    }

    public function edit(category $category)
    {
        //
    }

    public function update(Request $request, category $category)
    {
        //
    }

    public function destroy(category $category)
    {
        //
    }
}
