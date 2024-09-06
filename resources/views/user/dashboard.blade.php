<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<style>
        .img-account-profile {
            height: 10rem;
        }
        .rounded-circle {
            border-radius: 50% !important;
        }
        .card {
            box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
        }
        .card .card-header {
            font-weight: 500;
        }
        .card-header:first-child {
            border-radius: 0.35rem 0.35rem 0 0;
        }
        .card-header {
            padding: 1rem 1.35rem;
            margin-bottom: 0;
            background-color: rgba(33, 40, 50, 0.03);
            border-bottom: 1px solid rgba(33, 40, 50, 0.125);
        }
        .form-control {
            display: block;
            width: 100%;
            padding: 0.875rem 1.125rem;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1;
            color: #69707a;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #c5ccd6;
            border-radius: 0.35rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        .nav-borders .nav-link.active {
            color: #0061f2;
            border-bottom-color: #0061f2;
        }
        .nav-borders .nav-link {
            color: #69707a;
            border-bottom-width: 0.125rem;
            border-bottom-style: solid;
            border-bottom-color: transparent;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            padding-left: 0;
            padding-right: 0;
            margin-left: 1rem;
            margin-right: 1rem;
        }
</style>
@extends('layouts.app')

@section('content')
    <div style="height: 95px;"></div>
    <div class="unit-5 overlay" style="background-image: url({{ asset('external/images/hero_2.jpg') }})">
        <div class="container text-center">
            <h1 class="mb-0" style="color: #fff; font-size: 2.5rem;">Profile</h1>
            <p class="mb-0 unit-6">
                <a href="/">Home</a>
                <span class="sep"> > </span>
                <a href="{{ route('user.jobs.index') }}">Jobs</a>
                <span class="sep"> > </span>{{ Auth::user()->name }}
            </p>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <!-- Sidebar for Profile Picture -->
                <div class="col-md-3 d-none d-md-block mt-5 pt-2">
                    <div class="card mb-4 text-center">
                        <div class="card-body">
                            @if (!empty(Auth::guard('web')->user()->profile_photo))
                                <img src="{{ asset('uploads/avatar') }}/{{ Auth::user()->profile_photo }}" style="width:100px; height:100px; border-radius:100px; object-fit: cover;" class="border mb-3" alt="">
                            @else
                                <img src="https://i.pravatar.cc/150" style="width:100px; height:100px; border-radius:100px;" class="border mb-3" alt="">
                            @endif
                            <h5 class="card-title">{{ Auth::user()->name }}</h5>
                            <p class="card-text">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-danger w-100">Logout</button>
                        </form>
                    </div>
                </div>

                <!-- Main Content Area -->
                <div class="col-md-9">
                    <!-- Tab navigation -->
                    <ul class="nav nav-tabs" id="profile-tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="applied-jobs-tab" data-bs-toggle="tab" href="#applied-jobs" role="tab" aria-controls="applied-jobs" aria-selected="false">Applied Jobs</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="saved-jobs-tab" data-bs-toggle="tab" href="#saved-jobs" role="tab" aria-controls="saved-jobs" aria-selected="false">Saved Jobs</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="edit-profile-tab" data-bs-toggle="tab" href="#edit-profile" role="tab" aria-controls="edit-profile" aria-selected="false">Edit Profile</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="settings-tab" data-bs-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Settings</a>
                        </li>
                    </ul>

                    <!-- Tab content -->
                    <div class="tab-content mt-3" id="profile-tabs-content">
                        <!-- Profile Tab -->

                            @include('.user.profile.profile')

                        <!-- Applied Jobs Tab -->

                            @include('.user.applications.index')

                        <!-- Saved Jobs Tab -->

                            @include('.user.jobs.saved_jobs')

                        <!-- Edit Profile Tab -->

                            @include('.user.profile.editProfile')

                        <!-- Settings Tab -->

                            @include('.user.profile.settings')

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS (if not already included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection


