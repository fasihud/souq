<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/','ProductsController@index');
Route::get('/cart', 'ProductsController@cart')->name('cart');
Route::get('/add_to_cart/{id}', 'ProductsController@add_to_cart')->name('add_to_cart');
Route::put('/update_cart/{id}', 'ProductsController@update_cart')->name('update_cart');
Route::delete('/delete_item/{id}', 'ProductsController@delete_item')->name('delete_item');
Route::get('/categorical_item', 'ProductsController@categorical_item')->name('categorical_item');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('Products', 'ProductsController');
