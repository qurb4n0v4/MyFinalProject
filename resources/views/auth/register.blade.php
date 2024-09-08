@extends('layouts.app')

@section('content')
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Sign Up
                    </h1>
                    <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="about-us.html"> Sign Up</a></p>
                </div>
            </div>
        </div>
    </section>
    <div class="container py-5 col-lg-6">
        <h2>Register</h2>
        <form method="POST" action="{{ route('register.post') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="role">Role:</label>
                <select name="role" id="role" class="form-control">
                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                    <option value="company" {{ old('role') == 'company' ? 'selected' : '' }}>Company</option>
                </select>
            </div>

            <div id="common-fields">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>
            </div>

            <div id="user-fields" class="role-specific-fields" style="display: none;">
                <div class="form-group">
                    <label for="profile_photo">Profile Photo:</label>
                    <input type="file" name="profile_photo" id="profile_photo" class="form-control">
                </div>

                <div class="form-group">
                    <label for="resume">Resume:</label>
                    <input type="file" name="resume" id="resume" class="form-control">
                </div>

                <div class="form-group">
                    <label for="date_of_birth">Date of Birth:</label>
                    <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}">
                </div>
            </div>

            <div id="company-fields" class="role-specific-fields" style="display: none;">
                <div class="form-group">
                    <label for="website">Website:</label>
                    <input type="text" name="website" id="website" class="form-control" value="{{ old('website') }}">
                </div>

                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="logo">Logo:</label>
                    <input type="file" name="logo" id="logo" class="form-control">
                </div>

                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var roleSelect = document.getElementById('role');
            var userFields = document.getElementById('user-fields');
            var companyFields = document.getElementById('company-fields');

            function toggleFields(role) {
                if (role === 'user') {
                    userFields.style.display = 'block';
                    companyFields.style.display = 'none';
                } else if (role === 'company') {
                    userFields.style.display = 'none';
                    companyFields.style.display = 'block';
                }
            }

            roleSelect.addEventListener('change', function () {
                toggleFields(this.value);
            });

            toggleFields(roleSelect.value);
        });
    </script>
@endsection
