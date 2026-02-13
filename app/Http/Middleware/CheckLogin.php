<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Cookie;

use Closure;

class CheckLogin
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
        if (!session('login')) {
            if(Cookie::get('remember_login')){
                session(['login' => true]);
            } else {
                return redirect('/login');
            }
        }
        return $next($request);
    }

}