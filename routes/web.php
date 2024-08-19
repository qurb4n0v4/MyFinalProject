<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\BlogController;

Route::get('/', [JobController::class, 'index'])->name('home');

Route::prefix('/jobs')->group(function () {
    Route::get('/', [JobController::class, 'index'])->name('jobs.index');
    Route::get('/all', [JobController::class, 'allJobs'])->name('jobs.all');
    Route::get('/{id}', [JobController::class, 'show'])->name('jobs.show');
});

Route::get('/users', [UserController::class, 'index']);

Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::get('/', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/{id}/jobs', [CategoryController::class, 'jobs'])->name('categories.jobs');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::get('/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

Route::get('/companies', [CompanyController::class, 'index']);
Route::get('/companies/{id}', [CompanyController::class, 'show']);

Route::prefix('/applications')->middleware('auth')->group(function () {
    Route::get('/', [ApplicationController::class, 'index'])->name('applications.index');
    Route::get('/{id}', [ApplicationController::class, 'show'])->name('applications.show');
    Route::delete('/{id}', [ApplicationController::class, 'destroy'])->name('applications.destroy');
});

Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/blogs/{id}', [BlogController::class, 'show']);
Route::get('/blogs/blog-detail', [BlogController::class, 'blogDetail'])->name('blog.detail');

Route::prefix('user')->middleware('user')->group(function() {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');

    Route::prefix('profile')->group(function() {
        Route::get('/', [UserController::class, 'profile'])->name('user.profile');
        Route::get('/edit', [UserController::class, 'editProfile'])->name('user.editProfile');
        Route::post('/update', [UserController::class, 'updateProfile'])->name('user.updateProfile');
        Route::post('/update-picture', [UserController::class, 'updatePicture'])->name('user.updatePicture');
    });

    Route::prefix('jobs')->group(function() {
        Route::get('/', [UserController::class, 'jobs'])->name('user.jobs.index');
        Route::post('/{job_id}/apply', [UserController::class, 'applyJob'])->name('user.jobs.apply');
        Route::get('/{id}', [JobController::class, 'show'])->name('user.jobs.show');
    });

    Route::prefix('applications')->group(function() {
        Route::get('/', [UserController::class, 'applications'])->name('user.applications.index');
        Route::get('/{id}', [UserController::class, 'applicationShow'])->name('user.applications.show');
        Route::delete('/{id}', [UserController::class, 'applicationDestroy'])->name('user.applications.destroy');
    });
});

Route::prefix('company')->middleware('company')->group(function() {
    Route::get('/dashboard', [CompanyController::class, 'dashboard'])->name('company.dashboard');

    Route::prefix('jobs')->group(function() {
        Route::get('/', [CompanyController::class, 'jobs'])->name('company.jobs.index');
        Route::get('/create', [CompanyController::class, 'createJob'])->name('company.jobs.create');
        Route::post('/', [CompanyController::class, 'storeJob'])->name('company.jobs.store');
        Route::get('/{id}/edit', [CompanyController::class, 'editJob'])->name('company.jobs.edit');
        Route::put('/{id}', [CompanyController::class, 'updateJob'])->name('company.jobs.update');
        Route::delete('/{id}', [CompanyController::class, 'destroyJob'])->name('company.jobs.destroy');
    });

    Route::prefix('applications')->group(function() {
        Route::patch('/{id}/review', [ApplicationController::class, 'review'])->name('company.applications.review');
        Route::patch('/{id}/accept', [ApplicationController::class, 'accept'])->name('company.applications.accept');
        Route::patch('/{id}/reject', [ApplicationController::class, 'reject'])->name('company.applications.reject');
    });
});
Route::prefix('admin')->middleware('admin')->group(function() {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('users', UserController::class)->except(['create', 'store']);
    Route::resource('companies', CompanyController::class)->except(['create', 'store']);
    Route::resource('categories', CategoryController::class);
    Route::resource('jobs', JobController::class)->except(['create', 'store']);
});
