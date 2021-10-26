<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Provider
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        abort_if(auth()->user()->is_admin, 403, "You aren't allowed");
        return $next($request);
    }
}
