@extends('admin.layouts.app')

@section('title', 'Companies')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="card-title">Companies Management</h4>
                        </div>
                        <p class="card-description">
                            Manage your companies here
                        </p>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Website</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($companies as $company)
                                    <tr>
                                        <td>{{ $company->id }}</td>
                                        <td>{{ $company->name }}</td>
                                        <td>{{ $company->email }}</td>
                                        <td>{{ $company->website }}</td>
                                        <td>{{ ucfirst($company->status) }}</td>
                                        <td>
                                            <a href="{{ route('admin.companies.show', $company->id) }}" class="btn btn-info btn-sm">View</a>
                                            <form action="{{ route('admin.companies.destroy', $company->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $companies->links() }} <!-- Pagination links if necessary -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
