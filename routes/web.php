<?php

use Doomus\Models\User;
use Doomus\Models\Historic;
use Doomus\Models\Order;
use Doomus\Models\Cart_Products;

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

// Rotas do sist. de autentificação
Auth::routes();

// Rotas que não precisam de login
Route::get('/', 'IndexController@view')->name('index');

// Rotas que precisam de login
Route::group(['middleware' => ['auth']], function () {
    Route::get('/user/profile', function (){
        return view('user.profile')->with('user', Auth::user());
    })->name('user.profile');
    Route::get('/user/historic', function () {
        return view('user.profile')->with('historic', Historic::find(Auth::user()->id_historic));
    });
    Route::get('/user/orders', function () {
        return view('user.profile')->with('orders', Order::where('id_user', Auth::user()->id));
    });
    Route::get('/user/cart', function () {
        return view('user.profile')->with('cart', Cart_Products::where('id_user', Auth::user()->id));
    });
});

// Rotas do usuário administrador
Route::group(['middleware' => ['auth', 'admin.user']], function (){
    Route::resource('product', 'ProductController');
    Route::resource('category', 'CategoryController');
    Route::resource('historic', 'HistoricController');
    Route::resource('order', 'OrderController');
    Route::resource('cart', 'CartController');
    Route::resource('cart_product', 'CartProductController');
});