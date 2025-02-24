<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

//home
Route::get('/',[HomeController::class , 'index'])->name('index');


//dashboard
Route::middleware(AdminMiddleware::class)->group(function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');

});


//login
Route::get('login',[AuthController::class,'showLoginForm'])->name('login');
Route::post('login',[AuthController::class,'store'])->name('login.submit');
Route::post('logout',[AuthController::class,'destroy'])->name('logout');

//register
Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/registerr',[RegisterController::class,'store'])->name('registerr');

//admin login

Route::get('/admin/login',[AdminController::class,'index'])->name('login.admin');
Route::post('/admin/login',[AdminController::class,'login'])->name('login-admin.submit');
Route::post('/admin/logout',[AdminController::class,'logout'])->name('admin-logout');


//products
Route::prefix('products')->group(function(){
    Route::get('index', [ProductController::class, 'index'])->name('products.index');
    Route::get('create', [ProductController::class, 'create'])->name('products.create');
    Route::post('store', [ProductController::class, 'store'])->name('products.store');
    Route::get('edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('update/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
});


//upload image 
Route::get('image',[ImageController::class,'index'])->name('image');
Route::post('image/upload',[ImageController::class,'store'])->name('image.store');













// Route::get('categories' , [CategoryController::class, 'index'])->name('categories.index');
// Route::get('products' , [ProductController::class, 'index'])->name('products');
// Route::view('/','components/layouts/app');
