<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::resource('/api/products','ProductController');
Route::resource('/api/wishlist','WishlistController');
Route::resource('/api/coupon','CouponController');

Route::resource('/api/user','UserController');
Route::resource('/api/order','OrderController');
Route::resource('/api/orderproduct','OrderProductController');
Route::resource('/api/categoryproducts','CategoryProductController');

