<style>
    .popular-post {
        bottom: -50px;
        left: 50%;
        transform: translateX(-50%);
        width: 100%;
        display: flex;
        justify-content: center;
    }
</style>
@extends('layouts.app')
@section('content')
    <div class="position-relative">
        @include('partials.banner')
        <div class="position-absolute popular-post">
            @include('partials.popular-post')
        </div>
    </div>
    @include('partials.feature-category')
    @include('partials.feature-jobs')
    @include('partials.how-we-work')
    @include('partials.testimonial')
    @include('partials.blogs')
    @include('partials.join-us')
@endsection
