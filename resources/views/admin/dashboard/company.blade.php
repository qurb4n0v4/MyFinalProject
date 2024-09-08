@extends('admin.layouts.app-company')

@section('content')
    <div class="container">
        <h2>Dashboard</h2>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Jobs</h5>
                        <p class="card-text">{{ $totalJobs }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Applications</h5>
                        <p class="card-text">{{ $totalApplications }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">New Applications Today</h5>
                        <p class="card-text">{{ $newApplications }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <h4>Recent Jobs</h4>
                <ul class="list-group">
                    @foreach($recentJobs as $job)
                        <li class="list-group-item">{{ $job->title }} ({{ $job->created_at->format('Y-m-d') }})</li>
                    @endforeach
                </ul>
            </div>

            <div class="col-md-6">
                <h4>Recent Applications</h4>
                <ul class="list-group">
                    @foreach($recentApplications as $application)
                        <li class="list-group-item">{{ $application->job->title }} - {{ $application->applicant->name }} ({{ $application->created_at->format('Y-m-d') }})</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
