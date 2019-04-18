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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'IndexController@index');

Route::resource('produto', 'ProductController');

/*
 * Prefixo para rotas do administrador
 * */
Route::prefix('admin', function () {
    /*
     * Middleware para restringir acesso
     * */
    Route::group(['middleware' => ['admin']], function () {

        Route::resource('produto', 'ProductController');

        Route::resource('categoria', 'CategoryController');
    });
});