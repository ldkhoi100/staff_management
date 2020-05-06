<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class LogoutUsers
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
        if (Auth::check() && Auth::user()->block == 1) {
            Auth::logout();
            return redirect()->route('login');
        } else {
            return $next($request);
        }
    }
}