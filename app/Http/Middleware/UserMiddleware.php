<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('web')->check()) {
            if ($request->is('auth/login') || $request->is('auth/register')) {
                return redirect()->route('user.dashboard');
            }
            return $next($request);
        }
        return redirect()->route('login')->withErrors(['auth' => 'You are not authorized to access this page.']);
    }
}
