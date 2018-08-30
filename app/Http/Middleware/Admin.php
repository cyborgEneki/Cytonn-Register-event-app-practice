<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if (Auth::check() && Auth::user()->isAdmin) {
            return $next($request);
        }
        else {
            if($request->expectsJson()){
                return response()->json("You do not have sufficient privilages to carry out this operatiion",403);
            }
                return response()->redirectTo("login");


        }
    }
}
