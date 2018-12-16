<?php

use App\Product;
use Illuminate\Support\Facades\Input;

Route::get('/', 'ProductController@index');

// Route::get('search', 'SearchController@index')->name('search');
// Route::get('autocomplete', 'SearchController@autocomplete')->name('autocomplete');
Route::any('/search', function () {
    $query = Input::get('query');
    $item = Product::where('productName', 'LIKE', '%'.$query.'%')->get();
    if(count($item) > 0)
        return view('search')->withDetails($item)->withQuery($query);
    else
        return view('search')->withMessage('Product tidak ditemukan!');
});

Route::resource('product', 'ProductController');
Route::resource('category', 'CategoryController');
Route::resource('cart', 'CartController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
