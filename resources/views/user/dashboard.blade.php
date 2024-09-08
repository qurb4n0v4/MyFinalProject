@extends('layouts.app')

@section('content')
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">Dashboard</h1>
                    <p class="text-white link-nav">
                        <a href="/home">Home</a>
                        <span class="lnr lnr-arrow-right"></span>
                        <a href="{{ route('user.dashboard') }}"> {{ Auth::user()->name }}</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <style>
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

        /* Initially hide all tabs except Profile */
        .tab-pane {
            display: none;
        }
        .tab-pane.show {
            display: block;
        }
    </style>

    <div class="site-section bg-light py-5">
        <div class="container">
            <div class="row">
                <!-- Sidebar for Profile Picture -->
                <div class="col-md-3 d-none d-md-block mt-5 pt-2">
                    <div class="card mb-4 text-center">
                        <div class="card-body">
                            @if (Auth::user()->profile_photo)
                                <img src="{{ asset('storage/userUploads/' . Auth::user()->profile_photo) }}" alt="Profile Picture" style="width:100px; height:100px; object-fit: cover; display: block; margin: 0 auto;">
                            @else
                                <img src="https://ps.w.org/user-avatar-reloaded/assets/icon-256x256.png?rev=2540745" alt="Default Profile Picture" style="width:100px; height:100px; display: block; margin: 0 auto;">
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
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            @include('.user.profile.profile')
                        </div>
                        <div class="tab-pane fade" id="applied-jobs" role="tabpanel" aria-labelledby="applied-jobs-tab">
                            @include('.user.applications.index')
                        </div>
                        <div class="tab-pane fade" id="saved-jobs" role="tabpanel" aria-labelledby="saved-jobs-tab">
                            @include('.user.jobs.saved_jobs')
                        </div>
                        <div class="tab-pane fade" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab">
                            @include('.user.profile.editProfile')
                        </div>
                        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                            @include('.user.profile.settings')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS (if not already included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize tabs
            var tabElements = document.querySelectorAll('.nav-link');
            var tabContentElements = document.querySelectorAll('.tab-pane');

            tabElements.forEach(function (tab) {
                tab.addEventListener('click', function () {
                    var targetId = this.getAttribute('href');

                    tabContentElements.forEach(function (content) {
                        if (content.id === targetId.substring(1)) {
                            content.classList.add('show');
                        } else {
                            content.classList.remove('show');
                        }
                    });
                });
            });

            // Show only the Profile tab by default
            tabContentElements.forEach(function (content) {
                if (content.id === 'profile') {
                    content.classList.add('show');
                } else {
                    content.classList.remove('show');
                }
            });
        });
    </script>
@endsection
