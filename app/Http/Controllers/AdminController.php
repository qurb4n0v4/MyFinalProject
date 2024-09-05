<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.dashboard.admin');
        }
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        return view('admin.dashboard.admin');
    }

    public function users()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.pages.tables.u-c-c');
        }
        return redirect()->route('admin.login')->withErrors(['auth' => 'You are not authorized to access this page.']);
    }

    public function jobs()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.pages.tables.jobs');
        }
        return redirect()->route('admin.login')->withErrors(['auth' => 'You are not authorized to access this page.']);
    }
    public function categories()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.pages.tables.u-c-c');
        }
        return redirect()->route('admin.login')->withErrors(['auth' => 'You are not authorized to access this page.']);
    }public function companies()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.pages.tables.u-c-c');
        }
        return redirect()->route('admin.login')->withErrors(['auth' => 'You are not authorized to access this page.']);
    }public function applications()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.pages.tables.applications');
        }
        return redirect()->route('admin.login')->withErrors(['auth' => 'You are not authorized to access this page.']);
    }public function blogs()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.pages.tables.blogs');
        }
        return redirect()->route('admin.login')->withErrors(['auth' => 'You are not authorized to access this page.']);
    }
}
