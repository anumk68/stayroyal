<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="robots" content="index, follow" />
    <title>@yield('meta_title', 'Default Title')</title>
    <meta name="description" content="@yield('meta_description', 'Default description...')">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="msvalidate.01" content="CB6DACDC88CD79F7FF4EBC5746FD4F66" />

    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="google-site-verification" content="B6Y7LCi9kOQIY7TtuKT9E_aHJDOaiwKM27GqrE_aCcg" />
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-B5QZPEHHRX"></script>

    <!-- <link href = "https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"rel = "stylesheet"> -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap">
    </noscript>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-B5QZPEHHRX');
    </script>

    <!-- Google Tag Manager -->
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=GTM-MVB9MS8P';
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-MVB9MS8P');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MVB9MS8P" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap"
        rel="stylesheet">

    <!-- External CSS (only non-duplicate ones kept) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/venobox@2.0.5/dist/venobox.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="56x56" href="{{ asset('public/assets/images/fav-icon/icon.png') }}">

    <!-- Local CSS (only one source kept for duplicates like owl.carousel, all.min.css etc.) -->
    <!--<link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap.min.css') }}">-->
    <!--<link rel="stylesheet" href="{{ asset('public/assets/css/owl.carousel.min.css') }}">-->
    <!--<link rel="stylesheet" href="{{ asset('public/assets/css/animate.css') }}">-->
    <!--<link rel="stylesheet" href="{{ asset('public/assets/css/animated-text.css') }}">-->
    <!--<link rel="stylesheet" href="{{ asset('public/assets/css/flaticon.css') }}">-->
    <!--<link rel="stylesheet" href="{{ asset('public/assets/css/theme-default.css') }}">-->
    <!--<link rel="stylesheet" href="{{ asset('public/assets/css/meanmenu.min.css') }}">-->
    <!--<link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap-icons.css') }}">-->
    <!--<link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">-->
    <!--<link rel="stylesheet" href="{{ asset('public/assets/css/responsive.css') }}">-->
    <!--<link rel="stylesheet" href="{{ asset('public/assets/css/scrollCue.css') }}">-->
    <!--<link rel="stylesheet" href="{{ asset('public/assets/css/dark.css') }}">-->
    <!--<link href="{{ asset('public/admin/assets/css/header-colors.css') }}" rel="stylesheet" />-->

    <link rel="preload" href="{{ asset('public/assets/css/bootstrap.min.css') }}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap.min.css') }}">
    </noscript>

    <link rel="preload" href="{{ asset('public/assets/css/owl.carousel.min.css') }}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{ asset('public/assets/css/owl.carousel.min.css') }}">
    </noscript>

    <link rel="preload" href="{{ asset('public/assets/css/animate.css') }}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{ asset('public/assets/css/animate.css') }}">
    </noscript>

    <link rel="preload" href="{{ asset('public/assets/css/animated-text.css') }}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{ asset('public/assets/css/animated-text.css') }}">
    </noscript>

    <link rel="preload" href="{{ asset('public/assets/css/flaticon.css') }}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{ asset('public/assets/css/flaticon.css') }}">
    </noscript>

    <link rel="preload" href="{{ asset('public/assets/css/theme-default.css') }}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{ asset('public/assets/css/theme-default.css') }}">
    </noscript>

    <link rel="preload" href="{{ asset('public/assets/css/meanmenu.min.css') }}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{ asset('public/assets/css/meanmenu.min.css') }}">
    </noscript>

    <link rel="preload" href="{{ asset('public/assets/css/bootstrap-icons.css') }}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap-icons.css') }}">
    </noscript>

    <link rel="preload" href="{{ asset('public/assets/css/style.css') }}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
    </noscript>

    <link rel="preload" href="{{ asset('public/assets/css/responsive.css') }}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{ asset('public/assets/css/responsive.css') }}">
    </noscript>

    <link rel="preload" href="{{ asset('public/assets/css/scrollCue.css') }}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{ asset('public/assets/css/scrollCue.css') }}">
    </noscript>

    <link rel="preload" href="{{ asset('public/assets/css/dark.css') }}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{ asset('public/assets/css/dark.css') }}">
    </noscript>

    <link rel="preload" href="{{ asset('public/admin/assets/css/header-colors.css') }}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{ asset('public/admin/assets/css/header-colors.css') }}">
    </noscript>

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" /> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .nav-link {
            color: #333 !important;
        }

        .dropdown-menu {
            border: none;
            border-radius: 0;
            /* background-color: #f8f9fa; */
            --bs-dropdown-link-active-bg: none;
        }

        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu>.dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -1px;
            display: none;

        }

        /* Desktop hover behavior */
        @media (min-width: 992px) {
            .dropdown:hover>.dropdown-menu {
                display: block;
            }

            .dropdown-submenu:hover>.dropdown-menu {
                display: block;
            }
        }

        /* Mobile behavior */
        @media (max-width: 991px) {
            .dropdown-submenu.show>.dropdown-menu {
                display: block;
                left: 0;
                margin-left: 1rem;
            }
        }

        .nav-link {
            color: #fff !important;
        }

        .get-started-btn {
            background-color: #1dc6c1;
            /* color: white; */
            border: none;
            padding: 6px 16px;
            font-weight: bold;
            border-radius: 4px;
        }
    </style>

    <style>
        .profile-form-wrapper {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.08);
            max-width: 600px;
            margin: 40px auto;
        }

        .profile-form-wrapper h3 {
            margin-bottom: 25px;
            font-size: 24px;
            color: #333;
            text-align: center;
        }

        .profile-form-wrapper label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #333;
        }

        .profile-form-wrapper input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .profile-form-wrapper .btn {
            padding: 10px 20px;
            font-size: 14px;
            font-weight: bold;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg">
        <div class="container">
            <a href="https://stayroyal.in/" class="navbar-brand">
                <div class="header-logo">
                    <img src="{{ asset('public/assets/images/inner/stay-logo.webp') }}" alt="Logo">
                </div>
            </a>
            <div class="maximum_rang">
                <div class="model" id="mobile-screen">
                    @auth
                        <!-- Logged in: link to account -->
                        <a href="{{ route('account') }}" style="all: unset; cursor: pointer;">
                            <div style="display: flex; align-items: center; gap: 8px;">
                                <i class="fa-solid fa-user"></i>
                                <span style="font-weight: 500; font-size: 14px; color: #f1f1f1;">Account</span>
                            </div>
                        </a>
                    @else
                        <!-- Guest: link to login -->
                        <a href="{{ route('user.login') }}" style="all: unset; cursor: pointer;">
                            <div style="display: flex; align-items: center; gap: 8px;">
                                <img src="{{ asset('public/assets/images/user.png') }}" alt="User"
                                    style="width: 35px; height: 35px; border-radius: 50%;">
                                <span style="font-weight: 500; font-size: 14px; color: #f1f1f1;">Account</span>
                            </div>
                        </a>
                    @endauth
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item has-sub">
                        <a class="nav-link" href="#">Stay Royal Villa ▾</a>

                        <ul class="submenu">
                            @foreach ($header_categories as $category)
                                <li class="has-sub">
                                    <a class="nav-link drop-s" href="#">{{ $category->category }} ▸</a>
                                    <ul class="submenu sec-menu">
                                        @foreach ($category->roomTypes as $type)
                                            @foreach ($type->rooms as $room)
                                                <li>
                                                    <a class="nav-link" href="{{ route('roomdetails', ['slug' => $room->slug]) }}">
                                                        {{ $type->room_type }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>


                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Stay Royal
                            Villa</a>
                        <ul class="dropdown-menu">
                            <!-- Submenu -->
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">First floor - 2BHK</a>
                                <ul class="dropdown-menu">
                                    <!-- Sub-submenu -->
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item" href="#">Complete Villa - 4BHK</a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="#">Ground Floor 2BHK</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">3 BHK Luxury Villa</a>
                                <ul class="dropdown-menu">
                                    <!-- Sub-submenu -->
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item" href="#">Complete Villa - 4BHK</a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="#">Ground Floor 2BHK</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}

                    <li class="nav-item d-block d-lg-none">
                        <a class="nav-link" href="{{ route('rooms') }}">Booking Online</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contacts') }}">Contact</a>
                    </li>

                </ul>
                <div class="mainly_not_mobile">
                    <div class="header-button text-right"
                        style="display: flex; align-items: center; justify-content: flex-end; gap: 15px; position: relative;">
                        <a href="{{ route('rooms') }}" style="color: white;">Booking Online</a>

                        @auth
                            <!-- User logged in: link to account page -->
                            <a href="{{ route('account') }}" style="all: unset; cursor: pointer;">
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <i class="fa-solid fa-user"></i>
                                    <span style="font-weight: 500; font-size: 14px; color: #f1f1f1;">Account</span>
                                </div>
                            </a>
                        @else
                            <!-- User not logged in: link to login page -->
                            <a href="{{ route('user.login') }}" style="all: unset; cursor: pointer;">
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <i class="fa-solid fa-user"></i>
                                    <span style="font-weight: 500; font-size: 14px; color: #f1f1f1;">Account</span>
                                </div>
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>

    </nav>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.dropdown-submenu > a').forEach(function (submenuLink) {
                submenuLink.addEventListener('click', function (e) {
                    if (window.innerWidth < 992) {
                        e.preventDefault();
                        const nextMenu = this.nextElementSibling;
                        if (nextMenu && nextMenu.classList.contains('dropdown-menu')) {
                            nextMenu.classList.toggle('show');
                        }
                    }
                });
            });
        });
    </script>


    <style>
        .navbar-nav .nav-item .submenu {
            overflow: visible;
            padding-left: 0;
        }

        .navbar-nav .nav-item .submenu li a {
            padding-left: 23px;
        }

        .navbar-nav .nav-item ul.submenu.sec-menu {
            left: 200px;
            top: calc(100% + 0px);
        }

        .navbar-nav .sec-menu li a {
            font-size: 15px;
        }

        li.nav-item a {
            font-size: 18px;
        }

        a.nav-link.drop-s {
            font-size: 15px;
        }

        @media (max-width:480px) {
            .navbar-nav .nav-item ul.submenu.sec-menu {
                left: 40px;
            }

            li.nav-item a {
                font-size: 13px;
            }
        }
    </style>