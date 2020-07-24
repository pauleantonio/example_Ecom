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



Auth::routes();
Route::get('/', 'IndexController@index')->name('index')->middleware('user');
Route::prefix('dashboard')->middleware('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('products', 'ProductController@index')->name('productIndex');
    Route::post('products', 'ProductController@store')->name('productStore');
    Route::get('products/create', 'ProductController@create')->name('productCreate');
    Route::get('products/{product}', 'ProductController@show')->name('productShow');
    Route::get('products/{product}/edit', 'ProductController@edit')->name('productEdit');
    Route::put('products/{product}', 'ProductController@update')->name('productUpdate');
    Route::post('products/{product}', 'ProductController@destroy')->name('productDestroy');

    Route::get('orders', 'OrderController@index')->name('orderIndex');
    Route::put('orders/{order}', 'OrderController@paid')->name('orderPaid');
});


Route::prefix('cart')->middleware('auth')->group(function () {
    Route::get('/', 'IndexController@cart')->name('cartShow');
    Route::post('/add/{product}', 'IndexController@cartAdd')->name('cartAdd');
    Route::post('/delete/{wishlist}', 'IndexController@cartDestroy')->name('cartDestroy');
    Route::post('/{wishlist}', 'IndexController@createOrder')->name('createOrder');
  
});


Route::get('/user/profile', 'HomeController@index')->name('user')->middleware('user');
Route::get('/order','IndexController@order')->name('order')->middleware('user');
Route::get('/order/{order}','IndexController@orderlist')->name('orderlist')->middleware('user');
Route::get('/{product}/show', 'IndexController@show')->name('product')->middleware('user');
