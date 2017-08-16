<?php

namespace App\Http\Middleware;

use Closure;

class ValidateGoogleAuthentication
{

    public function handle($request, Closure $next)
    {
        if ($request->session()->has('google-user')) {
            $gUser = session('google-user');
            if($gUser->isValid)
                return $next($request);
        }

        return redirect('/login');
        
    }
}
