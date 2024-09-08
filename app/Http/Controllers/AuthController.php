<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Company;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('user.dashboard');
        }elseif (Auth::guard('company')->check()) {
            return redirect()->route('company.dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|in:user,company',
        ]);

        $guard = $request->role === 'user' ? 'web' : 'company';

        if (Auth::guard($guard)->attempt($request->only('email', 'password'))) {
            return redirect()->intended($guard === 'web' ? route('user.dashboard') : route('company.dashboard'));
        }

        return back()->withErrors(['email' => 'Invalid credentials.'])->withInput($request->except('password'));
    }

    public function showRegisterForm()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('user.dashboard');
        }elseif (Auth::guard('company')->check()) {
            return redirect()->route('company.dashboard');
        }
        return view('auth.register');
    }

    protected function validator(array $data)
    {
        $rules = [
            'role' => 'required|string|in:user,company',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email|unique:companies,email',
            'password' => 'required|string|min:8|confirmed',
        ];

        if ($data['role'] === 'user') {
            $rules = array_merge($rules, [
                'profile_photo' => 'nullable|image|max:2048',
                'resume' => 'nullable|mimes:pdf,doc,docx|max:2048',
                'gender' => 'nullable|string|in:male,female,other',
                'date_of_birth' => 'nullable|date',
                'address' => 'nullable|string|max:255',
                'bio' => 'nullable|string',
            ]);
        }

        if ($data['role'] === 'company') {
            $rules = array_merge($rules, [
                'website' => 'nullable|string|max:255',
                'address' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'logo' => 'nullable|image|max:2048',
                'phone' => 'nullable|string|max:20',
                'industry' => 'nullable|string|max:255',
            ]);
        }

        return Validator::make($data, $rules);
    }

    protected function create(array $data)
    {
        if ($data['role'] === 'user') {
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'profile_photo' => $data['profile_photo'] ?? null,
                'resume' => $data['resume'] ?? null,
                'gender' => $data['gender'] ?? null,
                'date_of_birth' => $data['date_of_birth'] ?? null,
                'address' => $data['address'] ?? null,
                'bio' => $data['bio'] ?? null,
                'role' => 'user',
            ]);
        } elseif ($data['role'] === 'company') {
            return Company::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'website' => $data['website'] ?? null,
                'address' => $data['address'] ?? null,
                'description' => $data['description'] ?? null,
                'logo' => $data['logo'] ?? null,
                'phone' => $data['phone'] ?? null,
                'industry' => $data['industry'] ?? null,
                'status' => $data['status'] ?? 'inactive',
            ]);
        }
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        auth()->login($user);

        return view('auth.login');
    }

    public function logout()
    {
        $guard = Auth::guard('web')->check() ? 'web' : 'company';
        Auth::guard($guard)->logout();
        return redirect()->route('home');
    }
}
