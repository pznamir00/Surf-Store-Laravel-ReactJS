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

Route::get('/', 'PageController@index');



//products
Route::middleware('admin')->group(function(){
  Route::post('/products/add', 'ProductController@commit');
  Route::get('/products/add', 'ProductController@add')->name('add_product');

  Route::put('/products/edit/{id}', 'ProductController@update');
  Route::get('/products/edit/{id}', 'ProductController@edit')->name('edit_product');

  Route::post('/products/delete/{id}', 'ProductController@delete');
});

Route::get('/products/search', 'PageController@keywords');

Route::get('/products/{category}/{subcategory}', 'PageController@categories')->name('categories');

Route::get('/products/{id}', 'PageController@one_product')->name('one_product');

Route::post('/products/images/upload', 'ImageController@upload');



//cart and order
Route::middleware('cart')->group(function(){
  Route::get('/cart', 'CartController@index')->name('cart');

  Route::get('/cart/delete/{key}', 'CartController@delete_from_cart');

  Route::get('/cart/clear', 'CartController@clear');

  Route::get('/order', 'OrderController@index')->name('order_form');

  Route::post('/order', 'OrderController@save_data_form');

  Route::get('/order/pay-way', 'OrderController@pay_way');

  Route::put('/cart/change-size-quantity', 'CartController@change_size');
});

Route::get('/cart/add-to-cart', 'CartController@add_to_cart');



//account
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
