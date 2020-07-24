<?php

namespace App\Http\Middleware;

use Closure;

class isUserMiddleware
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
        if(auth()->check()){
            if(auth()->user()->is_admin){
               return redirect(route('admin'));
            }
        }
      
        return $next($request);
    }
}
