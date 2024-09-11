<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/contact', function () {
    return view('partials.contact');
});

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

// Job Prefix Routes
Route::prefix('jobs')->group(function () {
    Route::get('/', [JobController::class, 'index'])->name('jobs.index');
    Route::get('/all', [JobController::class, 'allJobs'])->name('jobs.all');
    Route::get('/{id}', [JobController::class, 'show'])->name('jobs.show');
});

// User Routes
Route::get('/users', [UserController::class, 'index']);

// Category Prefix Routes
Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/{id}/jobs', [CategoryController::class, 'jobs'])->name('categories.jobs');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

// Company Routes
Route::get('/companies', [CompanyController::class, 'index']);
Route::get('/companies/{id}', [CompanyController::class, 'show']);

// Application Prefix Routes
Route::prefix('applications')->group(function () {
    Route::get('/', [ApplicationController::class, 'index'])->name('applications.index');
    Route::get('/{id}', [ApplicationController::class, 'show'])->name('applications.show');
    Route::delete('/{id}', [ApplicationController::class, 'destroy'])->name('applications.destroy');
});

// Blog Prefix Routes
Route::prefix('blogs')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('/all', [BlogController::class, 'allBlogs'])->name('blogs.all');
    Route::get('/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('/store', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('/{id}', [BlogController::class, 'show'])->name('blogs.show');
    Route::get('/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::put('/{id}', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');
});

// Company Prefix Routes
Route::prefix('company')->name('company.')->group(function () {
    Route::group(['middleware' => ['company']], function () {
        Route::get('/dashboard', [CompanyController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [CompanyController::class, 'profile'])->name('profile');
        Route::get('/jobs', [CompanyController::class, 'jobs'])->name('jobs.index');
        Route::get('/jobs/create', [CompanyController::class, 'createJob'])->name('jobs.create');
        Route::post('/jobs/store', [CompanyController::class, 'storeJob'])->name('jobs.store');
        Route::get('/jobs/{id}/show', [CompanyController::class, 'showJob'])->name('jobs.show');
        Route::get('/jobs/{id}/edit', [CompanyController::class, 'editJob'])->name('jobs.edit');
        Route::delete('/jobs/{id}', [CompanyController::class, 'destroyJob'])->name('jobs.destroy');
        Route::get('/{companyId}/applications', [CompanyController::class, 'applications'])->name('applications.index');
        Route::get('/update-profile/{id}', [CompanyController::class, 'showUpdateProfile'])->name('showUpdateProfile');
        Route::put('/update-profile/{id}', [CompanyController::class, 'updateProfile'])->name('updateProfile');
    });
});

// Admin Prefix Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    Route::group(['middleware' => ['admin']], function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::prefix('/profile')->group(function () {
            Route::get('/', [AdminController::class, 'profile'])->name('profile');
            Route::get('/update/{id}', [AdminController::class, 'showUpdateProfile'])->name('showUpdateProfile');
            Route::put('/update/{id}', [AdminController::class, 'updateProfile'])->name('updateProfile');
        });

        Route::prefix('/categories')->name('category.')->group(function () {
            Route::get('/', [AdminController::class, 'categories'])->name('index');
            Route::get('/create', [AdminController::class, 'createCategory'])->name('create');
            Route::post('/store', [AdminController::class, 'storeCategory'])->name('store');
            Route::get('/{id}', [AdminController::class, 'showCategory'])->name('show');
            Route::get('/{id}/edit', [AdminController::class, 'editCategory'])->name('edit');
            Route::put('/{id}', [AdminController::class, 'updateCategory'])->name('update');
            Route::delete('/{id}', [AdminController::class, 'deleteCategory'])->name('destroy');
        });

        Route::get('/users', [AdminController::class, 'users'])->name('users');
        Route::prefix('/users')->name('user.')->group(function () {
            Route::get('/', [AdminController::class, 'indexUser'])->name('index');
            Route::get('/{id}', [AdminController::class, 'showUser'])->name('show');
            Route::delete('/{id}', [AdminController::class, 'destroyUser'])->name('delete');
        });

        Route::prefix('/blogs')->name('blog.')->group(function () {
            Route::get('/', [AdminController::class, 'blogs'])->name('index');
            Route::get('/{id}', [AdminController::class, 'showBlog'])->name('show');
            Route::get('/create', [AdminController::class, 'createBlog'])->name('create');
            Route::post('/', [AdminController::class, 'storeBlog'])->name('store');
            Route::get('/{id}/edit', [AdminController::class, 'editBlog'])->name('edit');
            Route::put('/{id}', [AdminController::class, 'updateBlog'])->name('update');
            Route::delete('/{id}', [AdminController::class, 'deleteBlog'])->name('delete');
        });

        Route::get('/jobs', [AdminController::class, 'jobs'])->name('jobs.index');
        Route::get('/categories', [AdminController::class, 'categories'])->name('categories.index');
        Route::get('/companies', [AdminController::class, 'companies'])->name('companies.index');
        Route::get('/companies/{id}', [AdminController::class, 'showCompany'])->name('companies.show');
        Route::delete('/companies/{id}', [AdminController::class, 'destroyCompany'])->name('companies.destroy');
        Route::get('/applications', [AdminController::class, 'applications'])->name('applications');
        Route::delete('/message/{id}', [AdminController::class, 'deleteMessage'])->name('message.delete');
    });
});

Route::get('/admin', function () {
    return redirect()->route('admin.login');
});

// User Prefix Routes
Route::prefix('user')->name('user.')->group(function () {
    Route::group(['middleware' => ['user']], function () {
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        Route::get('/user/{id}', [UserController::class, 'show'])->name('show');

        Route::prefix('profile')->group(function () {
            Route::get('/edit', [UserController::class, 'editProfile'])->name('editProfile');
            Route::put('/update', [UserController::class, 'updateProfile'])->name('updateProfile');
            Route::put('/update-picture', [UserController::class, 'updatePicture'])->name('updatePicture');
        });

        Route::prefix('jobs')->group(function () {
            Route::get('/', [UserController::class, 'jobs'])->name('jobs.index');
            Route::post('/save/{job}', [UserController::class, 'saveJob'])->name('jobs.save');
            Route::post('/unsave/{job}', [UserController::class, 'unsaveJob'])->name('jobs.unsave');
            Route::get('/{id}', [JobController::class, 'show'])->name('jobs.show');
        });
    });
});

// Auth Prefix Routes
Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/blog', function () {
    return view('admin.pages.blogs.create');
});

