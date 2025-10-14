<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <meta name="author" content="Sudharma Hewavitharana">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rentway</title>

    <!-- Fav Icon -->
    <link rel="icon" href="{{ asset('frontend/assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}" -->
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/assets/images/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href=" {{ asset('frontend/assets/images/favicons/favicon-32x32.png') }} ">
    <link rel="icon" type="image/png" sizes="16x16" href=" {{ asset('frontend/assets/images/favicons/favicon-16x16.png') }} ">
    <link rel="manifest" href=" {{ asset('frontend/assets/images/favicons/site.webmanifest') }} ">
    <meta name="description" content="Rentol is a modern HTML Template for car parking, car mechanics and car workshops. The theme can be used for car repair shop, car maintenance service, auto mechanic, bodyshop, collision center, car wash services, garage, workshop, auto blog, and other websites related to vehicle maintenance and car services. The theme is also great for wheels & tires shop, auto care, auto painting, auto tuning, body shop, car care center, car show store.">

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Manrope:wght@200..800&display=swap" rel="stylesheet">

    <!-- ALL STYLES -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/bootstrap-select/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/jquery-ui/jquery-ui.css') }} ">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/date-time-picker/jquery.datetimepicker.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/jarallax/jarallax.css') }} ">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css') }} ">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/nouislider/nouislider.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/nouislider/nouislider.pips.css') }} ">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/rentol-icons/style.css') }} ">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/slick/slick.css') }} ">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/owl-carousel/css/owl.carousel.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/owl-carousel/css/owl.theme.default.min.css') }} ">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- template styles -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/rentol.css') }} ">

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responcive_mystl.css') }} ">

    <!-- <link href="{{ asset('frontend/assets/css/responsive.css') }}" rel="stylesheet"> -->
</head>

<body class="custom-cursor">
    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>
    <div class="preloader">
        <div class="preloader__image" style="background-image: url(frontend/assets/images/loader.png);"></div>
    </div> <!-- /.preloader -->
    <div class="page-wrapper">
        <div class="topbar-one">
            <div class="container">
                <div class="topbar-one__inner">
                    <ul class="list-unstyled topbar-one__info">
                        <li class="topbar-one__info__item">
                            <i class="icon-pin"></i>
                            <span class="topbar-one__info__item__text">JJC/Rajagiriya,Colombo Sri Lanka</span>
                        </li>
                        <li class="topbar-one__info__item">
                            <i class="icon-mail"></i>
                            <a class="topbar-one__info__item__text" href="mailto:info@rentway.lk">info@rentway.lk</a>
                        </li>
                        <li class="topbar-one__info__item">
                            <i class="icon-telephone"></i>
                            <a class="topbar-one__info__item__text" href="tel:+702932000">0702932000</a>
                        </li>
                        @if(Auth::check())
                        <li class="topbar-one__info__item">
                            <i class="icon-user"></i>
                            <a href="/myaccount">{{ Auth::user()->name }}</a>
                        </li>
                        <li class="topbar-one__info__item">
                            <i class="icon-user"></i>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-link').submit();">Logout</a>
                        </li>
                        @endif


                    </ul><!-- /.list-unstyled topbar-one__info -->
                    
                    <div class="topbar-one__social">
                        <a href="https://www.facebook.com/share/1A9xqYj4MZ/?mibextid=wwXIfr">
                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                            <span class="sr-only">Facebook</span>
                        </a>

                        <a href="https://www.instagram.com/rentway0?igsh=aXc4YnBvZmF5eHVw&utm_source=qr">
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                            <span class="sr-only">Instagram</span>
                        </a>
                        <a href="https://www.youtube.com/">
                            <i class="fab fa-youtube" aria-hidden="true"></i>
                            <span class="sr-only">Youtube</span>
                        </a>

                        <a href="https://www.tiktok.com/@rentway?_t=ZS-8vmO2RZfX6I&_r=1">
                            <i class="fab fa-tiktok" aria-hidden="true"></i>
                            <span class="sr-only">Tiktok</span>
                        </a>
                    </div><!-- /.topbar-one__social -->
                </div><!-- /.topbar-one__inner -->
            </div><!-- /.container -->
        </div><!-- /.topbar-one -->

        <header class="main-header main-header--six sticky-header sticky-header--normal">
            <div class="container-fluid">
                <div class="main-header__inner">
                    <div class="main-header__logo logo-retina">
                        <a href="/"> <img src=" {{ asset('maincompanylogo/logo.png') }}" alt="Rentway" width="169" height="60"></a>
                    </div><!-- /.main-header__logo -->
                    <nav class="main-header__nav main-menu">
                        <ul class="main-menu__list">
                            <li class="megamenu megamenu-clickable">
                                <a href="/home">Home</a>
                            </li>

                            <li class="megamenu megamenu-clickable">
                                <a href="/allads">All Ads</a>
                            </li>

                            <li class="megamenu-clickable">
                                <a href="/vehicles">Vetted vehicles</a>
                            </li>

                            @if(Auth::check())
                            {{-- User is logged in --}}
                            <li>
                                <a href="/dashboardfr">Dashboard</a> {{-- or logout --}}
                            </li>
                            @else
                            {{-- User is not logged in --}}
                            <li>
                                <a href="/customerlogin">Login</a>
                            </li>
                            @endif
                            <li class="megamenu-clickable">
                                <a class="fleet-details__booking__btn rentol-btn" href="/postadd">Post Add</a>
                            </li>

                            
                        </ul>
                    </nav><!-- /.main-header__nav -->

                    <div class="main-header__right">
                        <!-- <div class="main-header__right__info">
                            <a href="/forvehicleowners" class="fleet-details__booking__btn rentol-btn">Join With Us</a>
                        </div> -->
                        <a href="tel:+88-0123-654-99" class="main-header__right__call">
                            <div class="main-header__right__icon">
                                <i class="icon-telephone"></i>
                            </div>
                            <div class="main-header__right__content">
                                <span class="main-header__right__text">call for rent</span>
                                <h6 class="main-header__right__number">+94702932000</h6>
                            </div>
                        </a>
                        <div class="main-header__right__toggler main-header__toggler">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div><!-- /.mobile-nav__toggler -->
                        <div class="mobile-nav__btn mobile-nav__toggler">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div><!-- /.mobile-nav__toggler -->

                    </div><!-- /.main-header__right -->
                </div><!-- /.main-header__inner -->
            </div><!-- /.container-fluid -->
        </header><!-- /.main-header -->

        <main>
            {{ $slot }}
        </main>
    </div>
