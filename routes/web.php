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

Auth::routes();

Route::get('/', [
    'uses' => 'ProdutosController@index',
    'as' => 'index'
]);

Route::group(['prefix' => 'user'], function(){
    Route::get('profile', function(){
        return view('user.profile');
    })->name('profile');

    Route::get('cart', function(){
        return view('user.cart');
    })->name('cart');
});