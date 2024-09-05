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
            'dashboard', 'createJob', 'storeJob', 'editJob', 'updateJob', 'destroyJob', 'applications'
        ]);
    }

    public function showLoginForm()
    {
        if (Auth::guard('company')->check()) {
            return view('company.dashboard');
        }
        return view('auth.login-company');
    }

    public function showRegisterForm()
    {
        if (Auth::guard('company')->check()) {
            return view('company.dashboard');
        }
        return view('auth.register-company');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('company')->attempt($credentials)) {
            return redirect()->route('company.dashboard');
        }

        return back()->withErrors(['email' => 'Wrong email or password.']);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:companies',
            'password' => 'required|string|min:6|confirmed',
        ]);

        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('company.login')->with('success', 'You have successfully registered your company! Please login');
    }

    public function logout()
    {
        Auth::guard('company')->logout();
        return redirect()->route('company.login');
    }

    public function dashboard()
    {
        return view('admin.dashboard.company');
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:companies',
            'email' => 'required|string|email|max:255|unique:companies',
            'website' => 'nullable|url',
            'address' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'phone' => 'nullable|string|max:20',
            'status' => 'required|in:active,inactive',
            'industry' => 'nullable|string|max:255',
        ]);

        $company = new Company($request->all());

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('company_logos', 'public');
            $company->logo = $path;
        }

        $company->user_id = Auth::id();
        $company->save();

        return redirect()->route('company.dashboard')->with('success', 'Company created successfully.');
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

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        if ($company->user_id != Auth::id()) {
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
                Storage::delete($company->logo);
            }
            $path = $request->file('logo')->store('company_logos', 'public');
            $company->logo = $path;
        }

        $company->save();

        return redirect()->route('company.dashboard')->with('success', 'Company updated successfully.');
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
