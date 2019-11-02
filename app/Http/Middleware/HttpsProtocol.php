<?php

namespace Doomus\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class HttpsProtocol
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
        if (!$request->secure() && App::environment() === 'local') {
            $newRequestUri = str_replace('/public', '', $request->getRequestUri());
            return redirect()->secure($newRequestUri);
            
        }
        return $next($request);
    }
}
