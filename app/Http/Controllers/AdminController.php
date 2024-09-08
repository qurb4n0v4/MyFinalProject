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

    public function profile() {
        return view('admin.pages.profile.profile');
    }

    public function showUpdateProfile()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.pages.profile.editProfile', compact('admin'));
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admins,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|string|in:male,female,other',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $admin = Admin::findOrFail($id);

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->gender = $request->gender;

        if ($request->hasFile('profile_picture')) {
            if ($admin->profile_picture && Storage::exists('adminUploads/' . $admin->profile_picture)) {
                Storage::delete('adminUploads/' . $admin->profile_picture);
            }

            $fileName = time() . '_' . $request->file('profile_picture')->getClientOriginalName();
            $request->file('profile_picture')->storeAs('adminUploads', $fileName, 'public');
            $admin->profile_picture = $fileName;
        }

        $admin->save();

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
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
