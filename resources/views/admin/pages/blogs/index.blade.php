@extends('admin.layouts.app')

@section('title', 'Blogs')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="card-title">Blogs Management</h4>
                            <a href="" class="btn btn-primary">Add New Blog</a>
                        </div>
                        <p class="card-description">
                            Manage your blogs here
                        </p>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Published At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <td>{{ $blog->id }}</td>
                                        <td>{{ $blog->title }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($blog->content, 50) }}</td>
                                        <td>{{ $blog->author->name }}</td>
                                        <td>{{ $blog->category->name }}</td>
                                        <td>{{ $blog->published_at ? $blog->published_at->format('Y-m-d') : 'N/A' }}</td>
                                        <td>
                                            <a href="{{ route('admin.blog.show', $blog->id) }}" class="btn btn-info btn-sm">View</a>
                                            <a href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('admin.blog.delete', $blog->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $blogs->links() }} <!-- Pagination links if necessary -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
