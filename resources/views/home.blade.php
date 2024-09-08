<style>
    .popular-post {
        bottom: -50px; /* Popüler postu banner'ın altına yerleştir */
        left: 50%; /* Sol kenardan %50 uzaklaştır */
        transform: translateX(-50%); /* Ortalamak için kaydır */
        width: 100%; /* Genişliği ayarla, istersen daha küçük de yapabilirsin */
        display: flex;
        justify-content: center; /* İçeriği yatayda merkezle */
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
