@extends('admin.layouts.app-company')

@section('title', 'Company Profile')

@section('content')
    <div class="page-header text-center">
        <h3 class="page-title" style="font-size: 2rem;">Company Profile</h3>
    </div>

    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card" style="padding: 20px;">
                <div class="card-body text-center">
                    <p style="font-size: 1.2rem;">Welcome, {{ Auth::guard('company')->user()->name }}! Here is your company profile.</p>
                    <br>
                    <div class="mb-4">
                        @if (Auth::guard('company')->user()->logo)
                            <img src="{{ asset('storage/companyUploads/' . $company->logo) }}" alt="Company Logo" class="img-fluid"
                                 style="width: 100px; height: 100px; border-radius: 50%; max-width: 100%;">
                        @else
                            <img src="https://via.placeholder.com/150" alt="No Logo"
                                 style="width: 200px; height: 200px; object-fit: cover; border-radius: 50%;">
                            <p class="mt-2" style="font-size: 1.1rem;">No Logo Available</p>
                        @endif
                    </div>

                    <table class="table table-borderless" style="font-size: 1.1rem; width: 100%;">
                        <tbody>
                        <tr>
                            <td style="font-weight: bold;">Company Name:</td>
                            <td>{{ Auth::guard('company')->user()->name }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Email:</td>
                            <td>{{ Auth::guard('company')->user()->email }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Website:</td>
                            <td>{{ Auth::guard('company')->user()->website ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Address:</td>
                            <td>{{ Auth::guard('company')->user()->address ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Description:</td>
                            <td>{{ Auth::guard('company')->user()->description ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Phone:</td>
                            <td>{{ Auth::guard('company')->user()->phone ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Status:</td>
                            <td>{{ Auth::guard('company')->user()->status }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Industry:</td>
                            <td>{{ Auth::guard('company')->user()->industry ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Created At:</td>
                            <td>{{ Auth::guard('company')->user()->created_at->format('Y-m-d H:i:s') }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Updated At:</td>
                            <td>{{ Auth::guard('company')->user()->updated_at->format('Y-m-d H:i:s') }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
