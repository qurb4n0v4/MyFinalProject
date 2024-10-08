<style>
    .blogs-area {
        padding: 100px 0;
    }

    .single-blog {
        width: 100%; /* Tam genişlik */
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: left; /* Sol hizalama */
    }

    .single-blog img {
        width: 100%; /* Resim genişliği */
        height: auto; /* Orantılı yükseklik */
        max-width: 100%; /* Maksimum genişlik %100 */
        border-radius: 5px; /* Köşeleri yuvarlat */
    }

    .blog-info {
        margin-top: 15px;
        width: 100%; /* Bilgi kısmı tam genişlikte */
    }

    .blog-title {
        color: #000; /* Koyu siyah renk */
        font-size: 18px; /* Başlık font boyutu */
        font-weight: bold; /* Kalın yazı tipi */
        text-decoration: none; /* Link altını çizme */
    }

    .blog-title h4 {
        margin: 0; /* Üst ve alt boşluğu kaldır */
        max-width: 200px;
    }

    .publish-date {
        color: #888; /* Gri renk */
        font-size: 12px; /* Küçük font boyutu */
        font-weight: bold; /* Kalın yazı tipi */
        margin: 5px 0 10px; /* Üst ve alt boşluklar */
    }

    /* Responsive Styling */
    @media (max-width: 768px) {
        .blog-title {
            font-size: 16px; /* Küçük ekranlar için başlık font boyutu */
        }

        .publish-date {
            font-size: 10px; /* Küçük ekranlar için tarih font boyutu */
        }
    }
</style>
<section id="blog" class="blogs-area pt-100">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-12">
                <div class="row">
                    @foreach($blogs as $blog)
                        <div class="col-lg-4 col-md-6 d-flex justify-content-center">
                            <div class="single-blog">
                                <img src="{{ asset('img/' . $blog->featured_image) }}" alt="Blog Image">
                                <div class="blog-info">
                                    <p class="publish-date">{{ $blog->published_at ? $blog->published_at->format('M d, Y') : 'Date not available' }}</p>
                                    <a href="{{ route('blogs.show', $blog->id) }}" class="blog-title">
                                        <h4>{{ $blog->title }}</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-5">
            <a href="{{ route('blogs.index') }}" class="btn btn-primary">Read all blog posts >></a>
        </div>
    </div>
</section>
