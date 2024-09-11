@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

    <div class="page-header">
        <h3 class="page-title"> Admin Dashboard </h3>
    </div>

    <div class="row">
        <!-- Kullanıcı Sayısı Kartı -->
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h3 class="mb-2">Total Users</h3>
                    <h1 class="mb-4">{{ $totalUsers }}</h1>
                    <p><i class="mdi mdi-account-multiple"></i> Active Users: {{ $activeUsers }}</p>
                </div>
            </div>
        </div>

        <!-- Şirket Sayısı Kartı -->
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h3 class="mb-2">Total Companies</h3>
                    <h1 class="mb-4">{{ $totalCompanies }}</h1>
                    <p><i class="mdi mdi-domain"></i> Verified Companies: {{ $verifiedCompanies }}</p>
                </div>
            </div>
        </div>

        <!-- İş İlanları Sayısı Kartı -->
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h3 class="mb-2">Total Jobs</h3>
                    <h1 class="mb-4">{{ $totalJobs }}</h1>
                    <p><i class="mdi mdi-briefcase"></i> Active Jobs: {{ $activeJobs }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Başvuru Sayısı Kartı -->
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h3 class="mb-2">Total Applications</h3>
                    <h1 class="mb-4">{{ $totalApplications }}</h1>
                    <p><i class="mdi mdi-file-document"></i> Pending Applications: {{ $pendingApplications }}</p>
                </div>
            </div>
        </div>

        <!-- Son Başvurular Listesi -->
        <div class="col-md-8 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Recent Job Applications</h4>
                    <ul class="list-group">
                        @foreach ($recentApplications as $application)
                            <li class="list-group-item">
                                <strong>{{ $application->user->name }}</strong> applied for
                                <strong>{{ $application->job->title }}</strong>
                                on {{ $application->created_at->format('Y-m-d') }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Şirketlerden Gelen Son Mesajlar -->
        <div class="col-md-12 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Latest Messages from Companies</h4>
                    @foreach ($recentMessages as $message)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $message->name ?? 'Unknown Company' }}</h5>
                                <p class="card-text">
                                    <strong>Message:</strong> "{{ \Illuminate\Support\Str::limit($message->message, 50) }}"
                                </p>
                                <p class="card-text">
                                    <small class="text-muted">Sent on {{ $message->created_at->format('F d, Y') }}</small>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <form action="{{ route('admin.message.delete', $message->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
