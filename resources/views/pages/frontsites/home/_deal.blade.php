<section class="deal-section">
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
            <p class="section-title__tagline">Mereka yang telah akad</p>
            <h2 class="section-title__title">Sekarang giliran anda</h2>
        </div>
        <div class="row">
            <!--News One Single Start-->
            @foreach ($deals as $deal)
            <div class="col-xl-3 col-lg-3 wow fadeInLeft" data-wow-delay="100ms">
                <div class="news-one__single">
                    <div class="news-one__img-box">
                        <div class="news-one__img">
                            <img src="{{ asset('storage/' . $deal->image) }}" alt="{{ $deal->title }}" style="object-fit: cover; height: 250px; width: 100%;">
                        </div>
                    </div>
                    <div class="news-one__content">
                        <div class="news-one__content-top">
                            <p class="news-one__sub-title">Cabang {{ $deal->branch->title }}</p> <!-- Nama cabang -->
                            <h3 class="news-one__title">
                                <a href="{{ route('deals.detail', $deal->id) }}" style="color: inherit; text-decoration: none;">{{ $deal->title }}</a>
                            </h3>
                        </div>
                        <div class="news-one__person-and-date">
                            <div class="news-one__date">
                                <p><span class="icon-icon-calendar"></span>{{ $deal->created_at->format('M d, Y') }}</p> <!-- Tanggal dibuat -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
