<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ValidUser
{
    public function handle(Request $request, Closure $next): Response
    {
        // Login check
        if (!Auth::check()) {
            return redirect()->route('user.login');
        }

        // Access allow
        return $next($request);
    }
}