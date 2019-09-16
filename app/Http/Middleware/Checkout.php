<?php

namespace Doomus\Http\Middleware;

use Closure;
use Gloudemans\Shoppingcart\Facades\Cart;
use Session;

class Checkout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Cart::count() == 0){
            Session::flash('status', 'Para fazer um pedido você precisa adicionar produtos no carrinho');
            Session::flash('status-type', 'danger');

            return redirect('/');
        }

        return $next($request);
    }
}
