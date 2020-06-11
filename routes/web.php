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

  Route::delete('/products/delete', 'ProductController@delete')->name('delete_product');
});

Route::get('/products/search', 'PageController@keywords');

Route::get('/products/{category}/{subcategory}', 'PageController@categories')->name('categories');

Route::get('/products/{id}', 'PageController@one_product')->name('one_product');

Route::post('/products/images/upload', 'ProductController@create_image');



//cart and order
Route::middleware('cart')->group(function(){
  Route::get('/cart', 'CartController@index')->name('cart');

  Route::delete('/cart/delete', 'CartController@delete_from_cart');

  Route::get('/cart/clear', 'CartController@clear');

  Route::get('/order', 'OrderController@index')->name('order_form');

  Route::post('/order', 'OrderController@save_data_form');

  Route::get('/order/delivery', 'OrderController@delivery');

  Route::post('/order/delivery', 'OrderController@delivery');

  Route::get('/order/payment', 'OrderController@payment');

  Route::post('/order/payment', 'OrderController@payment');

  Route::get('order/summary', 'OrderController@summary');

  Route::post('/order/summary', 'OrderController@make_order');

  Route::put('/cart/change-size-quantity', 'CartController@change_size');

  Route::post('/cart/make-order', 'OrderController@make_order');
});

Route::get('/cart/add-to-cart', 'CartController@add_to_cart');



//contact
Route::get('/contact', 'ContactController@index')->name('contact');

Route::post('/contact', 'ContactController@submit_message');



//account
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::get('/admin/products/create', 'ProductController@add');
});



Route::fallback(function(){
    return view('errors.404_not_found');
});
