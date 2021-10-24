<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class Instructor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        /*return $next($request);*/
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role == 'instructor') {
            return $next($request);
        } elseif (Auth::user()->role != 'instructor') {
            abort(401, 'You dont have instructor access!');
        }

        return redirect()->route('login');
    }
}
