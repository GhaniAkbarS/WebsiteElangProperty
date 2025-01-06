<x-front-app-layout>
    <body class="custom-cursor">

        <div class="page-wrapper">


            <!--Page Header Start-->
            <section class="page-header">
                <div class="page-header__bg" style="background-image: url({{ asset('storage/' . $deal->image) }});">
                </div>
                <div class="container">
                    <div class="page-header__inner">
                        <!-- Tampilkan Judul dari Deal -->
                        <h2>{{ $deal->title }}</h2>

                        <!-- Breadcrumb -->
                        <ul class="thm-breadcrumb list-unstyled">
                            <li><a href="{{ url('/') }}">Beranda</a></li>
                            <li><span class="icon-down-arrow"></span></li>
                            <li>{{ $deal->title }}</li>
                        </ul>
                    </div>
                </div>
            </section>
            <!--Page Header End-->

            <!--Team Five Start-->
            <section class="team-five">
                <div class="container">
                    <h3 class="team-five__title">Daftar Foto Akad</h3>
                    <div class="row">
                        @forelse ($deal->photos as $photo)
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                            <div class="team-one__single">
                                <div class="team-one__img-box">
                                    <div class="team-one__img">
                                        <!-- Menampilkan Foto -->
                                        <img src="{{ asset('storage/' . $photo->image) }}"
                                             alt="Foto Akad"
                                             class="img-thumbnail"
                                             style="max-height: 200px; object-fit: cover;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <p class="text-center">Belum ada foto akad yang diunggah.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </section>

            <!--Team Five End-->

            <!--Team Details Start-->
            <section class="team-details">
                <div class="container">
                    <div class="team-details__inner">
                        <div class="row">
                            <div class="col-xl-5 col-lg-5">
                                <div class="team-details__left">
                                    <div class="team-details__img">
                                        <img src="{{ asset('storage/' . $deal->image) }}" alt="Thumbnail Deal">
                                    </div>
                                        <div class="team-details__contact-box">
                                            <h3 class="team-details__contact-title">Akses Cepat</h3>
                                            <ul class="team-details__contact-list list-unstyled">
                                                <li>
                                                    <div class="icon">
                                                        <span class="icon-envelope"></span>
                                                    </div>
                                                    <p><a href="mailto:example@email.com">elangproperty@gmail.com </a></p>
                                                </li>
                                                <li>
                                                    <div class="icon">
                                                        <span class="icon-telephone"></span>
                                                    </div>
                                                    <p><a href="tel:+13330000000">+1(333) 000-0000</a></p>
                                                </li>
                                                <li>
                                                    <div class="icon">
                                                        <span class="icon-location11"></span>
                                                    </div>
                                                    <p>Cosmo Terrace Thamrin City, Jakarta Pusat</p>
                                                </li>
                                            </ul>
                                            <div class="team-details__social">
                                                <a href="#"><i class="fab fa-facebook"></i></a>
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                                <a href="#"><i class="fab fa-instagram"></i></a>
                                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-7">
                                <div class="team-details__right">
                                    <!-- Menampilkan Title Akad -->
                                    <h3 class="team-details__title-1">{{ $deal->title }}</h3>

                                    <!-- Menampilkan Nama Cabang dan Waktu Akad -->
                                    <p class="team-details__sub-title">
                                        <span class="icon-location-pin"></span> {{ $deal->branch->title }}
                                        &nbsp;|&nbsp; <!-- Untuk pemisah antara 2 span/ikon nya -->
                                        <span class="icon-clock"></span> {{ \Carbon\Carbon::parse($deal->akad_date)->format('d M Y, H:i') }}
                                    </p>

                                    <!-- Menampilkan Content Akad -->
                                    <p class="team-details__text-1">
                                        {{ $deal->content }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Team Details End-->


        </div><!-- /.page-wrapper -->

        <div class="search-popup">
            <div class="search-popup__overlay search-toggler"></div>
            <!-- /.search-popup__overlay -->
            <div class="search-popup__content">
                <form action="#">
                    <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
                    <input type="text" id="search" placeholder="Search Here..." />
                    <button type="submit" aria-label="search submit" class="thm-btn">
                        <i class="icon-magnifying-glass"></i>
                    </button>
                </form>
            </div>
            <!-- /.search-popup__content -->
        </div>
        <!-- /.search-popup -->

        <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="icon-right-arrow"></i></a>


        <script src="assets/vendors/jquery/jquery-3.6.0.min.js"></script>
        <script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendors/jarallax/jarallax.min.js"></script>
        <script src="assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
        <script src="assets/vendors/jquery-appear/jquery.appear.min.js"></script>
        <script src="assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
        <script src="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
        <script src="assets/vendors/jquery-validate/jquery.validate.min.js"></script>
        <script src="assets/vendors/odometer/odometer.min.js"></script>
        <script src="assets/vendors/swiper/swiper.min.js"></script>
        <script src="assets/vendors/wnumb/wNumb.min.js"></script>
        <script src="assets/vendors/wow/wow.js"></script>
        <script src="assets/vendors/isotope/isotope.js"></script>
        <script src="assets/vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="assets/vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
        <script src="assets/vendors/jquery-ui/jquery-ui.js"></script>
        <script src="assets/vendors/timepicker/timePicker.js"></script>
        <script src="assets/vendors/circleType/jquery.circleType.js"></script>
        <script src="assets/vendors/circleType/jquery.lettering.min.js"></script>

        <!-- template js -->
        <script src="assets/js/bixola.js"></script>
    </body>

</x-front-app-layout>
