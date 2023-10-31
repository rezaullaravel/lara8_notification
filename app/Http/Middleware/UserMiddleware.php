<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check())
        {
           if(Auth::user()->role=='0') //1 for admin, 0 for normal user
            {
             return $next($request);

            } else

            {
              return redirect('/admin/dashboard')->with('message','Access denied, as you are not a normal user');
            }
         } else
           {
             return redirect('/login')->with('message','Please login first');
           }
    }
}
