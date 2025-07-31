<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
 <title>@yield('meta_title', 'Default Title')</title>
    <meta name="description" content="@yield('meta_description', 'Default description...')">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <meta name="google-site-verification" content="B6Y7LCi9kOQIY7TtuKT9E_aHJDOaiwKM27GqrE_aCcg" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-B5QZPEHHRX"></script>
    <script>
        < link href = "https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel = "stylesheet" >
            window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-B5QZPEHHRX');
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <link rel="icon" type="image/png" sizes="56x56" href="{{ asset('public/assets/images/fav-icon/icon.png') }}">

    <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap.min.css') }}" type="text/css" media="all">

    <link rel="stylesheet" href="{{ asset('public/assets/css/owl.carousel.min.css') }}" type="text/css" media="all">

    <link rel="stylesheet" href="{{ asset('public/assets/css/animate.css') }}" type="text/css" media="all">

    <link rel="stylesheet" href="{{ asset('public/assets/css/animated-text.css') }}" type="text/css" media="all">

    <link rel="stylesheet" href="{{ asset('public/assets/css/all.min.css') }}" type="text/css" media="all">

    <link rel="stylesheet" href="{{ asset('public/assets/css/flaticon.css') }}" type="text/css" media="all">

    <link rel="stylesheet" href="{{ asset('public/assets/css/theme-default.css') }}" type="text/css" media="all">

    <link rel="stylesheet" href="{{ asset('public/assets/css/meanmenu.min.css') }}" type="text/css" media="all">

    <link rel="stylesheet" href="{{ asset('public/assets/css/owl.transitions.css') }}" type="text/css" media="all">

    <link rel="stylesheet" href="{{ asset('public/venobox/venobox.css') }}" type="text/css" media="all">

    <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap-icons.css') }}" type="text/css" media="all">

    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}" type="text/css" media="all">

    <link rel="stylesheet" href="{{ asset('public/assets/css/responsive.css') }}" type="text/css" media="all">

    <link rel="stylesheet" href="{{ asset('public/assets/css/scrollCue.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/venobox@2.0.5/dist/venobox.min.css" />

    <link rel="stylesheet" href="{{ asset('public/assets/css/dark.css') }}" type="text/css" media="all">
    <link href="{{ asset('public/admin/assets/css/header-colors.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">

    <script src="{{ asset('public/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
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
                    <img src="{{ asset('public/assets/images/inner/stay-logo.png') }}" alt="Logo">
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
                                <img src="{{ asset('public/storage/image/user-logo.png') }}" alt="User"
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
                        <a class="nav-link" href="{{ route('rooms') }}">Stay Royal Villa ▾</a>
                        <ul class="submenu">
                            @foreach ($header_rooms as $room)
                                <li>
                                    <a class="nav-link drop-s" href="{{ route('roomdetails', ['slug' => $room->slug]) }}">

                                        {{ $room->roomType->room_type ?? 'Room Type' }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

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
