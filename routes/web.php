<?php


// Redirect / to /product by default
Route::get('/', 'ProductController@index');
Route::get('search', 'ProductController@search');

// Route::get('/product/id', 'ProductController@showSearch');
Route::resource('product', 'ProductController');
Route::resource('category', 'CategoryController');
Route::resource('cart', 'CartController');
Route::resource('transaction', 'TransactionController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
