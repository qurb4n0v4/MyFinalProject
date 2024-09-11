<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->take(6)->get();

        $jobs = Job::orderBy('created_at', 'desc')->take(9)->get();

        $blogs = Blog::orderBy('created_at', 'desc')->take(3)->get();

        return view('home', compact('categories', 'jobs', 'blogs'));
    }
}
