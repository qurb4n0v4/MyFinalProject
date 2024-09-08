@extends('admin.layouts.app')

@section('title', 'Admin Profile')

@section('content')
    <div class="page-header text-center">
        <h3 class="page-title" style="font-size: 2rem;">Admin Profile</h3>
    </div>

    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card" style="padding: 20px;">
                <div class="card-body text-center">
                    <p style="font-size: 1.2rem;">Welcome, {{ Auth::guard('admin')->user()->name }}! Here is your admin profile.</p>
                    <br>
                    <div class="mb-4">
                        @if (Auth::guard('admin')->user()->avatar)
                            <img src="{{ asset('storage/adminUploads/' . Auth::guard('admin')->user()->avatar) }}" alt="Admin Avatar" class="img-fluid"
                                 style="width: 100px; height: 100px; border-radius: 50%; max-width: 100%;">
                        @else
                            <img src="https://via.placeholder.com/150" alt="No Avatar"
                                 style="width: 200px; height: 200px; object-fit: cover; border-radius: 50%;">
                            <p class="mt-2" style="font-size: 1.1rem;">No Avatar Available</p>
                        @endif
                    </div>

                    <table class="table table-borderless" style="font-size: 1.1rem; width: 100%;">
                        <tbody>
                        <tr>
                            <td style="font-weight: bold;">Admin Name:</td>
                            <td>{{ Auth::guard('admin')->user()->name }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Email:</td>
                            <td>{{ Auth::guard('admin')->user()->email }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Phone:</td>
                            <td>{{ Auth::guard('admin')->user()->phone ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Gender:</td>
                            <td>{{ Auth::guard('admin')->user()->gender ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Created At:</td>
                            <td>{{ Auth::guard('admin')->user()->created_at->format('Y-m-d H:i:s') }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Updated At:</td>
                            <td>{{ Auth::guard('admin')->user()->updated_at->format('Y-m-d H:i:s') }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
