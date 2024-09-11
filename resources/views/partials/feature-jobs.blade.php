<section class="job-listing-area bg-light mt-5" id="jobs">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content col-lg-12">
                <div class="title text-center">
                    <h1 class="mb-10">Available Job Listings</h1>
                    <p>Explore the latest job openings in various industries.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- İş Kartları -->
            @foreach($jobs as $job)
                <div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center">
                    <div class="single-job-card">
                        <div class="job-card-header">
                            <a href="#" class="save-job-icon" data-job-id="{{ $job->id }}">
                                @if(Auth::check())
                                    <i class="fa{{ Auth::user()->savedJobs->contains($job->id) ? '-solid' : '-regular' }} fa-bookmark"></i>
                                @else
                                    <i class="fa-regular fa-bookmark"></i>
                                @endif
                            </a>
                        </div>
                        <div class="job-card-content">
                            <h3>{{ $job->title }}</h3>
                            <p class="job-description">{{ $job->description }}</p>
                            <div class="job-info d-flex justify-content-between">
                                <span class="salary"><i class="fa-solid fa-manat-sign"></i> {{ $job->salary }}</span>
                                <span class="job-type">{{ $job->job_type }}</span>
                            </div>
                            <p class="apply-deadline"><i class="fa-solid fa-clock deadline-icon"></i> {{ $job->application_deadline }}</p>
                        </div>
                        <div class="job-card-footer w-100">
                            <div class="company-info d-flex gap-3">
                                <img src="{{ $job->company->logo ? asset('storage/companyUploads/' . $job->company->logo) : asset('storage/companyUploads/1725801087.jpg') }}" width="20" height="20" alt="Logo" class="img-fluid">
                                <a href="#" class="company-name">{{ $job->company->name }}</a>
                            </div>
                            <a href="" class="apply-job-btn">Apply Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row d-flex justify-content-center mt-5">
            <a href="{{ route('categories.index') }}" class="btn btn-primary">View all >></a>
        </div>
    </div>
    <script>
        document.querySelectorAll('.save-job-icon').forEach(function(bookmarkIcon) {
            bookmarkIcon.addEventListener('click', function(event) {
                event.preventDefault();
                let icon = this.querySelector('i');
                let jobId = this.getAttribute('data-job-id');
                let url = icon.classList.contains('fa-regular')
                    ? `/jobs/save/${jobId}`
                    : `/jobs/unsave/${jobId}`;

                fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data.message);
                        if (icon.classList.contains('fa-regular')) {
                            icon.classList.remove('fa-regular');
                            icon.classList.add('fa-solid');
                        } else {
                            icon.classList.remove('fa-solid');
                            icon.classList.add('fa-regular');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    </script>
</section>
