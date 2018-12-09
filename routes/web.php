<?php


Route::get('/', 'ProductController@index');

Route::resource('product', 'ProductController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
