<!-- footer area start -->
<!-- <footer class="footer-area bg-blue-02 bg-image" {!! render_background_image_markup_by_attachment_id(get_static_option('site_footer_img')) !!}>
    <div class="footer-top padding-bottom-50 padding-top-80">
        <div class="container">
            <div class="row">
                {!! render_frontend_sidebar('footer', ['column' => true]) !!}
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-area-inner">
                    {!! render_footer_copyright_text() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer> -->
<style>
    .footer-widget {
        background-color: #333;
        padding: 20px;
        border-radius: 10px;
    }

    .widget_title {
        color: #fff;
        font-size: 18px;
        margin-bottom: 15px;
    }

    .media-style li {
        list-style: none;
        color: #fff;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .social-icons {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-top: 10px;
    }

    .social-icons a {
        display: inline-block;
        color: inherit;
    }

    .social-icons i {
        font-size: 28px;
        color: #fff;
        transition: all 0.3s ease;
    }

    .social-icons a img {
        width: 36px;
        height: 36px;
        transition: all 0.3s ease;
    }

    .social-icons i:hover,
    .social-icons a img:hover {
        transform: scale(1.1);
    }

    .social-icons a img {
        border-radius: 50%;
    }
</style>
<footer class="footer-wrapper footer-layout2">
    <div class="shap"><img src="https://html.kodesolution.com/2024/venture-html/assets/img/shap/dotts2.png"
            alt="">
    </div>
    <div class="shap3"><img src="https://html.kodesolution.com/2024/venture-html/assets/img/shap/shap4.png"
            alt="">
    </div>
    <div class="widget-area">
        <div class="container">
            <div class="row gx-0 gy-4">
                <div class="col-lg-4 widget-column pt-40">
                    <div class="widget footer-widget  ">
                        <div class="vs-widget-about">
                            <div class="footer-logo">
                                <img src="{{ asset('/@core/public/assets/uploads/media-uploader/logoOreantent.svg') }}"
                                    alt="logo">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 widget-column v3">
                    <div class="widget footer-widget widget_nav_menu">
                        <h3 class="widget_title light">{{ __('Useful Links') }}</h3>
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="289.000000pt" height="14.000000pt"
                            viewBox="0 0 289.000000 14.000000" preserveAspectRatio="xMidYMid meet">

                            <g transform="translate(0.000000,14.000000) scale(0.100000,-0.100000)" fill="#fff"
                                stroke="#fff">
                                <path d="M1800 94 c9  19 9 -30 0 -45 -19 -29 -15 -30 33 -7 25 12 45 25 45
                        28 0 3 -20 16 -45 28 l-44 21 11 -25z" />
                                <path d="M60 73 c349 -2 916 -2 1260 0 345 1 60 2 -633 2 -693 0 -975 -1
                        -627 -2z" />
                            </g>
                        </svg>

                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                <li class="{{ Request::is('/') ? 'current-menu-item' : '' }}">
                                    <a href="{{ url('/') }}">{{ __('Home') }}</a>
                                </li>
                                <li class="{{ Request::is('about-us') ? 'current-menu-item' : '' }}">
                                    <a href="{{ url('about-us') }}">{{ __('About Us') }}</a>
                                </li>
                                <li class="{{ Request::is('blog') ? 'current-menu-item' : '' }}">
                                    <a href="{{ url('blog') }}">{{ __('Blog') }}</a>
                                </li>
                                <li class="{{ Request::is('contact-us') ? 'current-menu-item' : '' }}">
                                    <a href="{{ url('contact-us') }}">{{ __('Contact Us') }}</a>
                                </li>
                                <li class="{{ Request::is('travel') ? 'current-menu-item' : '' }}">
                                    <a href="{{ url('travel') }}">{{ __('Travel') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 widget-column">
                    <div class="widget footer-widget">
                        <h3 class="widget_title light">{{ __('Get In Touch With Us') }}</h3>
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="289.000000pt" height="14.000000pt"
                            viewBox="0 0 289.000000 14.000000" preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0.000000,14.000000) scale(0.100000,-0.100000)" fill="#fff"
                                stroke="#fff">
                                <path
                                    d="M1800 94 c9 19 9 -30 0 -45 -19 -29 -15 -30 33 -7 25 12 45 25 45 28 0 3 -20 16 -45 28 l-44 21 11 -25z" />
                                <path d="M60 73 c349 -2 916 -2 1260 0 345 1 60 2 -633 2 -693 0 -975 -1 -627 -2z" />
                            </g>
                        </svg>

                        <div class="vs-widget-about">
                            <ul class="media-style">
                                <li><a href="#">{{__('Hurghada Sheraton Street')}}</a></li>
                                <li> <a href="https://wa.me/201013800463" target="_blank">+201013800463</a>, 
                                    <a href="https://wa.me/201040719557" target="_blank">+201040719557</a></li>
                                <li><a href="mailto:orantentravel@gmail.com">orantentravel@gmail.com</a></li>
                            </ul>
                            <br>

                            <!-- Social Media Icons -->
                            <div class="social-icons">
                                <a href="https://www.facebook.com/OrantenTravel"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://g.co/kgs/WtJSz7J"><i class="fab fa-google"></i></a>
                                <a href="https://www.instagram.com/oranten_travel/"><i class="fab fa-instagram"></i></a>
                                <a href="https://vk.com/tourislife"><i class="fab fa-vk"></i></a>
                                <a href="https://www.youtube.com/@toursegypt"><i class="fab fa-youtube"></i></a>
                                <a href="https://www.tripadvisor.com/Attraction_Review-g297549-d19857975-Reviews-Oranten_Travel-Hurghada_Red_Sea_and_Sinai.html"><img
                                        src="https://cdn-icons-png.flaticon.com/128/3488/3488467.png"
                                        alt="Tripadvisor"></a>
                                <a href="https://www.tiktok.com/@oranten_travel?lang=en"><img
                                        src="https://cdn-icons-png.flaticon.com/128/15047/15047068.png"
                                        alt="Tripadvisor"></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4  ">
                    <div class="widget footer-widget  ">
                        <div class="vs-widget-about">


                            <p class="text copyright">
                                {!! render_footer_copyright_text() !!}

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- footer area end -->
<!-- back to top area start -->
<div class="back-to-top">
    <span class="back-top"><i class="fa fa-angle-up"></i></span>
</div>
<!-- back to top area end -->

@if (preg_match('/(xgenious)/', url('/')))
    <div class="buy-now-wrap">
        <ul class="buy-list">
            <li><a target="_blank"href="https://xgenious.com/docs/neateller/" data-container="body"
                    data-toggle="popover" data-placement="left" data-content="{{ __('Documentation') }}"><i
                        class="far fa-file-alt"></i></a></li>
            <li><a target="_blank"href="https://1.envato.market/AoPOND"><i class="fas fa-shopping-cart"></i></a></li>
            <li><a target="_blank"href="https://xgenious51.freshdesk.com/"><i class="fas fa-headset"></i></a></li>
        </ul>
    </div>
@endif

<!-- jquery -->
<script src="{{ asset('assets/common/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/common/js/jquery-migrate-3.3.2.min.js') }}"></script>
<!-- popup -->
@include('frontend.partials.popup.popup-structure')
<!-- bootstrap -->
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<!-- magnific popup -->
<script src="{{ asset('assets/frontend/js/jquery.magnific-popup.js') }}"></script>
<!-- wow -->
<script src="{{ asset('assets/frontend/js/wow.min.js') }}"></script>
<!-- owl carousel -->
<script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
<!-- waypoint -->
<script src="{{ asset('assets/frontend/js/waypoints.min.js') }}"></script>
<!-- counterup -->
<script src="{{ asset('assets/frontend/js/jquery.counterup.min.js') }}"></script>
<!-- main js -->
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>
<!-- Progress-Bar -->
<script src="{{ asset('assets/frontend/js/jQuery.rProgressbar.min.js') }}"></script>
<!-- Progress-Bar -->
<script src="{{ asset('assets/frontend/js/active.rProgressbar.js') }}"></script>
<!-- dynamic js -->
<script src="{{ asset('assets/frontend/js/dynamic-script.js') }}"></script>
<!-- toastr js -->
<script src="{{ asset('assets/common/js/toastr.min.js') }}"></script>

@if (
    (!empty(get_static_option('site_google_captcha_v3_site_key')) && request()->routeIs('homepage.demo')) ||
        request()->routeIs('homepage'))
    <script
        src="https://www.google.com/recaptcha/api.js?render={{ get_static_option('site_google_captcha_v3_site_key') }}">
    </script>
    <script>
        (function() {
            "use strict";
            grecaptcha.ready(function() {
                grecaptcha.execute("{{ get_static_option('site_google_captcha_v3_site_key') }}", {
                    action: 'homepage'
                }).then(function(token) {
                    document.getElementById('gcaptcha_token').value = token;
                });
            });
        })();
    </script>
@endif


<script>
    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
</script>
@include('frontend.partials.popup.popup-jspart')
@include('frontend.partials.gdpr-cookie')
<script>
    (function($) {
        "use strict";
        $(document).ready(function() {
            $(document).on('click', '.language_dropdown ul li', function(e) {
                var el = $(this);
                el.parent().parent().find('.selected-language').text(el.text());
                el.parent().removeClass('show');
                $.ajax({
                    url: "{{ route('frontend.langchange') }}",
                    type: "GET",
                    data: {
                        'lang': el.data('value')
                    },
                    success: function(data) {
                        location.reload();
                    }
                })
            });
        });
    }(jQuery));
</script>
<script>
    // Slider  
    $(document).ready(function() {
        var owl = $('.header-slide .owl-carousel');

        // Slider owlCarousel - (Inner Page Slider)
        $('.slider .owl-carousel').owlCarousel({
            items: 1,
            loop: true,
            dots: true,
            margin: 0,
            autoplay: true,
            autoplayTimeout: 5000,
            nav: false,
            navText: ['<i class="ti-angle-left" aria-hidden="true"></i>',
                '<i class="ti-angle-right" aria-hidden="true"></i>'
            ],
            responsiveClass: true,
            responsive: {
                0: {
                    dots: true
                },
                600: {
                    dots: true
                },
                1000: {
                    dots: true
                }
            }
        });

        // Slider owlCarousel (Homepage Slider)
        $('.slider-fade .owl-carousel').owlCarousel({
            items: 1,
            loop: true,
            dots: true,
            margin: 0,
            autoplay: true,
            autoplayTimeout: 5000,
            animateOut: 'fadeOut',
            nav: false,
            navText: ['<i class="ti-angle-left" aria-hidden="true"></i>',
                '<i class="ti-angle-right" aria-hidden="true"></i>'
            ],
            responsiveClass: true,
            responsive: {
                0: {
                    dots: false
                },
                600: {
                    dots: false
                },
                1000: {
                    dots: true
                }
            }
        });
        owl.on('changed.owl.carousel', function(event) {
            var item = event.item.index - 2; // Position of the current item
            $('span').removeClass('animated fadeInUp');
            $('h4').removeClass('animated fadeInUp');
            $('h1').removeClass('animated fadeInUp');
            $('p').removeClass('animated fadeInUp');
            $('.butn-light').removeClass('animated fadeInUp');
            $('.butn-dark').removeClass('animated fadeInUp');
            $('.owl-item').not('.cloned').eq(item).find('span').addClass('animated fadeInUp');
            $('.owl-item').not('.cloned').eq(item).find('h4').addClass('animated fadeInUp');
            $('.owl-item').not('.cloned').eq(item).find('h1').addClass('animated fadeInUp');
            $('.owl-item').not('.cloned').eq(item).find('p').addClass('animated fadeInUp');
            $('.owl-item').not('.cloned').eq(item).find('.butn-light').addClass('animated fadeInUp');
            $('.owl-item').not('.cloned').eq(item).find('.butn-dark').addClass('animated fadeInUp');
        });
    });
</script>
@yield('scripts')
<!-- tawk api key  -->
{!! get_static_option('tawk_api_key') !!}
</body>

</html>
