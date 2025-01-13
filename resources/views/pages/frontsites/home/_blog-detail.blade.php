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
        <section class="page-header">
            <div class="container">
                <div class="page-header__inner">
                    <p class="news-one__sub-title">{{ $bloges->category->title }}</p>
                    <h2 style="color: rgb(255, 0, 0);">{{ $bloges->title }}</h2>
                    <p class="page-header__text">
                        {{ $bloges->created_at->format('d M Y') }}
                    </p>
                </div>
            </div>
        </section>
        <section class="news-details">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="news-details__left">
                            <div class="news-details__img">
                                <img src="{{ asset('storage/' . $bloges->image) }}" alt="Blog Image" class="img-fluid" style="max-width: 600px;">
                            </div>
                            <div class="news-details__author-and-meta">
                                <div class="news-details__meta">
                                    <p><span class="fas fa-calendar"></span>{{ $bloges->created_at->format('d M Y') }}</p>
                                    <p><span class="fas fa-tag"></span>{{ $bloges->category->title }}</p>
                                </div>
                            </div>
                            <h3 class="news-details__title-1">{{ $bloges->title }}</h3>
                            <p class="news-details__text-1">I believe in the power of design.</p>
                            <p class="news-details__text-2">{{$bloges->content}}</p>
                            <p class="news-details__text-3">Organizations that aspire to benefit humanity touch us. They
                                galvanize communities dedicated to good. Sometimes, they even launch extraordinary
                                movements.</p>
                            <div class="news-details__text-box">
                                <div class="news-details__quote">
                                    <span class="icon-quote11"></span>
                                </div>
                                <p>“We can easily manage if we will only take, each day, the burden appointed to it. But
                                    the load will be too heavy for us if we carry yesterday’s burden over again today,
                                    and then add the burden of the morrow.”</p>
                                <span>Bailey Dobson</span>
                            </div>
                            {{-- <h3 class="news-details__title-2">Discovering the power of purpose</h3>
                            <p class="news-details__text-4">It feels incredible to work for an organization focused on
                                solving a problem you deeply understand.</p>
                            <p class="news-details__text-5">When I first moved to Israel, I began working with an
                                organization that helps new immigrants find professional success by providing education
                                about the job market, courses, networking, and introductions to major companies. Our
                                goal was to create a new strategy and website that met their audience’s many needs.</p>
                            <p class="news-details__text-6">It is a long established fact that a reader will be
                                distracted by the readable content of a page when looking at its layout. The point of
                                using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as
                                opposed to using 'Content here, content here', making it look like readable English.
                                Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                                default model text, and a search for 'lorem ipsum' will uncover many web sites still in
                                their infancy.</p>
                            <div class="news-details__img-2">
                                <img src="assets/images/blog/news-details-img-2.jpg" alt="">
                            </div>
                            <h3 class="news-details__title-3">The power of designing for good</h3>
                            <p class="news-details__text-7">It feels incredible to work for an organization focused on
                                solving a problem you deeply understand.</p>
                            <p class="news-details__text-8">When I first moved to Israel, I began working with an
                                organization that helps new immigrants find professional success by providing education
                                about the job market, courses, networking, and introductions to major companies. Our
                                goal was to create a new strategy and website that met their audience’s many needs.</p>
                            <p class="news-details__text-9">It is a long established fact that a reader will be
                                distracted by the readable content of a page when looking at its layout. The point of
                                using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as
                                opposed to using 'Content here, content here', making it look like readable English.
                                Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                                default model text, and a search for 'lorem ipsum' will uncover many web sites still in
                                their infancy.</p>
                            <p class="news-details__text-10">And ever since then, we at Verticalloop have embraced our
                                mission to “design for good.”</p> --}}
                            <div class="news-details__tag-and-social">
                                <div class="news-details__tag">
                                    <span>Tags:</span>
                                    <a href="news-details.html">{{ $bloges->keyword }}</a>
                                </div>
                                <div class="news-details__social">
                                    <span>Share on:</span>
                                    <a href="#"><i class="fab fa-facebook"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="news-details__bottom">
                            <div class="news-details__comment-and-form">
                                <div class="comment-one">
                                    <h3 class="comment-one__title">3 Comments</h3>
                                    <div class="comment-one__single">
                                        <div class="comment-one__image">
                                            <img src="assets/images/blog/comment-1-1.jpg" alt="">
                                        </div>
                                        <div class="comment-one__content">
                                            <h3>Issac Wise</h3>
                                            <span>Jan 01, 2021at 2:14 pm</span>
                                            <p>Wouldn’t it be better practice to use get_the_title(..) in this case?
                                                directly accessing the post object’s data member would bypass applying
                                                filters and enforcing protected and private settings, unless that’s
                                                explicitly desired.</p>
                                        </div>
                                        <a href="news-details.html" class="comment-one__btn">Reply<span
                                                class="icon-right-arrow1"></span></a>
                                    </div>
                                    <div class="comment-one__single comment-one__single-2">
                                        <div class="comment-one__image">
                                            <img src="assets/images/blog/comment-1-2.jpg" alt="">
                                        </div>
                                        <div class="comment-one__content">
                                            <h3>Ellen Ibarra</h3>
                                            <span>October 13, 2020</span>
                                            <p>Thenks Demo User for Wouldn’t it be better practice to use get_the_title.
                                            </p>
                                        </div>
                                        <a href="news-details.html" class="comment-one__btn">Reply<span
                                                class="icon-right-arrow1"></span></a>
                                    </div>
                                    <div class="comment-one__single">
                                        <div class="comment-one__image">
                                            <img src="assets/images/blog/comment-1-3.jpg" alt="">
                                        </div>
                                        <div class="comment-one__content">
                                            <h3>Tisa Person</h3>
                                            <span>October 13, 2020</span>
                                            <p>Wouldn’t it be better practice to use get_the_title(..) in this case?
                                                directly accessing the post object’s data member would bypass applying
                                                filters and enforcing protected and private settings, unless that’s
                                                explicitly desired.</p>
                                        </div>
                                        <a href="news-details.html" class="comment-one__btn">Reply<span
                                                class="icon-right-arrow1"></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-form">
                                <h3 class="comment-form__title">Leave a Reply </h3>
                                <p class="comment-form__text">Your email address will not be published. Required fields
                                    are marked *</p>
                                <form action="assets/inc/sendemail.php" class="comment-one__form contact-form-validated"
                                    novalidate="novalidate">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="comment-form__input-box">
                                                <div class="comment-form__input-box-name">
                                                    <p>Full Name</p>
                                                </div>
                                                <input type="text" placeholder="Type here" name="name">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="comment-form__input-box">
                                                <div class="comment-form__input-box-name">
                                                    <p>Email Address</p>
                                                </div>
                                                <input type="email" placeholder="Email" name="email">
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="comment-form__input-box">
                                                <div class="comment-form__input-box-name">
                                                    <p>Website</p>
                                                </div>
                                                <input type="text" placeholder="Website (Optional)" name="website">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="comment-form__input-box text-message-box">
                                                <div class="comment-form__input-box-name">
                                                    <p>Comment type</p>
                                                </div>
                                                <textarea name="message" placeholder="Comment type..."></textarea>
                                            </div>
                                            <div class="checked-box">
                                                <input type="checkbox" name="skipper1" id="skipper" checked="">
                                                <label for="skipper"><span></span>Save my name, email, and website in
                                                    this browser
                                                    for the next time I comment.</label>
                                            </div>
                                            <div class="comment-form__btn-box">
                                                <button type="submit" class="comment-form__btn">Post Comment</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="result"></div>
                            </div>
                        </div> --}}
                        {{-- <h3 class="news-details__title-4">Related Posts</h3> --}}
                        {{-- <div class="row">
                            <div class="col-xl-6">
                                <div class="news-three__single">
                                    <div class="news-three__img-box">
                                        <div class="news-three__img">
                                            <img src="assets/images/blog/news-page-1-7.jpg" alt="">
                                        </div>
                                        <div class="news-three__date">
                                            <p>24 </p>
                                            <span>Sep 22</span>
                                        </div>
                                    </div>
                                    <div class="news-three__content">
                                        <ul class="news-three__meta list-unstyled">
                                            <li>
                                                <p><span class="icon-user"></span>Admin</p>
                                            </li>
                                            <li>
                                                <p><span class="icon-chat"></span>8 Comments</p>
                                            </li>
                                        </ul>
                                        <h3 class="news-three__title"><a href="news-details.html">We would love to share
                                                a similar experience</a></h3>
                                        <p class="news-three__text">Lorem Ipsum is simply dummy text of the printing
                                            and
                                            typesetting industry.</p>
                                        <div class="news-three__btn">
                                            <a href="news-details.html">Learn More<span
                                                    class="icon-right-arrow1"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="news-three__single">
                                    <div class="news-three__img-box">
                                        <div class="news-three__img">
                                            <img src="assets/images/blog/news-page-1-10.jpg" alt="">
                                        </div>
                                        <div class="news-three__date">
                                            <p>24 </p>
                                            <span>Sep 22</span>
                                        </div>
                                    </div>
                                    <div class="news-three__content">
                                        <ul class="news-three__meta list-unstyled">
                                            <li>
                                                <p><span class="icon-user"></span>Admin</p>
                                            </li>
                                            <li>
                                                <p><span class="icon-chat"></span>8 Comments</p>
                                            </li>
                                        </ul>
                                        <h3 class="news-three__title"><a href="news-details.html">Irure dolor in
                                                reprehenderit in voluptate velit esse</a></h3>
                                        <p class="news-three__text">Lorem Ipsum is simply dummy text of the printing
                                            and
                                            typesetting industry.</p>
                                        <div class="news-three__btn">
                                            <a href="news-details.html">Learn More<span
                                                    class="icon-right-arrow1"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="sidebar">
                            <div class="sidebar__single sidebar__post">
                                <div class="sidebar__title-box">
                                    <h3 class="sidebar__title">Recent Posts</h3>
                                </div>
                                <ul class="sidebar__post-list list-unstyled">
                                    @foreach ($blogs as $bloges)
                                    <li>
                                        <div class="sidebar__post-image">
                                            <img src="{{ asset('storage/' . $bloges->image) }}" alt="{{ $bloges->title }}">
                                        </div>
                                        <div class="sidebar__post-content">
                                            <h3 class="sidebar__post-title">
                                                <a href="{{ route('blogs.detail', [$bloges->category->slug, $bloges->slug]) }}">
                                                    {{ $bloges->title }}
                                                </a>
                                            </h3>
                                            <p class="sidebar__post-date">
                                                <span class="icon-time"></span> {{ $bloges->created_at->format('d M, Y') }}
                                            </p>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="sidebar__single sidebar__tag">
                                <div class="sidebar__title-box">
                                    <h3 class="sidebar__title">Tags</h3>
                                </div>
                                <div class="sidebar__tag-list">
                                    <a href="news-details.html">{{ $bloges->keyword }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-front-app-layout>
