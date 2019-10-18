<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CustomAuth
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
       // dd('iyytt');

        if(!empty(Auth::user() && (Auth::user()->userType == '1') || (Auth::user()->userType == '2'))){
            return $next($request);

          //  return redirect('/');
        }
        else{
            return redirect('/');
           // return $next($request);
        }
    }
}
