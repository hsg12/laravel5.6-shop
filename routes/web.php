<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/search',                   'SearchController@index')->name('search');
Route::post('/search/result',           'SearchController@result')->name('search.result');
Route::get('/cart',                     'ShoppingController@index')->name('cart');
Route::post('/cart/add',                'ShoppingController@add_to_cart');
Route::post('/cart/checkout',           'ShoppingController@checkout')->name('cart.checkout');
Route::post('/cart/update',             'ShoppingController@update');
Route::delete('/cart/delete/{product}', 'ShoppingController@delete_from_cart')->name('delete.from.cart');
Route::get('/orders',                   'OrderController@index')->name('show.orders');

Route::group(['middleware' => ['auth', 'admin', 'web']], function () {
	Route::get('/admin', 'AdminController@index')->name('admin');
	Route::resource('/admin/products',   'Admin\ProductController');
    Route::resource('/admin/categories', 'Admin\CategoryController');
    Route::resource('/admin/users',      'Admin\UserController');
    Route::resource('/admin/orders',     'Admin\OrderController');
    Route::get('/admin/history',         'Admin\OrderController@history')->name('orders.history');
    Route::delete('/admin/delete/{id}',  'Admin\OrderController@delete_permanently')->name('orders.delete.permanently');
});

Route::get('/{category}', 'CategoryController@index')->name('category');
Route::get('/products/{product}', 'ProductController@show')->name('product');
