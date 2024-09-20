<!-- Main Sllider Start -->
<section class="main-slider">
    <div class="main-slider__carousel owl-carousel owl-theme thm-owl__carousel"
        data-owl-options='{"loop": true, "items": 1, "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"], "margin": 0, "dots": true, "nav": false, "animateOut": "slideOutDown", "animateIn": "fadeIn", "active": true, "smartSpeed": 1000, "autoplay": true, "autoplayTimeout": 7000, "autoplayHoverPause": false}'>

        @foreach ($slides as $slide)
        <div class="item main-slider__slide-{{ $loop->iteration }}">
            <div class="main-slider__bg" style="background-image: url({{ asset('storage/' . $slide->image) }});">
            </div><!-- /.slider-one__bg -->

            <div class="container">
                <div class="main-slider__content">
                    <h2 class="main-slider__title">{{ $slide->title }}</h2>
                    <p class="main-slider__text">{{ $slide->content }}</p>
                    <div class="main-slider__btn-and-video-box">
                        <div class="main-slider__btn-box">
                            <a href="{{ $slide->link ?? '#' }}" class="thm-btn main-slider__btn">Lihat Disini</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<!--Main Sllider Start -->
