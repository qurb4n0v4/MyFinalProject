@extends('admin.layouts.app-company')

@section('title', 'Jobs')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="card-title">Jobs List</h4>
                            <a href="{{ route('company.jobs.create') }}" class="btn btn-primary">Add Job</a>
                        </div>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Job Title</th>
                                    <th>Company</th>
                                    <th>Location</th>
                                    <th>Salary</th>
                                    <th>Posted On</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($jobs as $job)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $job->title }}</td>
                                        <td>{{ $job->company->name }}</td>
                                        <td>{{ $job->location }}</td>
                                        <td>${{ $job->salary }}</td>
                                        <td>{{ $job->created_at->format('F d, Y') }}</td>
                                        <td>
                                            <a href="{{ route('company.jobs.show', $job->id) }}" class="btn btn-info btn-sm">View</a>
                                            <a href="{{ route('company.jobs.edit', $job->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('company.jobs.destroy', $job->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
