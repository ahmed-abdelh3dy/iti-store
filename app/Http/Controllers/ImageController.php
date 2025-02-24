<?php

namespace App\Http\Controllers;

use App\Models\image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images=image::all();
        return view('upload',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);
                $path = $request->file('image')->store('uploads', 'public');
                $imageUrl = asset("storage/$path");
                return back()->with('success', 'upload image')->with('image', $imageUrl);
    }

    /**
     * Display the specified resource.
     */
    public function show(image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(image $image)
    {
        //
    }
}
