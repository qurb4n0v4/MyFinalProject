<style>
    .btn-primary {
        background-color: rgba(27, 141, 191, 0.5); /* Hafif yeşil ton */
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        border: none;
        font-size: 16px;
        transition: background-color 0.3s ease, transform 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Hafif gölge */
    }

    .btn-primary:hover {
        background-color: rgba(27, 117, 191, 0.5); /* Hover için biraz daha koyu yeşil */
        transform: scale(1.05); /* Hafif büyüme efekti */
        text-decoration: none; /* Link alt çizgisini kaldır */
    }

    .btn-primary:focus {
        outline: none; /* Buton etrafındaki default mavi kenarlığı kaldır */
        box-shadow: 0 0 0 3px rgba(57, 90, 122, 0.45); /* Fokus için yeşil tonlu gölge */
    }
</style>
<section id="category" class="feature-cat-area pt-100">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-60 col-lg-10">
                <div class="title text-center">
                    <h1 class="mb-10">Featured Job Categories</h1>
                    <p>Who are in extremely love with eco friendly system.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse($categories as $category)
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-fcat">
                        <a href="{{ route('categories.show', $category->id) }}">
                            <img src="{{ asset('storage/adminUploads/category' . $category->image) }}" alt="{{ $category->name }}">
                        </a>
                        <p>{{ $category->name }}</p>
                    </div>
                </div>
            @empty
                <p>No categories available.</p>
            @endforelse
        </div>
        <div class="row d-flex justify-content-center mt-5">
            <a href="{{ route('categories.index') }}" class="btn btn-primary">View All >></a>
        </div>
    </div>
</section>


