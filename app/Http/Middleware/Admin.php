<?php

namespace Doomus\Http\Middleware;

use Closure;
use Auth;

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
        if(Auth::user()->role_id !== 1)
        {
            Session::flash('message', 'Access denied');
            return back();
        }

        return $next($request);
    }
}
