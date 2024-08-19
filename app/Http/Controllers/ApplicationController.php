<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user();
        $applications = $user->applications()->with('job')->get();
        return view('applications.index', compact('applications'));
    }

    public function show(string $id)
    {
        $application = Application::findOrFail($id);
        if($application->user_id !== Auth::id()) {
            return redirect()->route('applications.index')->with('error', 'You do not have permission to view this application.');
        }
        return view('applications.show', compact('application'));
    }

    public function destroy($id)
    {
        $application = Application::findOrFail($id);
        if($application->user_id !== Auth::id()) {
            return redirect('applications.index')->with('error', 'You do not have permission to view this application.');
        }
        $application->delete();
        return redirect()->route('applications.index')->with('success', 'Application deleted successfully.');
    }
}
