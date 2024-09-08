<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <!-- Profile content here -->
    <div class="card">
        <div class="card-header">
            Your Profile
        </div>
        <div class="card-body">
            <p>Name:  <strong class="badge bg-secondary badge-primary">{{ Auth::user()->name }}</strong></p>
            <p>Email: <strong class="badge bg-secondary badge-primary">{{ Auth::user()->email }}</strong></p>
            <p>Address: <strong class="badge bg-secondary badge-primary">{{ Auth::user()->address }}</strong></p>
            <p>Gender: <strong class="badge bg-secondary badge-primary">{{ Auth::user()->gender }}</strong></p>
            <p>Bio: <strong class="badge bg-secondary badge-primary">{{ Auth::user()->bio }}</strong></p>
            <p>Member On: <strong class="badge bg-secondary badge-primary">{{ date('F d Y', strtotime(Auth::user()->created_at)) }}</strong></p>
            @if (!empty(Auth::guard('web')->user()->resume))
                <p>Download resume: <strong class="badge bg-info badge-primary"><a class="text-white" target="_blank" href="{{ url('storage/'.Auth::guard('web')->user()->resume) }}"> Resume</a></strong></p>
            @endif
        </div>
    </div>
</div>
