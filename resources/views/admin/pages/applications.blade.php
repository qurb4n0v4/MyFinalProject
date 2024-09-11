@extends('admin.layouts.app')

@section('title', 'Applications')

@section('content')
    <div class="col grid-margin stretch-card">
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
                        <tr>
                            <td>Jacob</td>
                            <td>Software Developer</td>
                            <td><label class="badge badge-danger">Pending</label></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">View</a>
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Messsy</td>
                            <td>Graphic Designer</td>
                            <td><label class="badge badge-warning">In progress</label></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">View</a>
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>John</td>
                            <td>Project Manager</td>
                            <td><label class="badge badge-info">Fixed</label></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">View</a>
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Peter</td>
                            <td>Content Writer</td>
                            <td><label class="badge badge-success">Completed</label></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">View</a>
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Dave</td>
                            <td>Web Developer</td>
                            <td><label class="badge badge-warning">In progress</label></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">View</a>
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
