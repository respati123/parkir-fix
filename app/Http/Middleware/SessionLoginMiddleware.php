<?php

namespace App\Http\Middleware;

use Closure;

class SessionLoginMiddleware
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
       if($request->session()->get('is_login') == 'login'){

           return $request->session()->get('is_login');

       } else {

           return redirect(route('login'));
       }
        return $next($request);
    }
}
