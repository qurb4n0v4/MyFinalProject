<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PreventLoginAccess
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('admin')->check() && ($request->is('admin/login') || $request->is('admin/register'))) {
            return redirect()->route('admin.dashboard');
        }

        return $next($request);
    }
}
