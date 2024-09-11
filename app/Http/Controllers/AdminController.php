<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Job;
use App\Models\Blog;
use App\Models\Application;
use App\Models\Company;
use App\Models\Message;
use App\Models\Category;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.dashboard.admin');
        }
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        $totalUsers = User::count();
        $activeUsers = User::where('is_active', 1)->count();
        $totalCompanies = Company::count();
        $verifiedCompanies = Company::where('status', 'verified')->count();
        $totalJobs = Job::count();
        $activeJobs = Job::where('status', 'active')->count();
        $totalApplications = Application::count();
        $pendingApplications = Application::where('status', 'pending')->count();
        $totalBlogs = Blog::count();
        $recentApplications = Application::latest()->limit(5)->get();
        $recentMessages = Message::latest()->limit(5)->get();

        return view('admin.dashboard.admin', compact(
            'totalUsers', 'activeUsers', 'totalCompanies', 'verifiedCompanies',
            'totalJobs', 'activeJobs', 'totalApplications', 'pendingApplications',
            'totalBlogs', 'recentApplications', 'recentMessages'
        ));
    }

    public function profile()
    {
        return view('admin.pages.profile.profile');
    }

    public function showUpdateProfile()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.pages.profile.editProfile', compact('admin'));
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admins,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|string|in:male,female,other',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $admin = Admin::findOrFail($id);

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->gender = $request->gender;

        if ($request->hasFile('profile_picture')) {
            if ($admin->profile_picture && Storage::exists('adminUploads/' . $admin->profile_picture)) {
                Storage::delete('adminUploads/' . $admin->profile_picture);
            }

            $fileName = time() . '_' . $request->file('profile_picture')->getClientOriginalName();
            $request->file('profile_picture')->storeAs('adminUploads', $fileName, 'public');
            $admin->profile_picture = $fileName;
        }

        $admin->save();

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
    }

    public function users()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.pages.tables.u-c-c');
        }
        return redirect()->route('admin.login')->withErrors(['auth' => 'You are not authorized to access this page.']);
    }

    public function jobs()
    {
        if (Auth::guard('admin')->check()) {
            $jobs = Job::with('company')->get();
            return view('admin.pages.jobs.index', compact('jobs'));
        }
        return redirect()->route('admin.login')->withErrors(['auth' => 'You are not authorized to access this page.']);
    }

    public function categories()
    {
        if (Auth::guard('admin')->check()) {
            $categories = Category::all();
            return view('admin.pages.categories.index', compact('categories'));
        }
        return redirect()->route('admin.login')->withErrors(['auth' => 'You are not authorized to access this page.']);
    }

    public function createCategory()
    {
        return view('admin.pages.categories.create');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'description' => 'nullable|string',
        ]);

        Category::create($request->all());

        return view('admin.pages.categories.index')->with('success', 'Category created successfully.');
    }

    public function showCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.pages.categories.show', compact('category'));
    }

    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.pages.categories.edit', compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
            'slug' => 'required|string|max:255|unique:categories,slug,' . $id,
            'description' => 'nullable|string',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('admin.category.index')->with('success', 'Category updated successfully.');
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return view('admin.pages.categories.index')->with('success', 'Category created successfully.');
    }

    public function companies()
    {
        if (Auth::guard('admin')->check()) {
            $companies = Company::all();
            return view('admin.pages.companies.index', compact('companies'));
        }
        return redirect()->route('admin.login')->withErrors(['auth' => 'You are not authorized to access this page.']);
    }

    public function showCompany($id)
    {
        if (Auth::guard('admin')->check()) {
            $company = Company::findOrFail($id);
            return view('admin.pages.companies.show', compact('company'));
        }
        return redirect()->route('admin.login')->withErrors(['auth' => 'You are not authorized to access this page.']);
    }

    public function destroyCompany($id)
    {
        if (Auth::guard('admin')->check()) {
            $company = Company::findOrFail($id);
            $company->delete();
            return redirect()->route('admin.companies')->with('success', 'Company deleted successfully.');
        }
        return redirect()->route('admin.login')->withErrors(['auth' => 'You are not authorized to access this page.']);
    }

    public function applications()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.pages.applications.index');
        }
        return redirect()->route('admin.login')->withErrors(['auth' => 'You are not authorized to access this page.']);
    }

    public function blogs()
    {
        $categories = Category::all();
        $blogs = Blog::with('author', 'category')->paginate(10);

        return view('admin.pages.blogs.index', compact('blogs', 'categories'));
    }

    public function showBlog($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.pages.blogs.show', compact('blog'));
    }

    public function createBlog()
    {
        $categories = Category::all();
        return view('admin.pages.blogs.create', compact('categories'));
    }

    public function storeBlog(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'slug' => 'required|string|unique:blogs,slug',
            'author_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'nullable|image',
            'published_at' => 'nullable|date',
        ]);

        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->slug = $request->input('slug');
        $blog->author_id = $request->input('author_id');
        $blog->category_id = $request->input('category_id');
        $blog->published_at = $request->input('published_at');

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('blogImages', 'public');
            $blog->featured_image = $path;
        }

        $blog->save();

        return redirect()->route('admin.blogs')->with('success', 'Blog created successfully.');
    }

    public function editBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = Category::all();
        return view('admin.pages.blogs.edit', compact('blog', 'categories'));
    }

    public function updateBlog(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'slug' => 'required|string|unique:blogs,slug,' . $id,
            'author_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'nullable|image',
            'published_at' => 'nullable|date',
        ]);

        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->slug = $request->input('slug');
        $blog->author_id = $request->input('author_id');
        $blog->category_id = $request->input('category_id');
        $blog->published_at = $request->input('published_at');

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('blogImages', 'public');
            $blog->featured_image = $path;
        }

        $blog->save();

        return redirect()->route('admin.blogs')->with('success', 'Blog updated successfully.');
    }

    public function deleteBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('admin.blogs')->with('success', 'Blog deleted successfully.');
    }

    public function deleteMessage($id)
    {
        $message = Message::find($id);

        if (!$message) {
            return redirect()->back()->with('error', 'Message not found.');
        }

        $message->delete();

        return redirect()->back()->with('success', 'Message deleted successfully.');
    }

    // USERS
    public function indexUser()
    {
        $users = User::paginate(10);
        return view('admin.pages.users.index', compact('users'));
    }

    public function showUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.pages.users.show', compact('user'));
    }

    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'User deleted successfully.');
    }
}
