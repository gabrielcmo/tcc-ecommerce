<?php

namespace Doomus\Http\Middleware;

use Closure;
use Session;

class CheckoutPayment
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
        if(session('userData') == null){
            Session::flash('status', 'Antes de realizar o pagamento é necessário informar seus dados de entrega');
            Session::flash('status-type', 'danger');

            return redirect('/checkout/endereco');
        }

        return $next($request);
    }
}
