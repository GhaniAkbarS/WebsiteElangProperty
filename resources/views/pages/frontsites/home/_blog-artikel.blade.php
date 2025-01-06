<x-front-app-layout>
    <div class="content-wrapper  js-content-wrapper ">
        {{-- <section data-anim="fade" class="breadcrumbs ">
            <div class="container">
                <div class="row">
                    <div class="col-auto">
                        <div class="breadcrumbs__content">
                            <div class="breadcrumbs__item ">
                                <a href="{{ url('/') }}">Beranda</a>
                            </div>
                            <div class="breadcrumbs__item ">
                                <a href="https://elangmotor.com/akad">Akad</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <section class="page-header -type-1">
            <div class="container">
                <div class="page-header__content" style="display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; height: 10vh;">
                    <div class="row">
                        <div class="col-auto">
                            <div data-anim="slide-up delay-1">
                                <h1 class="page-header__title">Daftar Akad Properti</h1>
                            </div>
                            <div data-anim="slide-up delay-2">
                                <p class="page-header__text">Menjadi pilihan utama masyarakat untuk kredit motor Honda dan Yamaha.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row">
                <!--News One Single Start-->
                @foreach ($blogs as $blog)
                    <div class="col-xl-3 col-lg-3 wow fadeInLeft" data-wow-delay="100ms">
                        <div class="news-one__single">
                            <div class="news-one__img-box">
                                <div class="news-one__img">
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}"
                                        style="object-fit: cover; height: 250px; width: 100%;">
                                </div>
                            </div>
                            <div class="news-one__content">
                                <div class="news-one__content-top">
                                    <p class="news-one__sub-title"> {{ $blog->category->title }}</p>
                                    <h3 class="news-one__title">
                                        <a href="{{ route('blogs.detail', ['category' => $blog->category->slug, 'slug' => $blog->slug]) }}"
                                            style="color: inherit; text-decoration: none;">
                                            {{ $blog->title }}
                                        </a>
                                    </h3>
                                </div>
                                <div class="news-one__person-and-date">
                                    <div class="news-one__date">
                                        <p><span
                                                class="icon-icon-calendar"></span>{{ $blog->created_at->format('M d, Y') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <!-- Pagination -->
                <div class="col-12">
                    {{ $blogs->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</x-front-app-layout>
