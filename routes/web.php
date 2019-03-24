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

Route::get('/', 'IndexController@view')->name('index');

Route::resource('Product', 'ProductController');
Route::resource('Category', 'CategoryController');
Route::resource('User', 'UserController');
Route::resource('Historic', 'HistoricController');
Route::resource('Order', 'OrderController');
Route::resource('Cart', 'CartController');
Route::resource('Cart_Product', 'CartProductController');