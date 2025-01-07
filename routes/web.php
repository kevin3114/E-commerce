<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/',[UserController::class,'register_form']);
Route::post('/store_register',[UserController::class,'store_register']);

Route::get('/login_form',[UserController::class,'login_form']);
Route::post('/login',[UserController::class,'login']);

Route::get('/home',[UserController::class,'checklogin_user']);

Route::resource('product',ProductController::class);

// manage category and brand
Route::resource('category',CategoryController::class);
Route::resource('brand',BrandController::class);

//wishlist
Route::post('/store_wishlist/{product_id}', [WishlistController::class, 'store']);
Route::resource('wishlist', WishlistController::class);

//cart
Route::post('/store_cart/{product_id}', [CartController::class, 'store']);
Route::resource('cart', CartController::class);
Route::post('/cartupdate/{product_id}', [CartController::class,'update']);


//checkout
Route::resource('checkout',CheckoutController::class);

Route::resource('admin', AdminController::class);
Route::get('admin_show_user',function(){
    $userData = User::all();
    return view('admin_show_user',compact('userData'));
});

//order
Route::resource('/order',OrderController::class);
Route::get('/my_order',[OrderController::class,'my_order']);
Route::get('/orders/category', [OrderController::class, 'filterCategory']);

Route::get('/logout',[UserController::class,'logout']);


