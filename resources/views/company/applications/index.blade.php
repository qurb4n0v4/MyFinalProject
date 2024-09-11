@extends('admin.layouts.app-company')

@section('title', 'Applications')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Applications</h4>
                        <p class="card-description">
                            View and manage job applications
                        </p>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Job</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($applications as $application)
                                    <tr>
                                        <td>
                                            <a href="">
                                                {{ $application->user->name }}
                                            </a>
                                        </td>
                                        <td>{{ $application->job->title }}</td>
                                        <td>
                                            @if ($application->status == 'pending')
                                                <label class="badge badge-warning">Pending</label>
                                            @elseif ($application->status == 'accepted')
                                                <label class="badge badge-success">Accepted</label>
                                            @elseif ($application->status == 'rejected')
                                                <label class="badge badge-danger">Rejected</label>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($application->status == 'pending')
                                                <form action="" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success">Accept</button>
                                                </form>
                                                <form action="" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                                                </form>
                                            @endif
                                            <a href="" class="btn btn-sm btn-primary">View</a>
                                            <form action="" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $applications->links() }} <!-- Pagination links if necessary -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
