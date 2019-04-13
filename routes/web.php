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

// Rotas de sistema de autentificação (verificar email ativado)
Auth::routes(['verify' => true]);

// Rotas que não precisam de login..

// Landing Page
Route::get('/', 'ProductController@index')->name('index');

// Rota para envio de email
Route::get('/mail/send', function () {
    try{
        Mail::send('mails.index', ['receiver' => Auth::user()->name], function ($m) {
            $m->from('doomus.atendimento@gmail.com');
            $m->subject('Testando API Laravel');
            $m->to('gabrieloliveira9669@gmail.com');
        });
    }catch(Exception $e){
        echo $e;
    }
});

// Paginação de produtos
Route::get('/{id}', 'ProductController@pagination');

// Para ver um produto
Route::get('product/{id}', 'ProductController@viewProducts');

// Para mostrar apenas os produtos de uma determinada categoria
Route::get('category/{id}', 'ProductController@productOfCategory');

// Rotas que precisam de autentificação
Route::group(['middleware' => ['auth']], function () {

    // Perfil do usuário
    Route::get('/user/profile', function (){
        return view('user.profile')->with('user', Auth::user());
    })->name('user.profile');

    // Histórico de compras
    Route::get('/user/historic', function () {
        return view('user.profile')->with('historic', Historic::find(Auth::user()->id_historic));
    });

    // Pedidos pendentes
    Route::get('/user/orders', function () {
        return view('user.profile')->with('orders', Order::where('id_user', Auth::user()->id));
    });

    // Carrinho
    Route::get('/user/cart', function () {
        return view('user.profile')->with('cart', Cart_Products::where('id_user', Auth::user()->id));
    });
});

// Rotas do administrador
Route::group(['middleware' => ['auth', 'admin.user']], function (){
    // Resources são estruturas de rotas prontas que se comunicam
    // com os métodos do controller (criar, editar, ..)
    Route::resource('product', 'ProductController');
    Route::resource('category', 'CategoryController');
    Route::resource('historic', 'HistoricController');
    Route::resource('order', 'OrderController');
    Route::resource('cart', 'CartController');
    Route::resource('cart_product', 'CartProductController');
});