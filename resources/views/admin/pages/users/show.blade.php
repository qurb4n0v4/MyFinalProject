@extends('admin.layouts.app')

@section('title', 'User Profile')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        User Profile
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <!-- Profile content here -->
                                <div class="card">
                                    <div class="card-header">
                                        User Details
                                    </div>
                                    <div class="card-body">
                                        <p>Name:  <strong class="badge bg-secondary badge-primary">{{ $user->name }}</strong></p>
                                        <p>Email: <strong class="badge bg-secondary badge-primary">{{ $user->email }}</strong></p>
                                        <p>Address: <strong class="badge bg-secondary badge-primary">{{ $user->address }}</strong></p>
                                        <p>Gender: <strong class="badge bg-secondary badge-primary">{{ $user->gender }}</strong></p>
                                        <p>Bio: <strong class="badge bg-secondary badge-primary">{{ $user->bio }}</strong></p>
                                        <p>Member On: <strong class="badge bg-secondary badge-primary">{{ $user->created_at->format('F d, Y') }}</strong></p>
                                        @if (!empty($user->resume))
                                            <p>Download resume: <strong class="badge bg-info badge-primary"><a class="text-white" target="_blank" href="{{ url('storage/'.$user->resume) }}"> Resume</a></strong></p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin.user.index') }}" class="btn btn-secondary mt-3">Back to Users List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
