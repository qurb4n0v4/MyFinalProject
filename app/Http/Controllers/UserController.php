<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
     public function __construct()
    {
        $this->middleware('user')->except(['showLoginForm', 'showRegisterForm', 'login', 'register']);
    }

    public function dashboard()
    {
        $user = Auth::user();
        return view('user.dashboard', compact('user'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        if ($user->id !== Auth::id()) {
            return redirect()->route('user.profile')->with('error', 'You cannot view that profile.');
        }
        return view('user.profile', compact('user'));
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('user.editProfile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:500',
            'resume' => 'nullable|string|max:255',
        ]);

        $user->update($request->only(['name', 'email', 'phone', 'gender', 'address', 'bio', 'resume']));
        return redirect()->route('user.dashboard')->with('success', 'Profile updated successfully.');
    }

    public function updatePicture(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/userUploads', $filename);  // Bu satır doğru
            $user->profile_photo = $filename; // Yalnızca dosya adını kaydedin
            $user->save();
        }

        return redirect()->back()->with('success', 'Profile photo updated successfully');
    }

    public function applications()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in to view your applications.');
        }
        $applications = $user->applications()->with('job')->get();
        return view('user.applications.index', compact('applications'));
    }

    public function applicationShow($id)
    {
        $application = Application::findOrFail($id);

        if ($application->user_id != Auth::id()) {
            return redirect()->route('user.applications.index')->with('error', 'You do not have permission to view this application');
        }

        return view('user.application.show', compact('application'));
    }

    public function applicationDestroy($id)
    {
        $application = Application::findOrFail($id);

        if ($application->user_id != Auth::id()) {
            return redirect()->route('user.applications.index')->with('error', 'You do not have permission to delete this application');
        }

        $application->delete();

        return redirect()->route('user.applications.index')->with('success', 'Application deleted successfully');
    }

    public function jobs()
    {
        $user = Auth::user();
        $jobs = $user->applications()->with('job')->get()->pluck('job');
        return view('user.jobs.index', compact('jobs'));
    }

    public function applyJob(Request $request, $job_id)
    {
        $user = Auth::user();

        $existingApplication = $user->applications()->where('job_id', $job_id)->exists();

        if ($existingApplication) {
            return redirect()->route('user.applications.index')->with('error', 'You have already applied for this job.');
        }

        $request->validate([
            'cover_letter' => 'nullable|string|max:555',
        ]);

        $user->applications()->create([
            'job_id' => $job_id,
            'cover_letter' => $request->cover_letter,
        ]);

        return redirect()->route('user.applications.index')->with('success', 'Application added successfully.');
    }
}
