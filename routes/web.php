<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\BlogController;

Route::get('/', [JobController::class, 'index'])->name('home');

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
        Route::get('/jobs', [CompanyController::class, 'jobs'])->name('jobs');
        Route::get('/applications', [CompanyController::class, 'applications'])->name('applications');
        Route::get('/dashboard', [CompanyController::class, 'dashboard'])->name('dashboard');
    });
});

// Admin Prefix Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    Route::group(['middleware' => ['admin']], function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/users', [AdminController::class, 'users'])->name('users');
        Route::get('/jobs', [AdminController::class, 'jobs'])->name('jobs');
        Route::get('/categories', [AdminController::class, 'categories'])->name('categories');
        Route::get('/companies', [AdminController::class, 'companies'])->name('companies');
        Route::get('/applications', [AdminController::class, 'applications'])->name('applications');
        Route::get('/blogs', [AdminController::class, 'blogs'])->name('blogs');
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
            Route::get('/', [UserController::class, 'profile'])->name('profile');
            Route::get('/edit', [UserController::class, 'editProfile'])->name('editProfile');
            Route::put('/update', [UserController::class, 'updateProfile'])->name('updateProfile');
            Route::put('/update-picture', [UserController::class, 'updatePicture'])->name('updatePicture');
        });

        Route::prefix('jobs')->group(function () {
            Route::get('/', [UserController::class, 'jobs'])->name('jobs.index');
            Route::post('/{job_id}/apply', [UserController::class, 'applyJob'])->name('jobs.apply');
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

