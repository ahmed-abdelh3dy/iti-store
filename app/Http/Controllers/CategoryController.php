<?php

namespace App\Http\Controllers;

use App\Models\category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string|min:5|max:150|regex:/^[A-Za-z\s]+$/|unique:categories',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $category_data = $request->except('image');

        if ($request->hasFile('image')) {
            $imgName = time() . '.' . $request->image->getClientOriginalExtension();

            try {
                $imagepath = $request->image->storeAS('categorey_images', $imgName, 'public');
                $category_data['image'] = 'storage/' . $imagepath;
            } catch (Exception $e) {
                return back()->with('error' . 'failed tp upload image');
            }
        } else {
            $category_data['image'] = null;
        }

        $category_data['slug'] = strtolower(str_replace(' ', '_', $category_data['name']));


        category::create($category_data);


        return redirect()->route('admin.categories.index')->with('sucess', 'category is created');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = category::FindOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:150|regex:/^[A-Za-z\s]+$/|unique:categories,name,' . $category->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $category_data = $request->except('image');

        if ($request->hasFile('image')) {
            $imgName = time() . '.' . $request->image->getClientOriginalExtension();

            try {
                $imagepath = $request->image->storeAS('categorey_images', $imgName, 'public');
                $category_data['image'] = 'storage/' . $imagepath;

                $this->deleteimage($category);
            } catch (Exception $e) {
                return back()->with('error' . 'failed tp upload image');
            }
        } else {
            $category_data['image'] = null;
        }

        if ($category_data['name'] != $category->name) {
            $category_data['slug'] = strtolower(str_replace(' ', '_', $category_data['name']));
        }

        // $category_data['slug'] = strtolower(str_replace(' ', '_', $category_data['name']));

        $category->update($category_data);


        return redirect()->route('admin.categories.index')->with('sucess', 'category is updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( category $category )
    {
        $this->deleteimage($category);
        $category->delete();
        // category::destroy($id);
        return redirect()->route('admin.categories.index');

    }

    protected function deleteimage($category)
    {
        if ($category->image) {
            $oldimage = str_replace('storage/', '', $category->image);

            if (Storage::disk('public')->exists($oldimage)) {
                Storage::disk('public')->delete($oldimage);
            }
        }
    }
}
