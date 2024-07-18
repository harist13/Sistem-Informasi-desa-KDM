<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasyarakatAuthenticate
{
    public function handle($request, Closure $next, $guard = 'masyarakat')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect()->route('loginMasyarakat');
        }

        return $next($request);
    }
}
