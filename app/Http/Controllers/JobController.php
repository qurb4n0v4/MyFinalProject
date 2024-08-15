<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::with('category')->where('is_active', true)->get();
        return view('home', compact('jobs'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $jobs = Job::findOrFail($id);
        return view('jobs.show', ['job' => $jobs]);
    }

    public function list()
    {
        $jobs = Job::all();
        return view('jobs.list', ['jobs' => $jobs]);
    }
}
