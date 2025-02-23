<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class , 'index'])->name('index');

Route::middleware(AdminMiddleware::class)->group(function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
});



Route::get('login',[AuthController::class,'showLoginForm'])->name('login');
Route::post('login',[AuthController::class,'store'])->name('login.submit');
Route::post('logout',[AuthController::class,'destroy'])->name('logout');


Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/registerr',[RegisterController::class,'store'])->name('registerr');


Route::get('/admin/login',[AdminController::class,'index'])->name('login.admin');
Route::post('/admin/login',[AdminController::class,'login'])->name('login-admin.submit');
Route::post('/admin/logout',[AdminController::class,'logout'])->name('admin-logout');


// Route::get('categories' , [CategoryController::class, 'index'])->name('categories.index');

// Route::get('products' , [ProductController::class, 'index'])->name('products');
// Route::view('/','components/layouts/app');
