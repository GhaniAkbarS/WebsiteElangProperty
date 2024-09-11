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

        <!--FAQ Two Start-->
        <section class="faq-two">
            <div class="faq-two__shape-1 float-bob-y">
                <img src="assets/images/shapes/faq-two-shape-1.png" alt="">
            </div>
            <div class="faq-two__shape-2 img-bounce">
                <img src="assets/images/shapes/faq-two-shape-2.png" alt="">
            </div>
            <div class="container">
                <div class="faq-two__inner">
                    <h3 class="section__title-two">Frequently asked questions</h3>
                    <div class="accrodion-grp" data-grp-name="faq-two-accrodion">
                        <div class="accrodion">
                            <div class="accrodion-title">
                                <h4>Siapa ustadz yang menjadi rujukan Elang Property Indonesia?</h4>
                            </div>
                            <div class="accrodion-content">
                                <div class="inner">
                                    <p>Elang Property Indonesia dalam melaksanakan kegiatannya
                                        tentunya senantiasa berlandaskan hukum Islam
                                        yang bersumber dari Alquran dan Hadits.
                                        Dalam pelaksanaan kegiatannya, Elang Property
                                        sering mengambil pendapat dan fatwa dari
                                        Ustadz Dr. Erwandi Tarmizi, MA yakni seorang ahli fikih
                                        muamalah di Indonesia. Namun Elang Property tidak secara
                                        langsung menjadikan beliau sebagai pengurus, pemegang saham,
                                        maupun Dewan Syariah secara resmi, karena dalam operasionalnya,
                                        Elang Property Indonesia tidak ingin menjual nama ustadz
                                        dalam kegiatan usaha. Elang Property Indonesia berusaha
                                        menghadirkan solusi bagi Kaum Muslimin akan transaksi yang
                                        bebas riba dengan merujuk pada pandangan Ulama Kontemporer
                                        yang bisa dijadikan landasan operasional.. </p>
                                </div><!-- /.inner -->
                            </div>
                        </div>
                        <div class="accrodion  active">
                            <div class="accrodion-title">
                                <h4>Apa Badan Hukum Dari Elang Propery Indonesia?</h4>
                            </div>
                            <div class="accrodion-content">
                                <div class="inner">
                                    <p>Elang Property Indonesia adalah produk dari Koperasi Konsumen Elang Property Indonesia</p>
                                    <div class="table-responsive mt-5">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <th>Badan Hukum</th>
                                                    <td>:</td>
                                                    <td>Koperasi Primer Nasional </td>
                                                </tr>
                                                <tr>
                                                    <th>Nama Lengkap</th>
                                                    <td>:</td>
                                                    <td>Koperasi Konsumen Elang Property Indonesia</td>
                                                </tr>
                                                <tr>
                                                    <th>Akta Pendirian</th>
                                                    <td>:</td>
                                                    <td>No.7 oleh Notaris Zulhendrawan S.H., S.E., M.Kn</td>
                                                </tr>
                                                <tr>
                                                    <th>Pengesahan Oleh</th>
                                                    <td>:</td>
                                                    <td>Menteri Hukum dan Hak Azazi Manusia</td>
                                                </tr>
                                                <tr>
                                                    <th>Nomor Pengesahan</th>
                                                    <td>:</td>
                                                    <td>AHU-0004779.AH.04.29</td>
                                                </tr>
                                                <tr>
                                                    <th>Nomor NIB</th>
                                                    <td>:</td>
                                                    <td>1309220059934</td>
                                                </tr>
                                                <tr>
                                                    <th>Nomor Induk Koperasi</th>
                                                    <td>:</td>
                                                    <td>1471110020069</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- /.inner -->
                            </div>

                        </div>
                        <div class="accrodion">
                            <div class="accrodion-title">
                                <h4>Apa hubungan Elang Property Indonesia dengan Elang Property (Elang Gumilang) ?</h4>
                            </div>
                            <div class="accrodion-content">
                                <div class="inner">
                                    <p>Elang Property Indonesia tidak ada hubungan dengan
                                        Elang Property (Elang Gumilang), dimana Elang Property Indonesia
                                        merupakan konsultan Kredit Syariah yang tidak membuat proyek
                                        secara langsung dan tidak membangun perumahan,
                                        Elang Property Indonesia dalam kegiatannya bekerjasama
                                        dengan berbagai Lembaga Keuangan Syariah, untuk melayani
                                        kebutuhan masyarakat mendapatkan pembiayaan secara halal.</p>
                                </div><!-- /.inner -->
                            </div>
                        </div>
                        <div class="accrodion">
                            <div class="accrodion-title">
                                <h4>Bagaimana skema pengajuan melalui Elang Property Indonesia?</h4>
                            </div>
                            <div class="accrodion-content">
                                <<div class="inner">
                                    <p>Elang Property Indonesia adalah badan usaha koperasi yang berusaha mewujudkan akad yang
                                        sesuai syariat
                                        bagi Kaum Muslimin. Dalam pelaksanaan kegiatan operasionalnya, di mana akad yang
                                        dilaksanakan dengan
                                        komponen sebagai berikut:</p>
                                    <ul>
                                        <li>Murni Jual Beli</li>
                                        <li>Jelas Serah Terima Barangnya</li>
                                        <li>Tanpa Pasal Denda</li>
                                        <li>Tanpa Biaya Asuransi</li>
                                    </ul>
                                </div><!-- /.inner -->
                            </div>
                        </div>
                        <div class="accrodion">
                            <div class="accrodion-title">
                                <h4>Lembaga Keuangan mana yang bekerjasama dengan Elang Property Indonesia?</h4>
                            </div>
                            <div class="accrodion-content">
                                <div class="inner">
                                    <p>Saat ini Elang Property Indonesia juga melaksanakan
                                        kerjasama dengan beberapa Lembaga Keuangan Syariah
                                        yang memiliki kesamaan visi dalam mewujudkan jual
                                        beli yang halal bagi konsumen..</p>
                                </div><!-- /.inner -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--FAQ Two End-->

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
