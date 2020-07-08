<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsCampControl
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
        //PROVJERA AKO JE USER KONTROLOR
        if(Auth::check() && Auth::user()->role_id == 1){
            return redirect('/');
        }
        if(Auth::check() && Auth::user()->role_id == 2){
            return redirect('/');
        }
        return $next($request);
     }
}
