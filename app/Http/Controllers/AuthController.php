<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Company;

class AuthController extends Controller
{
    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'gender' => 'nullable|in:male,female,other',
            'date_of_birth' => 'nullable|date',
        ]);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $password = Hash::make($request->password);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'role' => 'user',
            'profile_photo' => $request->profile_photo ? $request->file('profile_photo')->store('profile_photos') : null,
            'resume' => $request->resume ? $request->file('resume')->store('resumes') : null,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
        ]);
        return redirect()->route('user.login')->with('success', 'Registration Successful. Please check your email to activate your account.');
    }

    public function registerCompany(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:companies',
            'email' => 'required|string|email|max:255|unique:companies',
            'password' => 'required|string|min:8|confirmed',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'website' => 'nullable|url',
            'address' => 'nullable|string',
            'description' => 'nullable|string',
            'phone' => 'nullable|string',
            'industry' => 'nullable|string',
            'status' => 'nullable|in:active,inactive',
        ]);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $password = Hash::make($request->password);

        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'logo' => $request->logo ? $request->file('logo')->store('logos') : null,
            'website' => $request->website,
            'address' => $request->address,
            'description' => $request->description,
            'phone' => $request->phone,
            'industry' => $request->industry,
            'status' => $request->status ?? 'active',
        ]);
        return redirect()->route('company.login')->with('success', 'Registration Successful. Please check your email to activate your account.');
    }

    public function loginUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }
        if(auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('user.dashboard')->with('success', 'Login Successful.');
        }
        return Redirect::back()->withErrors(['email' => 'Email or password is not correct.'])->withInput();
    }

    public function loginCompany(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }
        if(auth()->guard('company')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('company.dashboard')->with('success', 'Login Successful.');
        }
        return Redirect::back()->withErrors(['email' => 'Email or password is not correct.'])->withInput();
    }

    public function logoutUser(Request $request)
    {
        auth()->logout();
        return redirect()->route('home')->with('success', 'Logout Successful.');
    }

    public function logoutCompany(Request $request)
    {
        auth()->logout();
        return redirect()->route('home')->with('success', 'Logout Successful.');
    }
}
