<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();
        if ($user->hasAnyRole($roles)) {
            return $next($request);
        }

        if ($user->hasRole('admin')) {
        
             abort(403, 'USER DOES NOT HAVE RIGHT ROLE');
        } elseif ($user->hasRole('staff')) {
          
             abort(403, 'USER DOES NOT HAVE RIGHT ROLE');
        
        } elseif ($user->hasRole('rt')) {
          
             abort(403, 'USER DOES NOT HAVE RIGHT ROLE');
        }

        return redirect('/login');
    }
}
