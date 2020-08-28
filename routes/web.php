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

//account
Auth::routes();

//index
Route::get('/', 'PageController@index');


//products
Route::middleware('admin')->group(function(){
  Route::post('/products/add', 'ProductController@commit');

  Route::get('/products/add', 'ProductController@add')->name('add_product');

  Route::put('/products/edit/{id}', 'ProductController@update');

  Route::get('/products/edit/{id}', 'ProductController@edit')->name('edit_product');

  Route::delete('/products', 'ProductController@delete')->name('delete_product');

  Route::post('/products/images', 'ImageController@create_single_image');
});



//account
Route::middleware('auth')->group(function(){
  Route::get('/home', 'HomeController@index')->name('home');

  Route::post('/home/account', 'HomeController@close_account')->name('close_account');
});



//cart and order
Route::post('/cart/items', 'CartController@add_to_cart');

Route::middleware('cart')->group(function(){
  Route::get('/cart', 'CartController@index')->name('cart');

  Route::delete('/cart', 'CartController@clear');

  Route::delete('/cart/items', 'CartController@delete_from_cart');

  Route::post('/order', 'OrderController@make_order');

  Route::get('/order/personal-data', 'OrderController@index')->name('personal-data');

  Route::post('/order/personal-data', 'OrderController@save_data_form');

  Route::get('/order/delivery', 'OrderController@delivery')->name('delivery');

  Route::post('/order/delivery', 'OrderController@delivery');

  Route::get('/order/payment', 'OrderController@payment')->name('payment');

  Route::post('/order/payment', 'OrderController@payment');

  Route::get('/order/summary', 'OrderController@summary')->name('summary');

  Route::post('/order/summary', 'OrderController@make_order');

  Route::patch('/cart/items/sizes', 'DataAjaxController@change_size_quantity');
});


//filters
Route::get('/products-list/keywords', 'FilterController@keywords');

Route::get('/products-list/categories/{category}/{subcategory}', 'FilterController@categories')->name('categories');

//one product
Route::get('/products/{id}', 'PageController@one_product')->name('one_product');


//layouts
Route::get('/categories', 'DataAjaxController@get_categories');

Route::get('/categories/{id}/sizes', 'DataAjaxController@get_sizes');



//contact
Route::get('/contact', 'ContactController@index')->name('contact');

Route::post('/contact', 'ContactController@submit_message');


//voyager
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


//errors
Route::fallback('ErrorController@_404_not_found');
