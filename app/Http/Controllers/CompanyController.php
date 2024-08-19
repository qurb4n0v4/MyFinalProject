<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Application;
use App\Models\Category;
use App\Models\Job;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('company')->only([
            'dashboard', 'createJob', 'storeJob', 'editJob', 'updateJob', 'destroyJob', 'applications'
        ]);
    }

    public function dashboard()
    {
        // Şirketin dashboard'unu yöneten işlemler
        return view('companies.dashboard');
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
        $job->company_id = Auth::user()->company_id; // Şirket ID'sini güncel kullanıcının şirket ID'si ile ayarla
        $job->save();

        return redirect()->route('company.jobs.index')->with('success', 'İş ilanı başarıyla eklendi.');
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
            return redirect()->route('company.jobs.index')->with('error', 'Bu iş ilanını düzenleme yetkiniz yok.');
        }

        $categories = Category::all();
        return view('jobs.edit', compact('job', 'categories'));
    }

    public function updateJob(Request $request, $id)
    {
        $job = Job::findOrFail($id);

        if ($job->company_id != Auth::user()->company_id) {
            return redirect()->route('company.jobs.index')->with('error', 'Bu iş ilanını güncelleme yetkiniz yok.');
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

        return redirect()->route('company.jobs.index')->with('success', 'İş ilanı başarıyla güncellendi.');
    }

    public function destroyJob($id)
    {
        $job = Job::findOrFail($id);

        if ($job->company_id != Auth::user()->company_id) {
            return redirect()->route('company.jobs.index')->with('error', 'Bu iş ilanını silme yetkiniz yok.');
        }

        $job->delete();

        return redirect()->route('company.jobs.index')->with('success', 'İş ilanı başarıyla silindi.');
    }
}
