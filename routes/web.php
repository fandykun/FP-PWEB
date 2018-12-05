<?php


Route::get('/', 'ProductController@index');

Route::resource('product', 'ProductController');
