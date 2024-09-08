<div class="tab-pane fade show active" id="edit-profile" role="tabpanel" aria-labelledby="profile-tab">
    <!-- Profile content here -->
    <div class="card">
        <div class="card-header">
            Edit Profile
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('user.updateProfile') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', Auth::user()->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', Auth::user()->email) }}" required>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" value="{{ old('address', Auth::user()->address) }}">
                </div>

                <div class="form-group py-2">
                    <label for="gender">Gender</label>
                    <select name="gender" class="form-control" id="gender">
                        <option value="" disabled>Select your gender</option>
                        <option value="male" {{ old('gender', Auth::user()->gender) == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender', Auth::user()->gender) == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ old('gender', Auth::user()->gender) == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="bio">Bio</label>
                    <textarea name="bio" class="form-control" rows="3">{{ old('bio', Auth::user()->bio) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="resume">Resume (URL)</label>
                    <input type="file" name="resume" class="form-control" value="{{ old('resume', Auth::user()->resume) }}">
                </div>

                <button type="submit" class="btn btn-success">Update Profile</button>
            </form>
        </div>
    </div>
</div>
