<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class isAdminMiddleware
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
        if(User::all()->count() > 0){
            return $next($request);
        } else {
            return redirect('/register/admin');
        }
    }
}
