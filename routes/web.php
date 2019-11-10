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
Route::group(['middleware' => ['https']], function () {
    /*
    *   Cart routes
    */
    Route::get('/carrinho/{product_id}/add/', 'CartController@addToCart');
    Route::get('/carrinho/add/', 'CartController@addToCart')->name('cart.add');
    Route::get('/carrinho/delete', 'CartController@clearCart')->name('cart.clear');
    Route::get('/carrinho', 'CartController@show')->name('user.cart');
    Route::get('/carrinho/{product_id}/remove', 'CartController@removeFromCart');
    Route::get('/carrinho/{product_rowId}/{qty}/{product_id}', 'CartController@changeQuantity');

    Route::get('/docs', function () {
        return view('docs');
    });

    /* 
    *   Autentificação - Login - Rede Social
    */
    Auth::routes();
    Route::get('/auth/{provider}', 'Auth\LoginController@redirectToProvider')->name('login-social');
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


    Route::get('/explore', 'OfertasController@viewExplore');
    Route::get('/ofertas', 'OfertasController@view')->name('offers');
    Route::get('/customize/quarto', 'OfertasController@viewCustomize');

    /*
    *   Checar CEP
    */
    Route::get('/checkout/address/cep', 'CheckoutController@checkCep')->name('checkCep');

    Route::get('/cupom/validate', 'AdminController@cupomValidate');

    /*
    *   Calcular CEP
    */
    Route::post('/calc/frete', 'CheckoutController@calcFrete')->name('calcFrete');

    Route::post('/buy/now', 'ProductController@buyNow')->name('comprarAgora');

    Route::group(['middleware' => ['auth']], function (){
        /*
        *   User views
        */
        Route::get('/perfil', 'UserController@showProfile')->name('perfil');
        Route::post('/perfil/update', 'UserController@updateProfile');
        Route::get('/pedidos', 'OrderController@show')->name('orders');
        Route::post('/avaliar', 'UserController@avaliate')->name('avaliate');

        Route::post('/excluir/conta', 'UserController@deletarConta')->name('deletarConta');

        Route::get('/delete/address', 'UserController@deleteAddressSave')->name('deleteAddressSave');

        Route::get('/get/saved/address', 'UserController@getAddressSaved');

        /*
        *   Limpar histórico
        */
        Route::get('/historico/{id}/clean', 'HistoricController@destroy');

        /*
        *   Checkout
        */
        Route::group(['middleware' => ['Checkout']], function (){
            Route::get('/checkout/endereco', 'CheckoutController@adressCheckout')->name('address-check');
            Route::post('/checkout/address/data', 'CheckoutController@addressData')->name('address-data');
            Route::group(['middleware' => ['CheckoutPayment']], function (){
                Route::get('/checkout/pagamento', 'CheckoutController@paymentCheckout')->name('payment-check');
                Route::post('/checkout/payment/data', 'CheckoutController@paymentData');
                Route::get('/paypal/transaction/complete', 'CheckoutController@paymentSuccess');

                /*
                *   PayPal
                */
                Route::post('/create-payment', 'PaymentController@create')->name('create-payment');
                Route::get('/execute-payment', 'PaymentController@execute');
                Route::get('/cancel-payment', 'PaymentController@cancel');
            });
        });

        /*
        *   Order
        */
        Route::get('/pedido/cancel', 'OrderController@cancel');
        Route::get('/pedido/rastrear', 'OrderController@track');
        Route::get('/pedido/produtos', 'OrderController@showOrderProducts')->name('showOrderProducts');

        /*
        *   Suporte
        */
        Route::post('/contato/armazenar','SupportController@store')->name('suporte-armazenar');
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
        Route::get('/product/{product_id}/desconto', 'AdminController@ofertaProdutoView');
        Route::post('/product/desconto', 'AdminController@ofertaProduto');
        
        Route::get('/category/desconto', 'AdminController@ofertaCategoriaView');
        Route::post('/category/desconto/aplicar', 'AdminController@ofertaCategoria');
        
        Route::get('/cupom', 'AdminController@cupomView')->name('admin.cupons');
        Route::get('/cupom/{id}/create', 'AdminController@cupomView');
        Route::get('/cupom/{id}/destroy', 'AdminController@cupomView');

        /*
        *   Pedidos 
        */
        Route::get('/orders', 'AdminController@orders')->name('admin.orders');
        Route::get('/order/{id}/cancel', 'OrderController@cancel')->name('admin.order.cancel');
        Route::get('/order/{id}/entregue', 'OrderController@pedidoEntregue')->name('admin.order.entregue');
        Route::get('/order/{id}/despachado', 'OrderController@pedidoDespachado')->name('admin.order.despachado');
        Route::get('/order/{id}/aprovado', 'OrderController@pedidoAprovado')->name('admin.order.despachado');

        /*
        *   Suporte
        */
        Route::get('/suporte/{support_id}', 'SupportController@show')->name('admin.support');
        Route::post('/suporte/responder/data', 'SupportController@responderMsg')->name('supportResponderMsg');
    });



    Route::get('/test-components', function(){
        return view('test_components');
    });
});
