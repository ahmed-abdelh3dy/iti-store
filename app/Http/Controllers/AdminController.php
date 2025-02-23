<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.admin-login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(Request $request)
    {
        $credentials =$request->validate([
            
            'email'    => 'required|email',
            'password' => 'required'
    
           ]);
           if(Auth::guard('admin')->attempt($credentials)){
           return redirect()->route('admin.dashboard')->with('success','Admin Logged in sussessfuly');
           }
           return back()->withErrors(['admin-login-error'=>'invalid email or password']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
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
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('index')->with('success' , 'Admin logged out successfuly');
    }
}
