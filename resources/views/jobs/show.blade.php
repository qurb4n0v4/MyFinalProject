@extends('layouts.app')
@section('content')

    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Contact
                    </h1>
                    <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="about-us.html"> Contact</a></p>
                </div>
            </div>
        </div>
    </section>
    <div style="height: 94px;"></div>
    <div class="unit-5 overlay" style="background-image: url({{ asset('external/images/hero_2.jpg') }});">
        <div class="container text-center">
            <h1 class="mb-0" style="    color: #fff;
    font-size: 1.5rem;">{{$job->title}}</h1>
            <p class="mb-0 unit-6"><a href="/">Home</a> <span class="sep"> > <a href="{{ route('alljobs') }}">Jobs</a> </span> <span><span class="sep m-0"> ></span> Job details</span></p>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if (Session::has('jobmsg'))
                        <div class="p-2 bg-white mb-2">
                            <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
                                <strong>That's Awesome !</strong> {{ Session::get('jobmsg') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>

                        </div>

                    @endif

                    @if (Session::has('error_msg'))
                        <div class="p-2 bg-white mb-2">
                            <div class="alert alert-danger mt-3 alert-dismissible fade show" role="alert">
                                <strong>Error !</strong> {{ Session::get('error_msg') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>

                        </div>

                    @endif

                    @if (isset($errors) && count($errors) > 0)
                        <div class="p-2 bg-white mb-2">
                            <div class="alert alert-danger mt-3 alert-dismissible fade show" role="alert">
                                <ul>
                                    @foreach ($errors->all() as  $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>

                        </div>
                    @endif


                </div>
            </div>
            <div class="row">

                <div class="col-md-12 col-lg-8 mb-5">



                    <div class="p-5 bg-white">

                        <div class="mb-4 mb-md-4 mr-5">
                            <div class="job-post-item-header d-flex align-items-center">
                                <h2 class="mr-3 text-black h4">{{$job->position}}</h2>
                                <div class="badge-wrap">
                                    <span class="border border-warning text-warning py-2 px-4 rounded">{{Str::ucfirst($job->type)}}</span>
                                    <span class="border ml-3 bg-primary border-primary text-white py-2 px-4 rounded"><a href="#"data-toggle="modal" data-target="#recomend-job-modal"><i class="icon-envelope-o" style="font-size: 20px;color:#fff"></i></a></span>
                                </div>
                            </div>
                            <div class="job-post-item-body d-block d-md-flex">
                                <div class="mr-3"><span class="fl-bigmug-line-portfolio23"></span> <a href="#">Office address:</a></div>
                                <div><span class="fl-bigmug-line-big104"></span> <span>{{$job->address}}</span></div>
                            </div>
                        </div>



                        <div class=" mb-8 bg-white">
                            <!-- icon-book mr-3-->
                            <h3 class="h5 text-black mb-3"><i class="icon-library_books" style="color: #28a745;">&nbsp;</i>Description </a></h3>
                            <p> {{$job->description}}</p>

                        </div>

                        <div class=" mb-8 bg-white">
                            <!--icon-align-left mr-3-->
                            <h3 class="h5 text-black mb-3"><i class="icon-user" style="color: #28a745;">&nbsp;</i>Roles and Responsibilities</h3>
                            <p>{{$job->roles}} .</p>

                        </div>
                        <div class=" mb-8 bg-white">
                            <h3 class="h5 text-black mb-3"><i class="icon-users" style="color: #28a745;">&nbsp;</i>Number of vacancy</h3>
                            <p>{{$job->number_of_vacancy }} Year of Experience.</p>

                        </div>
                        <div class=" mb-8 bg-white">
                            <h3 class="h5 text-black mb-3"><i class="icon-clock-o" style="color: #28a745;">&nbsp;</i>Experience</h3>
                            <p>{{$job->experience}}&nbsp;years</p>

                        </div>
                        <div class=" mb-8 bg-white">
                            <h3 class="h5 text-black mb-3"><i class="icon-genderless" style="color: #28a745;">&nbsp;</i>Gender</h3>
                            <p> {{  Str::ucfirst($job->gender)}}</p>

                        </div>
                        <div class=" mb-8 bg-white">
                            <h3 class="h5 text-black mb-3"><i class="icon-money" style="color: #28a745;">&nbsp;</i>Salary</h3>
                            <p>${{$job->salary}}</p>
                        </div>



                    </div>
                </div>

                <div class="col-lg-4">


                    <div class="p-4 mb-3 bg-white">
                        <h3 class="h5 text-black mb-3">Short Job Info</h3>
                        <p>Company name: {{$job->company->cname ?? ''}}</p>
                        <p>Address: {{$job->address}}</p>
                        <p>Employment Type: {{  Str::ucfirst($job->type)}}</p>
                        <p>Position: {{  Str::ucfirst($job->position)}}</p>
                        <p>Posted: {{$job->created_at->diffForHumans()}}</p>
                        <p>Last date to apply: {{ date('F d, Y', strtotime($job->last_date)) }}</p>

                        <p><a href="{{route('company.index',[$job->company->id,$job->company->slug])}}" class="btn btn-warning" style="width: 100%;">Visit Company Page</a></p>

                        @if (Auth::check() && Auth::user()->user_type=='seeker')
                            @if (!$job->checkApplication())
                                <p>
                                    <apply-component jobid={{ $job->id }}></apply-component>

                                </p>

                            @else
                                <p> <button type="button" class="w-100 text-black btn btn-warning " disabled>Already applied</button></p>
                            @endif

                            <p> <favorite-component :jobid={{$job->id}} :favorited={{ $job->checkSaved() ? 'true':'false' }}></favorite-component></p>



                        @endif

                        @if (!Auth::check() )

                            <p><a href="/register" class="btn btn-dark" style="width: 100%;">For apply need to Register/Login.</a></p>

                        @endif
                        {{-- <p><a href="#" class="btn btn-primary  py-2 px-4">Apply Job</a></p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>



    @if (count($jobRecommendation) > 0)


        <div class="site-section bg-light pt-0">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 block-16" data-aos="fade-up" data-aos-delay="200">
                        <div class="d-flex mb-0">
                            <h2 class="mb-5 h3 mb-0">Recommended Jobs</h2>
                            <div class="ml-auto mt-1"><a href="#" class="owl-custom-prev">Prev</a> / <a href="#" class="owl-custom-next">Next</a></div>
                        </div>

                        <div class="nonloop-block-16 owl-carousel">

                            @foreach ($jobRecommendation as $recommendJob)


                                <div class="border rounded p-4 bg-white">
                                    <h2 class="h5">{{ $recommendJob->title }}</h2>
                                    <p><span class="
                border rounded p-1 px-2
                @if($recommendJob->type =='fulltime')
                text-info  border-info
                @elseif($recommendJob->type =='partime')
                text-warning   border-warning
                @elseif($recommendJob->type =='temporary')
                text-danger   border-danger
                @elseif($recommendJob->type =='internship')
                text-dark   border-dark
                @endif

                ">{{Str::ucfirst($recommendJob->type)}}</span></p>
                                    <p>
                                        <span class="d-block"><span class="icon-suitcase"></span> {{ Str::limit($recommendJob->position, 30)}}</span>
                                        <span class="d-block"><span class="icon-room"></span> {{ Str::limit($recommendJob->address, 30)}}</span>
                                        <span class="d-block"><span class="icon-money mr-1"></span>Salary: ${{$recommendJob->salary}}</span>
                                    </p>
                                    <p class="mb-0">{{$recommendJob->roles}}</p>

                                    <a href="{{ route('job.show', [$recommendJob->id, $recommendJob->slug]) }}"><button class="btn btn-success btn-sm mt-4">Apply this Job</button></a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
