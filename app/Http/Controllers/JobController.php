<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::latest()->take(10)->get();
        return view('jobs.index', compact('jobs'));
    }

    public function allJobs()
    {
        $jobs = Job::all();
        return view('jobs.all', compact('jobs'));
    }

    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.show', compact('job'));
    }
}
