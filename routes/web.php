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

/*
*   Cart routes
*/
Route::get('/carrinho/{product_id}/add/', 'CartController@addToCart');
Route::get('/carrinho/add/', 'CartController@addToCart')->name('cart.add');
Route::get('/carrinho/delete', 'CartController@clearCart')->name('cart.clear');
Route::get('/carrinho', 'CartController@show')->name('user.cart');

/* 
*   Autentificação - Login
*/
Auth::routes();
Route::get('/auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('/auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

/* 
*   Pág. inicial 
*/
Route::get('/', 'IndexController@index')->name('landing');

/* 
*   Barra de pesquisa de produtos
*/
Route::get('/find', 'SearchController@find')->name('search');

/*
*   View produto
*/
Route::get('/produto/{id}', 'ProductController@show');

/*
*   Checar CEP
*/
Route::get('/checkout/address/cep', 'CheckoutController@checkCep')->name('checkCep');

Route::group(['middleware' => ['auth']], function (){
    /*
    *   User views
    */
    Route::get('/perfil', 'UserController@showProfile')->name('perfil');
    Route::post('/perfil/update', 'UserController@updateProfile');
    Route::get('/pedidos', 'OrderController@show')->name('orders');
    Route::get('/historico', 'HistoricController@show')->name('historic');

    /*
    *   Checkout
    */
    Route::get('/checkout/endereco', 'CheckoutController@adressCheckout')->name('adress-check');
    Route::get('/checkout/pagamento', 'CheckoutController@paymentCheckout')->name('payment-check');
    Route::post('/checkout/address/data', 'CheckoutController@addressData');
    Route::post('/checkout/payment/data', 'CheckoutController@paymentData');
    Route::get('/payment/success', 'CheckoutController@paymentSuccess');

    /*
    *   Order
    */
    Route::get('/pedido/cancel', 'OrderController@cancel');
    Route::get('/pedido/rastrear', 'OrderController@track');
});

/*
*   Admin
*/
Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function (){
    /*
    *   Landing page admin 
    */
    Route::get('/', 'AdminController@index')->name('admin.index');
    
    /*
    *   Produtos 
    */
    Route::get('/products', 'AdminController@products')->name('admin.products');
    Route::get('/product/{product_id}/destroy', 'ProductController@destroy');
    Route::get('/product/{product_id}/edit', 'ProductController@formEdit');
    Route::post('/product/edit/data', 'ProductController@update')->name('admin.product.update');
    Route::get('/product/create', 'ProductController@create')->name('admin.createProduct');
    Route::post('/product/create/data', 'ProductController@store')->name('admin.product.store');

    /*
    *   Pedidos 
    */
    Route::get('/orders', 'AdminController@orders')->name('admin.orders');
    Route::post('/order/cancel', 'AdminController@cancel')->name('admin.order.cancel');
});

/* 
*   Testes
*/
Route::get('/test', function(){
    return view('new_landing');
});

Route::get('/test-components', function(){
    return view('test_components');
});