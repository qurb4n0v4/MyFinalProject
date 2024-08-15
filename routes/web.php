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

Route::get('/jobs', [JobController::class, 'list'])->name('jobs.index');
Route::get('/jobs/{id}', [JobController::class, 'show']);
Route::get('/categories/{id}/jobs', [CategoryController::class, 'show']);

Route::get('/users', [UserController::class, 'index']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);

Route::get('/companies', [CompanyController::class, 'index']);
Route::get('/companies/{id}', [CompanyController::class, 'show']);

Route::get('/applications', [ApplicationController::class, 'index']);
Route::get('/applications/{id}', [ApplicationController::class, 'show']);
Route::get('/jobs/{job_id}/apply', [ApplicationController::class, 'store']);

Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/blogs/{id}', [BlogController::class, 'show']);
Route::get('/blogs/blog-detail', [BlogController::class, 'blogDetail'])->name('blog.detail');

Route::prefix('user')->middleware('user')->group(function() {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('user.editProfile');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('user.updateProfile');
    Route::post('/profile/update-picture', [UserController::class, 'updatePicture'])->name('user.updatePicture');
    Route::get('/jobs', [JobController::class, 'jobs'])->name('user.jobs.index');
    Route::get('/jobs/{id}', [JobController::class, 'show'])->name('user.jobs.show');
    Route::post('/jobs/{job_id}/apply', [ApplicationController::class, 'store'])->name('user.jobs.apply');
    Route::get('/applications', [ApplicationController::class, 'index'])->name('user.applications.index');
    Route::get('/applications/{id}', [ApplicationController::class, 'show'])->name('user.applications.show');
    Route::delete('/applications/{id}', [ApplicationController::class, 'destroy'])->name('user.applications.destroy');
});
Route::prefix('company')->middleware('company')->group(function() {
    Route::get('/dashboard', [CompanyController::class, 'dashboard'])->name('company.dashboard');
    Route::get('/jobs', [JobController::class, 'jobs'])->name('company.jobs.index');
    Route::get('/jobs/create', [JobController::class, 'create'])->name('company.jobs.create');
    Route::post('/jobs', [JobController::class, 'store'])->name('company.jobs.store');
    Route::get('/jobs/{id}/edit', [JobController::class, 'edit'])->name('company.jobs.edit');
    Route::put('/jobs/{id}', [JobController::class, 'update'])->name('company.jobs.update');
    Route::delete('/jobs/{id}', [JobController::class, 'destroy'])->name('company.jobs.destroy');
    Route::patch('applications/{id}/review', [ApplicationController::class, 'review'])->name('company.applications.review');
    Route::patch('applications/{id}/accept', [ApplicationController::class, 'accept'])->name('company.applications.accept');
    Route::patch('applications/{id}/reject', [ApplicationController::class, 'reject'])->name('company.applications.reject');
});
Route::prefix('admin')->middleware('admin')->group(function() {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('users', UserController::class)->except(['create', 'store']);
    Route::resource('companies', CompanyController::class)->except(['create', 'store']);
    Route::resource('categories', CategoryController::class);
    Route::resource('jobs', JobController::class)->except(['create', 'store']);
});
