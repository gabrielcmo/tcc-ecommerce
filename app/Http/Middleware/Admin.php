<?php

namespace Doomus\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Admin
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
        $user = Auth::user();

        if(empty($user) || $user['role_id'] !== 1)
        {
            Session::flash('status', 'Acesso negado');
            return redirect('/');
        }

        return $next($request);
    }
}
