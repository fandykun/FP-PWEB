<?php


// Redirect / to /product by default
Route::get('/', 'ProductController@index');
Route::get('search', 'ProductController@search');

Route::resource('product', 'ProductController');
Route::resource('category', 'CategoryController');
Route::resource('cart', 'CartController');
Route::resource('transaction', 'TransactionController');
// Route::resource('dashboard', 'DashboardController');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::match(['PUT', 'PATCH'], '/dashboard', 
    ['uses'=>'DashboardController@update', 
    'as'=>'dashboard.update']);
Auth::routes();
