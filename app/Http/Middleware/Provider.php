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
        $id = $request->user()->is_admin ;
        if(!$id == 0){
            return redirect()->back()->with("error","You aren't allowed");
        }
        return $next($request);
    }
}
