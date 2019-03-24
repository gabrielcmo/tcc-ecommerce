<?php

namespace Doomus\Http\Middleware;

use Closure;
use Auth;

class AdminUser
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
        if(Auth::user()->type_user !== 1)
        {
            return redirect('/')->withErrors(['message' => 'Acesso negado']);
        }

        return $next($request);
    }
}
