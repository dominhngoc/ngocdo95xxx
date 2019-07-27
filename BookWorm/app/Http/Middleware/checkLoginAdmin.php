<?php

namespace App\Http\Middleware;

use Closure;

class checkLoginAdmin
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
        if(session()->has('logined')){
//            return 'yes';
            return $next($request);

        }
        else{
            return redirect()->route('getLogin');
        }
    }
}
