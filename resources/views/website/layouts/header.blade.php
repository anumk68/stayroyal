<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Royella - Luxury Hotel HTML5 Template</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

	<!-- Favicon -->
	<link rel="icon" type="image/png" sizes="56x56" href="{{ asset('assets/images/fav-icon/icon.png') }}">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css" media="all">
	
	<!-- Carousel CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" type="text/css" media="all">
	
	<!-- Animate CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" type="text/css" media="all">
	
	<!-- Animated Text CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/animated-text.css') }}" type="text/css" media="all">
	
	<!-- Font Awesome CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}" type="text/css" media="all">
	
	<!-- Flaticon CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}" type="text/css" media="all">
	
	<!-- Theme Default CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/theme-default.css') }}" type="text/css" media="all">
	
	<!-- Meanmenu CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}" type="text/css" media="all">
	
	<!-- Transitions CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/owl.transitions.css') }}" type="text/css" media="all">
	
	<!-- Venobox CSS -->
	<link rel="stylesheet" href="{{ asset('venobox/venobox.css') }}" type="text/css" media="all">
	
	<!-- Bootstrap Icons CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-icons.css') }}" type="text/css" media="all">
	
	<!-- Main Style CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css" media="all">
	
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" type="text/css" media="all">
	
	<!-- ScrollCue CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/scrollCue.css') }}" type="text/css" media="all">
	
	<!-- Dark Mode CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/dark.css') }}" type="text/css" media="all">

	<!-- Modernizr JS -->
	<script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
</head>
<body>


<!--==================================================-->
<!-- Start Royella Header Area -->
<!--==================================================-->
<div class="header-area" id="sticky-header">
	<div class="container-fulid">
		<div class="row align-items-center">
			<div class="col-lg-3">
				<div class="header-logo">
					<a href="index.html"><img src="assets/images/inner/logo-1.png"  alt="" ></a>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="header-menu">
					<ul>
                     <li><a href="{{ url('/') }}">Home</a></li>
                     <li><a href="{{ url('/about') }}">About</a></li>
                     <li><a href="{{ url('/rooms') }}">Royal BNB</a></li>
                     <li><a href="{{ url('/blogs') }}">Blog</a></li>
                     <li><a href="{{ url('/contacts') }}">Contact</a></li>
                   </ul>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="header-button text-right">
					<a href="{{ route('rooms') }}">Booking Online</a>
				</div>
			</div>
		</div>
	</div>
</div>