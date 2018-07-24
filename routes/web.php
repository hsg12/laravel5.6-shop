<?php

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::group(['middleware' => ['auth', 'web']], function () {
	Route::get('/admin', 'AdminController@index')->name('admin');
	Route::resource('/admin/products', 'Admin\ProductController');
	Route::resource('/admin/categories', 'Admin\CategoryController');
});

Route::get('/home', 'HomeController@index')->name('home');
