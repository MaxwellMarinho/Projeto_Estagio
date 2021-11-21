<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
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
        if(!Auth::check()){
            return redirect('login');
        }

        if(Auth::user()->role == "administrador"){
            return redirect('user_admin_home');
        }

        if(Auth::user()->role == "tecnico"){
            return redirect('user_tech');
        }

        if(Auth::user()->role == "usuario"){
            return redirect('user_user');
        }
        return $next($request);
    }
}
