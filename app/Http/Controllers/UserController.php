<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        return view('users.dashboard', compact('user'));
    }
    public function profile()
    {
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.profile', compact('user'));
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('users.editProfile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $request->validate([
           'name' => 'required|string|max:255',
           'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
           'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);
        $user->update($request->all());
        return redirect()->route('users.profile')->with('success', 'Profile updated successfully');
    }
    public function updatePicture(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if($request->hasFile('profile_picture')){
            if($user->profile_picture) {
                Storage::delete($user->profile_picture);
            }
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->update(['profile_picture' => $path]);
        }
        return redirect()->route('users.profile')->with('success', 'Profile picture updated successfully');
    }
    public function applications()
    {
        $user = Auth::user();
        $applications = $user->applications;
        return view('users.applications.index', compact('applications'));
    }
    public function applicationShow($id)
    {
        $application = Application::findOrFail($id);
        return view('users.applications.show', compact('application'));
    }
    public function applicationDestroy($id)
    {
        $application = Application::findOrFail($id);
        $application->delete();
        return redirect()->route('users.applications.index')->with('success', 'Application deleted successfully');
    }
    public function jobs()
    {
        $jobs = Job::all();
        return view('users.jobs.index', compact('jobs'));
    }
    public function jobShow($id)
    {
        $job = Job::findOrFail($id);
        return view('users.jobs.show', compact('job'));
    }
    public function applyJob(Request $request, $job_id)
    {
        $user = Auth::user();
        $request->validate([
            'cover_letter' => 'nullable|string|max:555',
        ]);
        $application = $user->applications()->create([
            'job_id' => $job_id,
            'cover_letter' => $request->cover_letter,
        ]);
        return redirect()->route('users.applications.index')->with('success', 'Application added successfully.');
    }
}
