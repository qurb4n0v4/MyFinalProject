<style>
    .single-popular-post {
        min-height: 150px;
    }

    @media (max-width: 768px) {
        .single-popular-post {
            flex-direction: column;
            text-align: center;
        }

        .single-popular-post .thumb {
            margin-bottom: 15px;
        }

        .single-popular-post .thumb img {
            width: 100%;
            height: auto;
        }

        .single-popular-post .details h4 {
            font-size: 18px;
        }

        .single-popular-post .details p {
            font-size: 14px;
        }
    }

    @media (max-width: 576px) {
        .single-popular-post .details h4 {
            font-size: 16px;
        }

        .single-popular-post .details p {
            font-size: 12px;
        }
    }
</style>

<section class="popular-post-area pt-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="active-popular-post-carusel">
                @foreach($jobs as $job)
                <div class="single-popular-post d-flex flex-row">
                    <div class="details">
                        <a href="{{ route('jobs.show', $job->id) }}"><h4>{{ $job->title }}</h4></a> <!-- İş ilanı başlığı ve id ile bağlantı -->
                        <h6>{{ $job->location }}</h6>
                        <p>
                            {{ Str::limit($job->description, 150) }} <!-- İş açıklamasını göster, 150 karakter ile sınırla -->
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
