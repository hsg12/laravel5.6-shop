<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/cart',                     'ShoppingController@index')->name('cart');
Route::post('/cart/add',                'ShoppingController@add_to_cart');
Route::delete('/cart/delete/{product}', 'ShoppingController@delete_from_cart')->name('delete.from.cart');

Route::group(['middleware' => ['auth', 'admin', 'web']], function () {
	Route::get('/admin', 'AdminController@index')->name('admin');
	Route::resource('/admin/products',   'Admin\ProductController');
    Route::resource('/admin/categories', 'Admin\CategoryController');
    Route::resource('/admin/users',      'Admin\UserController');
});

Route::get('/{category}', 'CategoryController@index')->name('category');
Route::get('/products/{product}', 'ProductController@show')->name('product');
