<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Application;
use App\Models\Category;
use App\Models\Job;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Testing\Fluent\Concerns\Has;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('company')->only([
            'dashboard', 'updateProfile', 'createJob', 'storeJob', 'editJob', 'updateJob', 'destroyJob', 'applications'
        ]);
    }

    public function dashboard()
    {
        $company = Auth::guard('company')->user();

        $totalJobs = $company->jobs()->count();
        $totalApplications = Application::where('company_id', $company->id)->count();
        $newApplications = Application::where('company_id', $company->id)->whereDate('created_at', today())->count();
        $recentJobs = $company->jobs()->latest()->limit(5)->get();
        $recentApplications = Application::where('company_id', $company->id)->latest()->limit(5)->get();

        return view('admin.dashboard.company', compact('totalJobs', 'totalApplications', 'newApplications', 'recentJobs', 'recentApplications'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function profile()
    {
        $company = Auth::guard('company')->user();
        return view('admin.pages.profile.profile-company', compact('company'));
    }

    public function showUpdateProfile($id)
    {
        $company = Company::findOrFail($id);

        if ($company->user_id != Auth::id()) {
            return redirect()->route('company.dashboard')->with('error', 'You do not have permission to view this company.');
        }

        return view('admin.pages.profile.edit-profile', compact('company'));
    }

    public function updateProfile(Request $request, $id)
    {
        $company = Auth::guard('company')->user();

        if ($company->id != $id) {
            return redirect()->route('company.dashboard')->with('error', 'You do not have permission to update this company.');
        }

        $request->validate([
            'name' => 'required|string|max:255|unique:companies,name,' . $company->id,
            'email' => 'required|string|email|max:255|unique:companies,email,' . $company->id,
            'website' => 'nullable|url',
            'address' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'phone' => 'nullable|string|max:20',
            'status' => 'required|in:active,inactive',
            'industry' => 'nullable|string|max:255',
        ]);

        $company->fill($request->except('logo'));

        if ($request->hasFile('logo')) {
            if ($company->logo) {
                Storage::delete('public/companyUploads/' . $company->logo);
            }

            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/companyUploads', $filename);
            $company->logo = $filename;
        }

        $company->save();

        return redirect()->route('company.dashboard')->with('success', 'Company updated successfully.');
    }

    public function show($id)
    {
        $company = Company::findOrFail($id);

        if ($company->user_id != Auth::id()) {
            return redirect()->route('company.dashboard')->with('error', 'You do not have permission to access this company.');
        }

        return view('companies.show', compact('company'));
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);

        if ($company->user_id != Auth::id()) {
            return redirect()->route('company.dashboard')->with('error', 'You do not have permission to access this company.');
        }

        return view('companies.edit', compact('company'));
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);

        if ($company->user_id != Auth::id()) {
            return redirect()->route('company.dashboard')->with('error', 'You do not have permission to delete this company.');
        }

        $company->delete();

        return redirect()->route('company.dashboard')->with('success', 'Company deleted successfully.');
    }

    public function applications($companyId)
    {
        $company = Company::findOrFail($companyId);

        if ($company->user_id != Auth::id()) {
            return redirect()->route('company.dashboard')->with('error', 'You do not have permission to view applications for this company.');
        }

        $applications = Application::whereIn('job_id', $company->jobs->pluck('id'))->get();
        return view('companies.applications.index', compact('company', 'applications'));
    }

    public function createJob()
    {
        $categories = Category::all();
        return view('jobs.create', compact('categories'));
    }

    public function storeJob(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'salary' => 'nullable|numeric',
            'job_type' => 'required|in:full-time,part-time,contract,temporary,internship',
            'status' => 'required|in:open,closed',
            'requirements' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'application_deadline' => 'nullable|date',
            'experience_level' => 'nullable|in:junior,mid,senior',
            'remote_possible' => 'required|boolean',
        ]);

        $job = new Job($request->all());
        $job->company_id = Auth::user()->company_id;
        $job->save();

        return redirect()->route('company.jobs.index')->with('success', 'Job added successfully.');
    }

    public function jobs()
    {
        $user = Auth::user();
        $company = $user->company;
        if (!$company) {
            return redirect()->route('home')->with('error', 'Unauthorized access');
        }
        $jobs = $company->jobs;
        return view('companies.jobs.index', compact('jobs'));
    }

    public function editJob($id)
    {
        $job = Job::findOrFail($id);

        if ($job->company_id != Auth::user()->company_id) {
            return redirect()->route('company.jobs.index')->with('error', 'You do not have permission to edit this job.');
        }

        $categories = Category::all();
        return view('jobs.edit', compact('job', 'categories'));
    }

    public function updateJob(Request $request, $id)
    {
        $job = Job::findOrFail($id);

        if ($job->company_id != Auth::user()->company_id) {
            return redirect()->route('company.jobs.index')->with('error', 'You do not have permission to edit this job.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'salary' => 'nullable|numeric',
            'job_type' => 'required|in:full-time,part-time,contract,temporary,internship',
            'status' => 'required|in:open,closed',
            'requirements' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'application_deadline' => 'nullable|date',
            'experience_level' => 'nullable|in:junior,mid,senior',
            'remote_possible' => 'required|boolean',
        ]);

        $job->update($request->all());

        return redirect()->route('company.jobs.index')->with('success', 'Successfully updated job.');
    }

    public function destroyJob($id)
    {
        $job = Job::findOrFail($id);

        if ($job->company_id != Auth::user()->company_id) {
            return redirect()->route('company.jobs.index')->with('error', 'You do not have permission to delete this job.');
        }

        $job->delete();

        return redirect()->route('company.jobs.index')->with('success', 'Successfully deleted job.');
    }
}
