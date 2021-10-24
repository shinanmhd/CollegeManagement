<?php

namespace App\Http\Responses;
use App\Providers\RouteServiceProvider;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request)
    {
        /*$home = (auth()->user()->role == 'admin') ? RouteServiceProvider::ADMIN_URL : RouteServiceProvider::HOME;*/
        $home = RouteServiceProvider::HOME;
        if (auth()->user()->role == 'admin')
            $home = RouteServiceProvider::ADMIN_URL;
        else if (auth()->user()->role == 'instructor')
            $home = RouteServiceProvider::INSTRUCTOR_URL;
        else if (auth()->user()->role == 'student')
            $home = RouteServiceProvider::STUDENT_URL;

        return redirect()->intended($home);
    }
}
