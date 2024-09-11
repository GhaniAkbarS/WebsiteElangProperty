<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.frontsites.meta')


    @stack('before-style')
    @include('includes.frontsites.style')
    {{--ens style   --}}
    @stack('after-style')
</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>





    <div class="preloader">
        <div class="preloader__image"></div>
    </div>
    <!-- /.preloader -->


    <div class="page-wrapper">
        <x-front-nav-layout></x-front-nav-layout>

        {{-- MEMANGGIL INDEX BLADE  --}}
        {{ $slot ??'TIDAK ADA HALAMAN'  }}


    </div>
        <!--Appointment One End-->



        <!--CTA Two Start-->
        <section class="cta-two">
            <div class="container">
                <div class="cta-two__inner">
                    <div class="cta-two__shape-1 img-bounce">
                        <img src="assets/images/shapes/cta-two-shape-1.png" alt="">
                    </div>
                    <div class="cta-two__shape-2 float-bob-y">
                        <img src="assets/images/shapes/cta-two-shape-2.png" alt="">
                    </div>
                    <h3 class="cta-two__title">Ingin Pengajuan Kredit Syariah Tanpa Riba?
                        <br>Butuh Informasi Lebih lanjut?
                    </h3>
                    <form class="cta-two__form">
                        <div class="cta-two__input-box">
                            <button type="submit" class="cta-two__btn thm-btn-two">Segera Hubungi admin kami</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!--CTA Two End-->


        <!--Site Footer Start-->
        <footer class="site-footer-two">
            <div class="site-footer-two__shape-1 img-bounce">
                <img src="assets/images/shapes/site-footer-two-shape-1.png" alt="">
            </div>
            <div class="site-footer-two__shape-2 zoominout">
                <img src="assets/images/shapes/site-footer-two-shape-2.png" alt="">
            </div>
            <div class="container">
                <div class="site-footer-two__top">
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                            <div class="footer-widget-two__column footer-widget-two__about">
                                <div class="footer-widget-two__logo">
                                    <a href="index.html"><img src="assets/images/resources/footer-logo-2.png"
                                            alt=""></a>
                                </div>
                                <p class="footer-widget-two__about-text">Cosmo Terrace – Thamrin City Lantai 10 No. 1
                                    <br> Jl. K.H. Mas Mansyur, Kec. Tanah Abang,
                                    <br> Jakarta Pusat.
                                </p>
                                <div class="site-footer-two__social">
                                    <a href="#"><i class="fab fa-facebook"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                            <div class="footer-widget-two__column footer-widget-two__company">
                                <div class="footer-widget-two__title-box">
                                    <h3 class="footer-widget-two__title">Link Terkait</h3>
                                </div>
                                <ul class="footer-widget-two__company-list list-unstyled">
                                    <li><a href="business-planning.html">Syarat Pengajuan</a></li>
                                    <li><a href="tax-strategy.html">
                                        </a></li>
                                    <li><a href="financial-advices.html">Tentang Kami
                                        </a></li>
                                    <li><a href="insurance-strategy.html">Kredit Motor
                                        </a></li>
                                    <li><a href="insurance-strategy.html">Jasa Pembuatan Web
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                            <div class="footer-widget-two__column footer-widget-two__contact">
                                <div class="footer-widget-two__title-box">
                                    <h3 class="footer-widget-two__title">Hubungi Kami</h3>
                                </div>
                                <ul class="footer-widget-two__contact-list list-unstyled">

                                    <li>
                                        <div class="icon">
                                            <span class="icon-phone"></span>
                                        </div>
                                        <p><a href="tel:13330000000">+0822 6145 7575</a></p>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-envelope"></span>
                                        </div>
                                        <p><a href="mailto:example@email.com">elangproperty@gmail.com</a></p>
                                    </li>
                                </ul>
                                <div class="footer-widget-two__work-time">
                                    <div class="footer-widget-two__title-box">
                                        <h3 class="footer-widget-two__title">Jam Kerja</h3>
                                    </div>
                                    <p class="footer-widget-two__work-time-text">Senin - Sabtu: 08:00 AM - 5:00 PM
                                        <br> Tanggal Merah Libur</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="site-footer-two__bottom">
                <div class="container">
                    <div class="site-footer-two__bottom-inner">
                        <p class="site-footer__bottom-text">© Developed By Solusi Ummat. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </footer>
        <!--Site Footer End-->


    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="icon-right-arrow"></i></a>
{{-- klo ad berubah sebelum letak sini --}}
    @stack('before-style')
    @include('includes.frontsites.script')
    @stack('after-style')
    {{-- klo  --}}


</body>

</html>
