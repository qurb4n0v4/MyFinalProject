<div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
    <!-- Settings content here -->
    <form action="{{ route('user.updatePicture') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header mb-3">
                Avatar
            </div>
            @if (Auth::user()->profile_photo)
                <img src="{{ asset('storage/userUploads/' . Auth::user()->profile_photo) }}" alt="Profile Picture" style="width:100px; height:100px; object-fit: cover; display: block; margin: 0 auto;">
            @else
                <img src="https://ps.w.org/user-avatar-reloaded/assets/icon-256x256.png?rev=2540745" alt="Default Profile Picture" style="width:100px; height:100px; display: block; margin: 0 auto;">
            @endif <br>
            <div class="card-body p-0 text-center">
                <input type="file" class="form-control{{ $errors->has('profile_picture') ? ' is-invalid' : '' }}" name="profile_picture">
                <button class="btn btn-success w-100 mt-3">Update</button>
                @if ($errors->has('profile_picture'))
                    <div style="color:red">
                        <p class="mb-0">{{ $errors->first('profile_picture') }}</p>
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
    </form>
</div>
