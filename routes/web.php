<?php


Route::get('/', 'ProductController@index');

Route::resource('product', 'ProductController');
Route::resource('category', 'CategoryController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