</body>

<!-- <script src="{{ asset('frontend/assets/js/jquery.js') }}"></script> -->
<!-- jQuery -->
<script src="{{ asset('frontend/assets/vendors/jquery/jquery-3.7.0.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('frontend/assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Bootstrap Select -->
<script src="{{ asset('frontend/assets/vendors/bootstrap-select/bootstrap-select.min.js') }}"></script>

<!-- Jarallax -->
<script src="{{ asset('frontend/assets/vendors/jarallax/jarallax.min.js') }}"></script>

<!-- jQuery UI -->
<script src="{{ asset('frontend/assets/vendors/jquery-ui/jquery-ui.js') }}"></script>

<!-- Date-Time Picker -->
<script src="{{ asset('frontend/assets/vendors/date-time-picker/jquery.datetimepicker.min.js') }}"></script>

<!-- jQuery AjaxChimp -->
<script src="{{ asset('frontend/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}"></script>

<!-- jQuery Appear -->
<script src="{{ asset('frontend/assets/vendors/jquery-appear/jquery.appear.min.js') }}"></script>

<!-- Magnific Popup -->
<script src="{{ asset('frontend/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}"></script>

<!-- jQuery Validate -->
<script src="{{ asset('frontend/assets/vendors/jquery-validate/jquery.validate.min.js') }}"></script>

<!-- Owl Carousel -->
<script src="{{ asset('frontend/assets/vendors/owl-carousel/js/owl.carousel.min.js') }}"></script>

<!-- Wow.js -->
<script src="{{ asset('frontend/assets/vendors/wow/wow.js') }}"></script>

<!-- ImagesLoaded -->
<script src="{{ asset('frontend/assets/vendors/imagesloaded/imagesloaded.min.js') }}"></script>

<!-- Isotope -->
<script src="{{ asset('frontend/assets/vendors/isotope/isotope.js') }}"></script>

<!-- Slick Slider -->
<script src="{{ asset('frontend/assets/vendors/slick/slick.min.js') }}"></script>

<!-- Countdown -->
<script src="{{ asset('frontend/assets/vendors/countdown/countdown.min.js') }}"></script>

<!-- GSAP -->
<script src="{{ asset('frontend/assets/vendors/gsap/gsap.js') }}"></script>
<script src="{{ asset('frontend/assets/vendors/gsap/scrolltrigger.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendors/gsap/splittext.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendors/gsap/rentol-split.js') }}"></script>

<!-- Template JS -->
<script src="{{ asset('frontend/assets/js/rentol.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


</html>