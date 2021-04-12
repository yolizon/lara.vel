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
})->name('home.page');
Route::get('/upload', function () {
    return view('upload');
});

Route::name('admin.')->prefix('admin')->namespace("App\Http\Controllers\Admin")->group(function(){ 
    Route::get('', 'DashboardController')->name('dashboard');
    Route::get('config', 'ConfigController@index')->name('config');
    Route::resource('users', 'UserController');
    Route::resource('categories', 'CategoryController');

   // admin.brands.trashed
   Route::get('brands/trashed', 'BrandController@trashed')->name('brands.trashed');
   Route::post('brands/restore/{id}', 'BrandController@restore')->name('brands.restore');
   Route::delete('brands/force/{id}', 'BrandController@force')->name('brands.force');
    Route::resource('brands', 'BrandController');
    Route::resource('products', 'ProductController');
});

Route::name('site.')->prefix('site')->namespace("App\Http\Controllers")->group(function(){ 
    Route::get('', 'HomeController@index')->name('home');
        Route::get('about', 'AboutController@index')->name('about');
        Route::get('contact', 'ContactController@index')->name('contact');
        Route::get('shop', 'ShopController@index')->name('shop');
        Route::get('shop/{id}', 'ShopController@show')->name('shop.product');
        Route::get('catalog', function () {
            return view('web.catalog');
        });
});

// 'product.add.to.cart'
Route::post('/product/add/to/cart', 'App\Http\Controllers\ShopController@addToCart')->name('product.add.to.cart');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::get('cart/item/{id}/remove', 'App\Http\Controllers\CartController@remove')->name('cart.item.remove');


//=====fallback====
Route::fallback(function(){
    return view('errors.404');
});