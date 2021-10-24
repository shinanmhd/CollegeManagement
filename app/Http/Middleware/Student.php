<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class Student
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
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role == 'student') {
            return $next($request);
        } elseif (Auth::user()->role != 'student') {
            abort(401, 'You dont have student access!');
        }

        /*return (Auth::user()->role == 'student') ?  $next($request) : abort(401);*/

        return redirect()->route('login');
    }
}
