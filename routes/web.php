<?php


Route::get('/', 'ProductController@index');

Route::resource('product', 'ProductController');
Route::resource('category', 'CategoryController');
Route::resource('cart', 'CartController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
