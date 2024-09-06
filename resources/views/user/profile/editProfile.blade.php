{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--    <div style="height: 95px;"></div>--}}
{{--    <div class="unit-5 overlay" style="background-image: url({{ asset('external/images/hero_2.jpg') }})">--}}
{{--        <div class="container text-center">--}}
{{--            <h1 class="mb-0" style="color: #fff; font-size: 2.5rem;">Profile</h1>--}}
{{--            <p class="mb-0 unit-6">--}}
{{--                <a href="/">Home</a>--}}
{{--                <span class="sep"> > </span>--}}
{{--                <a href="{{ route('user.jobs.index') }}">Jobs</a>--}}
{{--                <span class="sep"> > </span>{{ Auth::user()->name }}--}}

{{--            </p>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="site-section bg-light">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-8">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header">--}}
{{--                            Update your profile--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <form action="{{ route('user.updateProfile') }}" method="POST" enctype="multipart/form-data">--}}
{{--                                @csrf--}}
{{--                                @method('PUT')--}}

{{--                                <div class="form-group">--}}
{{--                                    <label for="address">Address</label>--}}
{{--                                    <input type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address', Auth::user()->address) }}">--}}
{{--                                    @if ($errors->has('address'))--}}
{{--                                        <div style="color:red">--}}
{{--                                            <p class="mb-0">{{ $errors->first('address') }}</p>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                </div>--}}

{{--                                <div class="form-group mt-3">--}}
{{--                                    <label for="phone">Phone number</label>--}}
{{--                                    <input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone', Auth::user()->phone) }}">--}}
{{--                                    @if ($errors->has('phone'))--}}
{{--                                        <div style="color:red">--}}
{{--                                            <p class="mb-0">{{ $errors->first('phone') }}</p>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                </div>--}}

{{--                                <div class="form-group mt-3">--}}
{{--                                    <label for="bio">Bio</label>--}}
{{--                                    <textarea name="bio" id="bio" style="height: 120px" class="form-control{{ $errors->has('bio') ? ' is-invalid' : '' }}" cols="30" rows="10">{{ old('bio', Auth::user()->bio) }}</textarea>--}}
{{--                                    @if ($errors->has('bio'))--}}
{{--                                        <div style="color:red">--}}
{{--                                            <p class="mb-0">{{ $errors->first('bio') }}</p>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                </div>--}}

{{--                                <div class="form-group mt-3">--}}
{{--                                    <button class="btn btn-success">Update</button>--}}
{{--                                </div>--}}

{{--                                @if (Session::has('message'))--}}
{{--                                    <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">--}}
{{--                                        <strong>Wow awesome!</strong> {{ Session::get('message') }}--}}
{{--                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-md-4">--}}
{{--                    <form action="{{ route('user.updatePicture') }}" method="POST" enctype="multipart/form-data">--}}
{{--                        @csrf--}}
{{--                        @method('PUT')--}}

{{--                        <div class="card">--}}
{{--                            <div class="card-header mb-3">--}}
{{--                                Avatar--}}
{{--                            </div>--}}
{{--                            @if (!empty(Auth::guard('web')->user()->profile_photo))--}}
{{--                                <img src="{{ asset('uploads/avatar') }}/{{ Auth::user()->profile_photo }}" style="width:100px; height:100px; border-radius:100px; object-fit: cover; margin:0px auto" class="border mb-3" alt="">--}}
{{--                            @else--}}
{{--                                <img src="https://i.pravatar.cc/150" style="width:100px; border-radius:100px; margin:0px auto" class="border mb-3" alt="">--}}
{{--                            @endif--}}
{{--                            <div class="card-body p-0 text-center">--}}
{{--                                <input type="file" class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar">--}}
{{--                                <button class="btn btn-success w-100 mt-3">Update</button>--}}
{{--                                @if ($errors->has('avatar'))--}}
{{--                                    <div style="color:red">--}}
{{--                                        <p class="mb-0">{{ $errors->first('avatar') }}</p>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                                @if (Session::has('avatar'))--}}
{{--                                    <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">--}}
{{--                                        {{ Session::get('avatar') }}--}}
{{--                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}



{{--                    <form action="{{ route('user.updatePicture') }}" method="POST" enctype="multipart/form-data">--}}
{{--                        @csrf--}}
{{--                        @method('PUT')--}}

{{--                        <div class="card">--}}
{{--                            <div class="card-header mb-3">--}}
{{--                                Avatar--}}
{{--                            </div>--}}
{{--                            @if (!empty(Auth::guard('web')->user()->profile_photo))--}}
{{--                                <img src="{{ asset('storage') }}/{{ Auth::user()->profile_photo }}" style="width:100px; height:100px; border-radius:100px; object-fit: cover; margin:0px auto" class="border mb-3" alt="">--}}
{{--                            @else--}}
{{--                                <img src="https://i.pravatar.cc/150" style="width:100px; border-radius:100px; margin:0px auto" class="border mb-3" alt="">--}}
{{--                            @endif--}}
{{--                            <div class="card-body p-0 text-center">--}}
{{--                                <input type="file" class="form-control{{ $errors->has('profile_picture') ? ' is-invalid' : '' }}" name="profile_picture">--}}
{{--                                <button class="btn btn-success w-100 mt-3">Update</button>--}}
{{--                                @if ($errors->has('profile_picture'))--}}
{{--                                    <div style="color:red">--}}
{{--                                        <p class="mb-0">{{ $errors->first('profile_picture') }}</p>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                                @if (Session::has('avatar'))--}}
{{--                                    <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">--}}
{{--                                        {{ Session::get('avatar') }}--}}
{{--                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}



{{--                    <div class="card mt-3">--}}
{{--                        <div class="card-header">--}}
{{--                            Your info--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <p>Name:  <strong class="badge bg-secondary badge-primary">{{ Auth::user()->name }}</strong></p>--}}
{{--                            <p>Email: <strong class="badge bg-secondary badge-primary">{{ Auth::user()->email }}</strong></p>--}}
{{--                            <p>Phone number: <strong class="badge bg-secondary badge-primary">{{ Auth::user()->phone }}</strong></p>--}}
{{--                            <p>Address: <strong class="badge bg-secondary badge-primary">{{ Auth::user()->address }}</strong></p>--}}
{{--                            <p>Gender: <strong class="badge bg-secondary badge-primary">{{ Auth::user()->gender }}</strong></p>--}}
{{--                            <p>Bio: <strong class="badge bg-secondary badge-primary">{{ Auth::user()->bio }}</strong></p>--}}
{{--                            <p>Member On: <strong class="badge bg-secondary badge-primary">{{ date('F d Y', strtotime(Auth::user()->created_at)) }}</strong></p>--}}
{{--                            @if (!empty(Auth::guard('web')->user()->resume))--}}
{{--                                <p>Download resume: <strong class="badge bg-info badge-primary"><a class="text-white" target="_blank" href="{{ url('storage/'.Auth::guard('web')->user()->resume) }}"> Resume</a></strong></p>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <form action="" method="POST" enctype="multipart/form-data">--}}
{{--                        @csrf--}}
{{--                        <div class="card mt-3">--}}
{{--                            <div class="card-header">--}}
{{--                                Update Cover Letter--}}
{{--                            </div>--}}
{{--                            <div class="card-body">--}}
{{--                                <input type="file" class="form-control{{ $errors->has('cover_letter') ? ' is-invalid' : '' }}" name="cover_letter">--}}
{{--                                <button class="btn btn-success mt-3">Update</button>--}}
{{--                                @if (Session::has('coverletter'))--}}
{{--                                    <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">--}}
{{--                                        <strong>Wow!</strong> {{ Session::get('coverletter') }}--}}
{{--                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                                @if ($errors->has('cover_letter'))--}}
{{--                                    <div style="color:red">--}}
{{--                                        <p class="mb-0">{{ $errors->first('cover_letter') }}</p>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}

{{--                    <form action="" method="POST" enctype="multipart/form-data">--}}
{{--                        @csrf--}}
{{--                        <div class="card mt-3">--}}
{{--                            <div class="card-header">--}}
{{--                                Update Resume--}}
{{--                            </div>--}}
{{--                            <div class="card-body">--}}
{{--                                <input type="file" class="form-control{{ $errors->has('resume') ? ' is-invalid' : '' }}" name="resume">--}}
{{--                                <button class="btn btn-success mt-3">Update</button>--}}
{{--                                @if (Session::has('resume'))--}}
{{--                                    <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">--}}
{{--                                        <strong>Wow!</strong> {{ Session::get('resume') }}--}}
{{--                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                                @if ($errors->has('resume'))--}}
{{--                                    <div style="color:red">--}}
{{--                                        <p class="mb-0">{{ $errors->first('resume') }}</p>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}

{{--                    <div class="card mt-3">--}}
{{--                        <div class="card-body">--}}
{{--                            <form action="{{ route('logout') }}" method="POST">--}}
{{--                                @csrf--}}
{{--                                <button class="btn btn-danger w-100">Logout</button>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}







    <!-- Edit Profile Tab -->
    <div class="tab-pane fade" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab">
        <div class="card">
            <div class="card-header">
                Update your profile
            </div>
            <div class="card-body">
                <form action="{{ route('user.updateProfile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Form fields for editing profile -->
                    <!-- Similar to what you have -->
                    <div class="form-group mt-3">
                        <button class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


