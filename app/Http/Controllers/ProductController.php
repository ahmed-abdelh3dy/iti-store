<?php

namespace App\Http\Controllers;

use App\Events\AddproductEvent;
use App\Models\Category;
use App\Models\product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = product::with('categories')->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request,  product $product)
    // {
    //     // dd($request);
    //     // $product = product::create([
    //     //     'name' => $request->name,
    //     //     'price' => $request->price,
    //     //     'description' => $request->description,
    //     //     'slug' => $request->slug,
    //     //     'stock' => $request->stock,
    //     // ]);
    //     // event(new AddproductEvent($product));

    //     // return redirect()->route('products.index');


    //     $product_data = $request->except('image', 'categories');

    //     if ($request->hasFile('image')) {
    //         $imgName = time() . '.' . $request->image->getClientOriginalExtension();

    //         try {
    //             $imagepath = $request->image->storeAS('product_images', $imgName, 'public');
    //             $product_data['image'] = 'storage/' . $imagepath;
    //         } catch (Exception $e) {
    //             return back()->with('error' . 'failed tp upload image');
    //         }
    //     } else {
    //         $product_data['image'] = null;
    //     }

    //     $product_data['slug'] = strtolower(str_replace(' ', '_', $product_data['name']));


    //     product::create($product_data);

    //     if ($request->has('categories')) {
    //         $product->categories()->sync($request->categories);
    //     }


    //     return redirect()->route('admin.products.index')->with('sucess', 'product is created');
    // }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:200|min:10|unique:products,name',
            'slug' => 'required|min:5|max:255|unique:products,slug',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
            'categories' => 'required|array'

        ]);
        $product_data = $request->except('image', 'categories');

        if ($request->hasFile('image')) {
            $imgName = time() . '.' . $request->image->getClientOriginalExtension();

            try {
                $imagepath = $request->image->storeAS('product_images', $imgName, 'public');
                $product_data['image'] = 'storage/' . $imagepath;
            } catch (Exception $e) {
                return back()->with('error', 'Failed to upload image');
            }
        } else {
            $product_data['image'] = null;
        }

        // $product_data['slug'] = strtolower(str_replace(' ', '_', $product_data['name']));
        $product_data['slug'] = Hash::make($request->slug);


        $product = Product::create($product_data);

        // event(new AddproductEvent($product));

        if ($request->has('categories')) {
            $product->categories()->sync($request->categories);
        }

        return redirect()->route('admin.products.index')->with('success', 'Product is created');
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
    public function edit($id)
    {
        $product = Product::with('categories')->findOrFail($id);
        $categories = Category::all(); 
        return view('admin.products.edit', compact('product', 'categories'));
    }
    
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    
    {
        // dd($product);
        $product_data = $request->except('image', 'categories');

        if ($request->hasFile('image')) {
            $imgName = time() . '.' . $request->image->getClientOriginalExtension();

            try {
                $imagepath = $request->image->storeAS('categorey_images', $imgName, 'public');
                $product_data['image'] = 'storage/' . $imagepath;

                $this->deleteimage($product);

            } catch (Exception $e) {
                return back()->with('error' . 'failed tp upload image');
            }
        } else {
            $product_data['image'] = null;
        }

        if ($product_data['name'] != $product->name) {
            $product_data['slug'] = strtolower(str_replace(' ', '_', $product_data['name']));
        }

        // $product_data['slug'] = strtolower(str_replace(' ', '_', $product_data['name']));
        $product_data['slug'] = Hash::make($request->slug); 

        $product->update($product_data);

        if ($request->has('categories')) {
            $product->categories()->sync($request->categories);
        }

        return redirect()->route('admin.products.index')->with('sucess', 'product is updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Product::destroy($id);
        $product = Product::findOrFail($id);
        $this->deleteimage($product);
        $product->delete();
        return redirect()->route('products.index');
    }


    protected function deleteimage($product)
    {
        if ($product->image) {
            $oldimage = str_replace('storage/', '', $product->image);

            if (Storage::disk('public')->exists($oldimage)) {
                Storage::disk('public')->delete($oldimage);
            }
        }
    }
}
