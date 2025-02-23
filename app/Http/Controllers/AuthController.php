<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $credentials =$request->validate([
            
            'email'    => 'required|email',
            'password' => 'required|min:10'
    
           ]);
           if(Auth::attempt($credentials)){
           return redirect()->route('index')->with('success','Logged in sussessfuly');
           }
           return back()->withErrors(['login-error'=>'invalid email or password']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Login $login)
    {
        Auth::logout();
        return redirect()->route('index')->with('success' , 'loggedout successfuly');
    }

    public function showLoginForm(){
        return view('auth.login');
        
    }
}
