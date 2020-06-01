<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class VerifyIsStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if(Auth::user()->checkIsStatus() && Auth::check() && (Auth::user()->checkIsAdmin() >= 0 ) || (Auth::user()->id == 1 )){
            return $next($request);
        }
        return redirect("/login");

    }
}
