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

Route::get('/', 'IndexController@index')->name('landing');

Route::get('/find', 'ProductController@find');

Route::get('/produto/{id}', 'ProductController@showProduct');

Route::group(['middleware' => ['auth']], function (){
    /*
     * Views
     * */
    Route::get('/perfil', 'UserController@showProfile')->name('perfil');
    Route::post('/perfil/update', 'UserController@profileUpdate');
    Route::get('/pedidos', 'UserController@showOrders');
    Route::get('/historico', 'UserController@showHistoric');

    /*
     * Check information to make a order
     * */
    Route::get('/checkout', 'OrderController@checkView');
    Route::post('/checkout/post', 'OrderController@checkoutData');

    Route::get('/obrigado', 'OrderController@showThanksView');

    /*
     * Order create
     * */
    Route::post('/pedido', 'OrderController@create');
    Route::get('/pedido/cancel', 'OrderController@cancel');
    Route::get('/pedido/rastrear', 'OrderController@track');

    /*
     * Support page
     * */
    Route::get('/suporte', 'SuporteController@index')->name('suporte');
});

/*
 * Cart routes
 * */
Route::get('/carrinho/{product_id}/add', 'UserController@addToCart');
Route::get('/carrinho/delete', 'UserController@clearCart')->name('cart.clear');

Route::get('/carrinho', 'UserController@showCart')->name('user.cart');

/*
 * Admin routes
 * */
Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function (){
    Route::resource('produto', 'ProductController');
    Route::resource('categoria', 'CategoryController');
});

/*
* Social login routes
**/
Route::get('/auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('/auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');