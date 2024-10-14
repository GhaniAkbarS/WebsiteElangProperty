<!-- Blog Section Start -->
<section class="blog-section">
    <div class="news-one__shape-1 img-bounce">
        <img src="assets/images/shapes/news-one-shape-1.png" alt="">
    </div>
    <div class="news-one__shape-2 float-bob-y">
        <img src="assets/images/shapes/news-one-shape-2.png" alt="">
    </div>
    <div class="news-one__shape-3 rotate-me">
        <img src="assets/images/shapes/news-one-shape-3.png" alt="">
    </div>
    <div class="container">
        <div class="section-title text-center">
            <p class="section-title__tagline">Blog</p>
            <h2 class="section-title__title">Informasi .</h2>
        </div>
        <div class="row">
            @forelse($blogs as $blog)
            <div class="col-xl-4 col-lg-4 wow fadeInLeft" data-wow-delay="100ms">
                <div class="news-one__single">
                    <div class="news-one__img-box">
                        <div class="news-one__img">
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->category->title }}">
                        </div>
                        <div class="news-one__category">
                            <p>{{ $blog->category->name }}</p> <!-- Menampilkan nama kategori -->
                        </div>
                    </div>
                    <div class="news-one__content">
                        <div class="news-one__content-top">
                            <p class="news-one__sub-title">{{ $blog->category->name }}</p>
                            <h3 class="news-one__title">
                                <a href="/blog/{{ $blog->id }}">{{ $blog->title }}</a> <!-- Langsung menggunakan URL -->
                            </h3>
                            <p class="news-one__text">
                                {!! str_replace('!!', '', \Illuminate\Support\Str::limit($blog->content, 100, '...')) !!}
                            </p> <!-- Hilangkan tanda !! -->
                        </div>
                        <div class="news-one__person-and-date">
                            <div class="news-one__date">
                                <p><span class="icon-icon-calendar"></span>{{ $blog->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <p>Tidak ada blog yang tersedia.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
<!-- Blog Section End -->
