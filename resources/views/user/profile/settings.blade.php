<div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
    <!-- Settings content here -->
    <form action="{{ route('user.updatePicture') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header mb-3">
                Avatar
            </div>
            @if (!empty(Auth::guard('web')->user()->profile_photo))
                <img src="{{ asset('uploads/avatar') }}/{{ Auth::user()->profile_photo }}" style="width:100px; height:100px; border-radius:100px; object-fit: cover; margin:0px auto" class="border mb-3" alt="">
            @else
                <img src="https://i.pravatar.cc/150" style="width:100px; border-radius:100px; margin:0px auto" class="border mb-3" alt="">
            @endif
            <div class="card-body p-0 text-center">
                <input type="file" class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar">
                <button class="btn btn-success w-100 mt-3">Update</button>
                @if ($errors->has('avatar'))
                    <div style="color:red">
                        <p class="mb-0">{{ $errors->first('avatar') }}</p>
                    </div>
                @endif
                @if (Session::has('avatar'))
                    <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
                        {{ Session::get('avatar') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
    </form>
</div>
