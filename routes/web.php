<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'admin', 'web']], function () {
	Route::get('/admin', 'AdminController@index')->name('admin');
	Route::resource('/admin/products',   'Admin\ProductController');
    Route::resource('/admin/categories', 'Admin\CategoryController');
	Route::resource('/admin/users',      'Admin\UserController');
});

Route::get('/{category}', 'CategoryController@index')->name('category');
Route::get('/products/{product}', 'ProductController@show')->name('product');
