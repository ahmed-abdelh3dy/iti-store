<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = product::all();
        return view('products.products' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'slug' => $request->slug,
            'stock' => $request->stock,
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product,$id)
    {
        Product::destroy($id);
        // $product = Product::findOrFail($id);
        // $product->delete();
        return redirect()->route('products.index');
    }
}
