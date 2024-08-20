<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->take(10)->get();
        return view('blog.index', compact('blogs'));
    }

    public function allBlogs()
    {
        $blogs = Blog::all();
        return view('blogs.all', compact('blogs'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'slug' => 'required|string|max:255|unique:blogs',
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'nullable|image|max:2048',
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->slug = $request->slug;
        $blog->category_id = $request->category_id;
        $blog->author_id = Auth::id();

        if($request->hasFile('featured_image')){
            $blog->featured_image = $request->file('featured_image')->store('featured_images', 'public');
        }

        $blog->save();
        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.show', compact('blog'));
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        if($blog->author_id != Auth::id()){
            return redirect()->route('blogs.index')->with('error', 'You do not have permission to edit this blog.');
        }
        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        if($blog->author_id !== Auth::id()) {
            return redirect()->route('blogs.index')->with('error', 'You do not have permission to update this blog.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'slug' => 'required|string|max:255|unique:blogs,slug,' . $blog->id,
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'nullable|image|max:2048',
        ]);

        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->slug = $request->slug;
        $blog->category_id = $request->category_id;

        if($request->hasFile('featured_image')) {
            if($blog->featured_image) {
                Storage::disk('public')->delete($blog->featured_image);
            }
            $blog->featured_image = $request->file('featured_image')->store('featured_images', 'public');
        }

        $blog->save();
        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        if($blog->author_id !== Auth::id()) {
            return redirect()->route('blogs.index')->with('error', 'You do not have permission to delete this blog.');
        }

        if($blog->featured_image) {
            Storage::disk('public')->delete($blog->featured_image);
        }

        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
