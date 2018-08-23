<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'web']], function () {
	Route::get('/admin', 'AdminController@index')->name('admin');
	Route::resource('/admin/products', 'Admin\ProductController');
	Route::resource('/admin/categories', 'Admin\CategoryController');
});
