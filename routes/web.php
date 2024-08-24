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

Route::prefix('jobs')->group(function () {
    Route::get('/', [JobController::class, 'index'])->name('jobs.index');
    Route::get('/all', [JobController::class, 'allJobs'])->name('jobs.all');
    Route::get('/{id}', [JobController::class, 'show'])->name('jobs.show');
});

Route::get('/users', [UserController::class, 'index']);

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

Route::get('/companies', [CompanyController::class, 'index']);
Route::get('/companies/{id}', [CompanyController::class, 'show']);

Route::prefix('applications')->group(function () {
    Route::get('/', [ApplicationController::class, 'index'])->name('applications.index');
    Route::get('/{id}', [ApplicationController::class, 'show'])->name('applications.show');
    Route::delete('/{id}', [ApplicationController::class, 'destroy'])->name('applications.destroy');
});

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

Route::prefix('user')->group(function() {
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

Route::prefix('company')->group(function() {
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

Route::prefix('admin')->name('admin.')->group(function() {
    Route::group(['middleware' => ['prevent.login.access']], function() {
        Route::get('/register', [AdminController::class, 'showRegisterForm'])->name('register');
        Route::post('/register', [AdminController::class, 'register']);
        Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminController::class, 'login'])->name('login.submit');
    });
    Route::group(['middleware' => ['admin']], function() {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
        Route::get('/applications', [AdminController::class, 'applications'])->name('applications');
//
//         Route::resource('users', UserController::class)->except(['create', 'store']);
//         Route::resource('companies', CompanyController::class)->except(['create', 'store']);
//         Route::resource('categories', CategoryController::class);
//         Route::resource('jobs', JobController::class)->except(['create', 'store']);
    });
});

Route::get('/admin', function () {
    return redirect()->route('admin.login');
});



Route::prefix('register')->group(function() {
    Route::get('/user', function () {
        return view('auth.register-user');
    })->name('user.register');
    Route::post('/user', [AuthController::class, 'registerUser'])->name('user.register.post');
    Route::get('/company', function () {
        return view('auth.register-company');
    })->name('company.register');
    Route::post('/company', [AuthController::class, 'registerCompany'])->name('company.register.post');
});

Route::prefix('login')->group(function() {
    Route::get('/user', function () {
        return view('auth.login-user');
    })->name('user.login');
    Route::post('/user', [AuthController::class, 'loginUser'])->name('user.login.post');
    Route::get('/company', function () {
        return view('auth.login-company');
    })->name('company.login');
    Route::post('/company', [AuthController::class, 'loginCompany'])->name('company.login.post');
});

Route::prefix('logout')->group(function() {
    Route::post('/user', [AuthController::class, 'logoutUser'])->name('user.logout');
    Route::post('/company', [AuthController::class, 'logoutCompany'])->name('company.logout');
});
