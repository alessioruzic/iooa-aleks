<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class IsAdmin
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
        //PROVJERA AKO JE USER MEMBER
        if(Auth::check() && Auth::user()->role_id == 3){
            return redirect('/');
        }
        if(Auth::check() && Auth::user()->role_id == 2){
            return redirect('/');
        }

        //PROVJERA AKO JE USER KONTROLOR
        //if(Auth::check() && Auth::user()->role_id == 3){
        //    return redirect('/kontrolor/index');
        //}
        
        //IDI NA  HOME = '/cmsadmin/index'; 
        return $next($request);
     }

}
