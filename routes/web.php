<?php

use Doomus\User;
use Doomus\Historic;
use Doomus\Order;
use Doomus\CartProduct;

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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'IndexController@index');

Route::group(['prefix' => 'user', 'middleware' => ['auth']], function (){
    Route::get('/perfil', 'UserController@show');
    Route::get('/pedidos', 'UserController@showOrders');
    Route::get('/historico', 'UserController@showHistoric');
    Route::get('/carrinho', 'UserController@showCart');
});

/*
 * Prefixo para rotas do administrador
 * */
Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function (){
    Route::resource('produto', 'ProductController');
    Route::resource('categoria', 'CategoryController');
});
