<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.register');
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
        // dd($request);
        $request->validate([
            'name'     => 'required|string|min:5',
            'email'    => 'required|email|unique:users',
            'password' => 'required|confirmed|min:10',
            'phone'    => 'required','regex:/^20\d{10}$/',
            'address'  => 'required'
    
           ]);

           User::create([
              'name' =>$request->name,
              'email'=>$request->email,
              'password'=> bcrypt($request->password), 
              'phone' =>$request->phone,
              'address'=> $request->address
           ]);
           return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     */
    public function show(Register $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Register $register ,User $user,$id)
    {
        $user = Auth::user();
        return view('auth.edit' ,compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone'    => ['required', 'regex:/^20\d{10}$/'],
            'address' => 'nullable|string|max:255',
            'password' => 'nullable|min:6|confirmed'
        ]);
    
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);
    
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Register $register)
    {
        //
    }
}
