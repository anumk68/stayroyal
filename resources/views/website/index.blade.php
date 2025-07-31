@extends('website.layouts.layout')


@section('meta_title', $metatitle)
@section('meta_description', $metaDescription)
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@section('content')
    <!-- Loader markup -->
    <div id="loader">
        <div class="spinner"></div>
        <h1>StayRoyal</h1>
    </div>
    <div class="hero-slider owl-carousel">
        <div class="hero-area home-1 align-items-center d-flex">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="hotel-rating">
                            <ul>
                                <li><i class="bi bi-star-fill"></i></li>
                                <li><i class="bi bi-star-fill"></i></li>
                                <li><i class="bi bi-star-fill"></i></li>
                                <li><i class="bi bi-star-fill"></i></li>
                                <li><i class="bi bi-star-fill"></i></li>
                            </ul>
                        </div>
                        <div class="hero-content">
                            <h4>LUXURY STAY & RETREAT</h4>
                            <h1>BEST LUXURY STAY ROYAL<br> BNB IN MOHALI</h1>
                        </div>
                        <div class="luxury-button">
                            <a href="{{ route('rooms') }}">BOOK NOW</a>
                        </div>
                        <div class="hero-contact">
                            <a href="tel:+91 7006022986"><i class="bi bi-telephone-fill"></i>+91
                                7006022986</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-area home-1 style-two align-items-center d-flex">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="hotel-rating">
                            <ul>
                                <li><i class="bi bi-star-fill"></i></li>
                                <li><i class="bi bi-star-fill"></i></li>
                                <li><i class="bi bi-star-fill"></i></li>
                                <li><i class="bi bi-star-fill"></i></li>
                                <li><i class="bi bi-star-fill"></i></li>
                            </ul>
                        </div>
                        <div class="hero-content">
                            <h4>STAY ROYAL IN MOHALI
                            </h4>
                            <h1>The Best Luxury Hotel</h1>
                            <h1>In Mohali</h1>
                        </div>
                        <div class="luxury-button">
                            <a href="{{ route('about') }}">Discover More</a>
                        </div>
                        <div class="hero-contact">
                            <a href="tel:+91 7006022986"><i class="bi bi-telephone-fill"></i>+91
                                7006022986</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="booking-area home-1">
        <div class="container">

            <div id="status"></div> -->
            <div class="form_bottom_home">
                <form method="post" action="{{ route('booking.review') }}" id="dreamit-form">
                    @csrf
                    <input type="hidden" id="session_id" name="session_id" value="1">
                    <input type="hidden" id="session_id" name="total_days" value="total_days">
                    <div class="container-fluid form-wrapper">
                        <div class="row g-3 align-items-center">
                            <!-- Check In -->
                            <div class="col-md-2 position-relative">
                                <label for="checkin">Check In</label>
                                <span>
                                    <input type="date" class="form-control" id="checkin" name="start_date"
                                        placeholder="mm/dd/yyyy " readonly>
                                    <i class="fa fa-calendar input-icon"></i>
                                </span>
                            </div>
                            <!-- Check Out -->
                            <div class="col-md-2 position-relative">
                                <label for="checkout">Check Out</label>
                                <input type="date" class="form-control" id="checkout" name="end_date"
                                    placeholder="mm/dd/yyyy" readonly>
                                <i class="fa fa-calendar input-icon"></i>
                            </div>
                            <!-- Rooms -->
                            <div class="col-md-3">
                                <label for="room">Rooms</label>
                                <select class="form-select form-s" id="room" name="room_type">
                                    <option value disabled selected>Select
                                        Room
                                    </option>
                                    @foreach ($roomtypes as $roomtype)
                                        <option value="{{ $roomtype->id }}"
                                            @if (isset($data['room_type']) && $data['room_type'] == $roomtype->id) selected @endif>
                                            {{ $roomtype->room_type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Guests -->
                            <div class="col-md-3 position-relative">
                                <label>Guests</label>
                                <div id="guestToggle" class="guest-toggle">
                                    <span id="guestSummary">1 Adult, 0
                                        Children</span>
                                    <i class="fa fa-chevron-down ms-2"></i>
                                </div>
                                <div id="guestDropdown" class="guest-dropdown">
                                    <div class="guest-row">
                                        <span>Adults</span>
                                        <div class="guest-controls d-flex align-items-center gap-2">
                                            <button type="button" class="guest-minus" data-type="adult">−</button>
                                            <span id="adultCount">1</span>
                                            <input type="hidden" name="adults" id="adultInput" value="1">
                                            <button type="button" class="guest-plus" data-type="adult">+</button>
                                        </div>
                                    </div>
                                    <div class="guest-row">
                                        <span>Children</span>
                                        <div class="guest-controls d-flex align-items-center gap-2">
                                            <button type="button" class="guest-minus" data-type="child">−</button>
                                            <span id="childCount">0</span>
                                            <input type="hidden" name="children" id="childInput" value="0">
                                            <button type="button" class="guest-plus" data-type="child">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Search Button -->
                            <div class="col-md-2">
                                <div class="btn_form_boottom mt-4">
                                    <button type="submit" class="btn btn-warning w-100">SEARCH
                                        HERE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="text pt-5 room-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title center" data-cue="zoomIn">
                        <div class="section-thumb">
                            <img src="{{ asset('public/assets/images/inner/stay-logo.png') }}" alt>
                        </div>
                        <h2>Welcome to Stay Royal - Your Premium Luxury Villa in Mohali
                        </h2>
                        <p class="section-desc-1">Discover a unique blend of comfort, elegance, and tranquility at Stay
                            Royal, a premium luxury villa in Mohali. Designed for travelers who appreciate finer details,
                            our luxury villas and suites offer more than just a place to rest — they create a memorable stay
                            experience.

                        </p>
                    </div>
                </div>
            </div>
            <div class="room-area">
                <div class="room_listowl-carousel row">
                    @foreach ($rooms as $room)
                        <div class="col-md-4 mb-3">
                            <div class="room-single-box">
                                <div class="room-thumb">
                                    <div class="about_list owl-carousel sa">
                                        @foreach (json_decode($room->room_images, true) ?: [] as $img)
                                            <div class="item">
                                                <img src="{{ asset('storage/app/public/' . $img) }}"
                                                    onerror="this.onerror=null; this.src='{{ asset('public/' . $img) }}';"
                                                    alt="">
                                            </div>
                                        @endforeach

                                    </div>
                                    <div class="room-details-button">
                                        <a href="{{ route('roomdetails', $room->slug) }}">View Details<i
                                                class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>

                                <div class="room-pricing">
                                    <span class="dolar">Rs.{{ $room->price }}</span>
                                    <span>Night</span>
                                </div>

                                <div class="room-content">
                                    <h4>Luxury Villa</h4>
                                    <a href="{{ route('roomdetails', $room->slug) }}">{{ $room->roomType->room_type ?? 'N/A' }}
                                    </a>
                                    <p><i class="fa-solid fa-chart-area"></i> {{ $room->size }} SQ.FT</p>
                                    <ul>

                                        @foreach (json_decode($room->amenities, true) as $amenity)
                                            <li><img src="{{ asset('storage/app/public/' . $amenity['icon']) }}"
                                                    alt="">
                                                {{ $amenity['text'] }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="room-bottom">
                                    <div class="coustomar-rating">
                                        <ul>
                                            @php $stars = floor($room->rating); @endphp
                                            @for ($i = 0; $i < 5; $i++)
                                                <li><i class="bi bi-star{{ $i < $stars ? '-fill' : '' }}"></i></li>
                                            @endfor
                                        </ul>
                                        <span>{{ $room->rating }} ({{ number_format($room->rating_count) }}k)</span>
                                    </div>

                                    <div class="cd">
                                        <div class="room-bottom-icon">
                                            <div class="tooltip">
                                                <li><img src="{{ asset('public/assets/images/home-1/Wifi-1.png') }}"
                                                        alt=""></li>
                                                <span class="tooltiptext"> Free Wi-Fi</span>
                                            </div>
                                            <div class="tooltip">
                                                <li><img src="{{ asset('public/assets/images/home-1/Parking1.png') }}"
                                                        alt=""></li>
                                                <span class="tooltiptext">Parking</span>
                                            </div>
                                            <div class="tooltip">
                                                <li><img src="{{ asset('public/assets/images/home-1/Refrigerator1.png') }}"
                                                        alt=""></li>
                                                <span class="tooltiptext"> Refrigerator</span>
                                            </div>
                                            <div class="tooltip">
                                                <li><img src="{{ asset('public/assets/images/home-1/Self Key Unlocking1.png') }}"
                                                        alt=""></li>
                                                <span class="tooltiptext"> Self Key Unlocking</span>
                                            </div>
                                            <div class="tooltip">
                                                <li><img src="{{ asset('public/assets/images/home-1/Toiletries1.png') }}"
                                                        alt=""></li>
                                                <span class="tooltiptext"> Toiletries</span>
                                            </div>
                                            <div class="tooltip">
                                                <li><img src="{{ asset('public/assets/images/home-1/Hair Dryer1.png') }}"
                                                        alt=""></li>
                                                <span class="tooltiptext">Hair Dryer</span>
                                            </div>

                                        </div>

                                        <!-- - -->
                                        <div class="room-bottom-icon mt-2">

                                            <div class="tooltip">
                                                <li><img src="{{ asset('public/assets/images/home-1/Towel1.png') }}"
                                                        alt=""></li>
                                                <span class="tooltiptext">Towel</span>
                                            </div>
                                            <div class="tooltip">
                                                <li><img src="{{ asset('public/assets/images/home-1/Washing Machine1.png') }}"
                                                        alt=""></li>
                                                <span class="tooltiptext">Washing Machine</span>
                                            </div>
                                            <div class="tooltip">
                                                <li><img src="{{ asset('public/assets/images/home-1/Water Purifier1.png') }}"
                                                        alt=""></li>
                                                <span class="tooltiptext">Water Purifier</span>
                                            </div>
                                            <div class="tooltip">
                                                <li><img src="{{ asset('public/assets/images/home-1/Electric Iron1.png') }}"
                                                        alt=""></li>
                                                <span class="tooltiptext">Electric Iron</span>
                                            </div>
                                            <div class="tooltip">
                                                <li><img src="{{ asset('public/assets/images/home-1/electric kettle1.png') }}"
                                                        alt=""></li>
                                                <span class="tooltiptext">Electric kettle</span>
                                            </div>
                                            <div class="tooltip">
                                                <li><img src="{{ asset('public/assets/images/icon-image/Smart tv (1).png') }}"
                                                        alt=""></li>
                                                <span class="tooltiptext">Smart Tv</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="feature-area mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title center" data-cue="zoomIn">
                        <div class="section-thumb">
                            <img src="{{ asset('public/assets/images/inner/stay-logo.png') }}" alt>
                        </div>
                        <h2 class="macke">Experience the Top-Rated Homestay in Mohali – Stay Royal BNB
                        </h2>
                        <p class="section-desc-1 text-white mt-3">Looking for a comfortable, stylish place to relax and
                            feel at home? Stay Royal is a perfect homestay in Mohali, offering comfort, elegance and
                            personal touches that make it one of the best homestays for families, couples and solo
                            travelers.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-feature-box" data-cue="zoomIn">
                        <div class="feature-icon">
                            <img src="{{ asset('public/assets/images/home-1/Comfy & Clean Rooms.png') }}" alt="">
                        </div>
                        <div class="feature-content new-f">
                            <h4>Comfy & Clean Rooms</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-feature-box" data-cue="zoomIn">
                        <div class="feature-icon ">
                            <img src="{{ asset('public/assets/images/home-1/Fast Wi-Fi.png') }}" alt="">
                        </div>
                        <div class="feature-content new-f">
                            <h4>Fast Wi-Fi</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-feature-box" data-cue="zoomIn">
                        <div class="feature-icon ">
                            <img src="{{ asset('public/assets/images/home-1/Easy Self Check-In.png') }}" alt="">
                        </div>
                        <div class="feature-content new-f">
                            <h4>Easy Self Check-In</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-feature-box" data-cue="zoomIn">
                        <div class="feature-icon ">
                            <img src="{{ asset('public/assets/images/home-1/Smart tv.png') }}" alt="">
                        </div>
                        <div class="feature-content new-f">
                            <h4>Smart Tv</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-feature-box" data-cue="zoomIn">
                        <div class="feature-icon">
                            <img src="{{ asset('public/assets/images/home-1/Free Parking.png') }}" alt>
                        </div>
                        <div class="feature-content  new-f">
                            <h4>Free Parking</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-feature-box" data-cue="zoomIn">
                        <div class="feature-icon ">
                            <img src="{{ asset('public/assets/images/home-1/Great Location.png') }}" alt>
                        </div>
                        <div class="feature-content new-f">
                            <h4>Great Location</h4>
                        </div>
                    </div>
                </div>
                <!-- secont row -->
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-feature-box" data-cue="zoomIn">
                        <div class="feature-icon ">
                            <img src="{{ asset('public/assets/images/home-1/Washing Machine.png') }}" alt>
                        </div>
                        <div class="feature-content new-f">
                            <h4>Washing Machine</h4>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-feature-box" data-cue="zoomIn">
                        <div class="feature-icon ">
                            <img src="{{ asset('public/assets/images/home-1/Food Order Facility.png') }}" alt>
                        </div>
                        <div class="feature-content new-f">
                            <h4>Food Order Facility</h4>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-feature-box" data-cue="zoomIn">
                        <div class="feature-icon ">
                            <img src="{{ asset('public/assets/images/home-1/Independent Villa.png') }}" alt>
                        </div>
                        <div class="feature-content new-f">
                            <h4>Independent Villa</h4>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-feature-box" data-cue="zoomIn">
                        <div class="feature-icon ">
                            <img src="{{ asset('public/assets/images/home-1/Towel.png') }}" alt>
                        </div>
                        <div class="feature-content new-f">
                            <h4>Towel</h4>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-feature-box" data-cue="zoomIn">
                        <div class="feature-icon ">
                            <img src="{{ asset('public/assets/images/home-1/Toiletries.png') }}" alt>
                        </div>
                        <div class="feature-content new-f">
                            <h4>Toiletries</h4>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-feature-box" data-cue="zoomIn">
                        <div class="feature-icon ">
                            <img src="{{ asset('public/assets/images/home-1/Gyser.png') }}" alt>
                        </div>
                        <div class="feature-content new-f">
                            <h4>Gyser</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row align-items-center call-do-action-bg">
            <div class="col-lg-6 col-md-12">
                <div class="section-title two footar" data-cue="zoomIn">
                    <h2 style="color: rgb(0, 0, 0);">Your Perfect Escape <br>in
                        Mohali
                    </h2>
                    <p class="section-desc-2" style="color: rgb(0, 0, 0);">Whether you're traveling
                        solo, with family, or
                        just looking for a weekend breather — we've crafted the
                        perfect setting for you to relax,
                        recharge, and feel at home.
                    </p>
                    <div class="luxury-button" data-cue="zoomIn" data-show="true"
                        style="animation-name: zoomIn; animation-duration: 2500ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
                        <a href="{{ route('rooms') }}">BOOK NOW</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="container text-center my-4">
                    <div class="containing_modal">
                        <!-- <div class="video-thumbnail" data-bs-toggle="modal" data-bs-target="#videoModal">
                                <img src="{{ asset('public/assets/images/home-1/baner.jpg') }}" alt>
                                <span class="play-icon">&#9658;</span>
                            </div> -->
                        <div class="about-video">

                            <video controls autoplay muted loop width="100%" height="auto">
                                <source src="{{ asset('public/assets/video/MicrosoftTeams-video.mp4') }}"
                                    type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
                <!-- <div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content bg-dark">
                                <div class="modal-body p-0">
                                    <button type="button"
                                        class="btn-close position-absolute top-0 end-0 m-2 bg-white rounded-circle p-2"
                                        data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                    <div class="ratio ratio-16x9">
                                        <iframe id="youtubeVideo"
                                            src="{{ asset('public/assets/video/MicrosoftTeams-video.mp4') }}"
                                            title="YouTube video" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
            </div>
        </div>
    </div>
    </div>

    <section class="seasonal">
        <div class="container">
            <div class="section-title two" data-cue="zoomIn">
                <h2>Exclusive Seasonal deals for <span class="offer">1 Week</span> at stay Royal</h2>
            </div>
            <div class="row">
                @foreach ($weekOffers as $offer)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-img-wrapper">
                                <div class="about_list owl-carousel sa">
                                    <div class="item"> <img src="{{ asset('public/assets/images/room/6.jpg') }}" alt>
                                    </div>
                                    <div class="item"> <img src="{{ asset('public/assets/images/room/5.jpg') }}" alt>
                                    </div>
                                    <div class="item"> <img src="{{ asset('public/assets/images/room/4.jpg') }}" alt>
                                    </div>
                                    <div class="item"> <img src="{{ asset('public/assets/images/room/7.jpg') }}" alt>
                                    </div>
                                    <div class="item"> <img src="{{ asset('public/assets/images/room/8.jpg') }}" alt>
                                    </div>
                                </div>
                                <div class="discount-badge">{{ $offer->offer_price }}% OFF</div>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title">
                                    {{ $offer->roomType->room_type ?? 'Room' }} - {{ $offer->offer_valid_time }}
                                    <br>{{ $offer->offer_price }}% Off
                                </h5>
                                <div class="luxury-button card-d" data-cue="zoomIn">
                                    <a
                                        href="{{ route('roomdetails', ['slug' => $offer->room->slug, 'offer_id' => $offer->slug]) }}">BOOK
                                        NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                @if ($weekOffers->isEmpty())
                    <div class="col-12 text-center">
                        <p>No 1-week offers available at the moment.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <section class="seasonal f-days">
        <div class="container">
            <div class="section-title two" data-cue="zoomIn">
                <h2> Exclusive Seasonal deals for <span class="offer">15 Days </span>at stay Royal</h2>
            </div>
            <div class="row">
                @forelse ($fifteenDayOffers as $offer)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-img-wrapper">
                                <div class="about_list owl-carousel sa">
                                    <div class="item"> <img src="{{ asset('public/assets/images/room/room-s1.jpg') }}"
                                            alt></div>
                                    <div class="item"> <img src="{{ asset('public/assets/images/room/8.jpg') }}" alt>
                                    </div>
                                    <div class="item"> <img src="{{ asset('public/assets/images/room/7.jpg') }}" alt>
                                    </div>
                                    <div class="item"> <img src="{{ asset('public/assets/images/room/5.jpg') }}" alt>
                                    </div>
                                    <div class="item"> <img src="{{ asset('public/assets/images/room/4.jpg') }}" alt>
                                    </div>
                                </div>
                                <div class="discount-badge">{{ $offer->offer_price }}% OFF</div>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title">
                                    {{ $offer->roomType->room_type ?? 'Room' }} - 15 Days Offer
                                    <br>{{ $offer->offer_price }}% Off
                                </h5>
                                <div class="luxury-button card-d" data-cue="zoomIn">

                                    <a
                                        href="{{ route('roomdetails', ['slug' => $offer->room->slug, 'offer_id' => $offer->slug]) }}">BOOK
                                        NOW</a>


                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>No 15-day offers available at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <section class="seasonal t-day">
        <div class="container">
            <div class="section-title two" data-cue="zoomIn">
                <h2> Exclusive Seasonal deals for <span class="offer">30 Days </span>at stay Royal</h2>
            </div>
            <div class="row">
                @forelse ($thirtyDayOffers as $index => $offer)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-img-wrapper">
                                <div class="about_list owl-carousel sa">
                                    @if ($index === 0)
                                        <div class="item"> <img
                                                src="{{ asset('public/assets/images/room/room-s1.jpg') }}" alt></div>
                                        <div class="item"> <img src="{{ asset('public/assets/images/room/6.jpg') }}"
                                                alt></div>
                                        <div class="item"> <img src="{{ asset('public/assets/images/room/4.jpg') }}"
                                                alt></div>
                                        <div class="item"> <img src="{{ asset('public/assets/images/room/7.jpg') }}"
                                                alt></div>
                                        <div class="item"> <img src="{{ asset('public/assets/images/room/5.jpg') }}"
                                                alt></div>
                                    @elseif ($index === 1)
                                        <div class="item"> <img
                                                src="{{ asset('public/assets/images/room/rooms2.jpg') }}" alt></div>
                                        <div class="item"> <img src="{{ asset('public/assets/images/room/5.jpg') }}"
                                                alt></div>
                                        <div class="item"> <img src="{{ asset('public/assets/images/room/7.jpg') }}"
                                                alt></div>
                                        <div class="item"> <img src="{{ asset('public/assets/images/room/4.jpg') }}"
                                                alt></div>
                                        <div class="item"> <img src="{{ asset('public/assets/images/room/6.jpg') }}"
                                                alt></div>
                                    @else
                                        <div class="item"> <img
                                                src="{{ asset('public/assets/images/room/rooms3.jpg') }}" alt></div>
                                        <div class="item"> <img src="{{ asset('public/assets/images/room/4.jpg') }}"
                                                alt></div>
                                        <div class="item"> <img src="{{ asset('public/assets/images/room/5.jpg') }}"
                                                alt></div>
                                        <div class="item"> <img src="{{ asset('public/assets/images/room/7.jpg') }}"
                                                alt></div>
                                        <div class="item"> <img src="{{ asset('public/assets/images/room/6.jpg') }}"
                                                alt></div>
                                    @endif
                                </div>
                                <div class="discount-badge">{{ $offer->offer_price }}% OFF</div>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title">
                                    {{ $offer->roomType->room_type ?? 'Room' }} - 30 Days Offer
                                    <br>{{ $offer->offer_price }}% Off
                                </h5>
                                <div class="luxury-button card-d" data-cue="zoomIn">

                                    <a
                                        href="{{ route('roomdetails', ['slug' => $offer->room->slug, 'offer_id' => $offer->slug]) }}">BOOK
                                        NOW</a>

                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>No 30-day offers available at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <section class="gallery py-5">
        <div class="container">
            <h2 class="text-center mb-4">Our Gallery</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                <!-- Gallery Item -->
                <div class="col-md-3">
                    <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#zoomModal"
                        data-img="{{ asset('public/assets/images/room/gallery1.jpg') }}" data-caption="Luxury Suite">
                        <img src="{{ asset('public/assets/images/room/gallery1.jpg') }}" alt="Luxury Suite">
                        <div class="overlay">
                            <i class="bi bi-zoom-in"></i>
                        </div>
                    </div>
                </div>
                <!-- Repeat for images -->
                <div class="col-md-6">
                    <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#zoomModal"
                        data-img="{{ asset('public/assets/images/room/gallery2s.jpg') }}" data-caption="Cozy Lobby">
                        <img src="{{ asset('public/assets/images/room/gallery2s.jpg') }}" alt="Cozy Lobby">
                        <div class="overlay">
                            <i class="bi bi-zoom-in"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#zoomModal"
                        data-img="{{ asset('public/assets/images/room/gallery2.jpg') }}" data-caption="Rooftop Pool">
                        <img src="{{ asset('public/assets/images/room/gallery2.jpg') }}" alt="Rooftop Pool">
                        <div class="overlay">
                            <i class="bi bi-zoom-in"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#zoomModal"
                        data-img="{{ asset('public/assets/images/room/gallery3s.jpg') }}" data-caption="Rooftop Pool">
                        <img src="{{ asset('public/assets/images/room/gallery3s.jpg') }}" alt="Rooftop Pool">
                        <div class="overlay">
                            <i class="bi bi-zoom-in"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#zoomModal"
                        data-img="{{ asset('public/assets/images/room/gallery3.jpg') }}" data-caption="Rooftop Pool">
                        <img src="{{ asset('public/assets/images/room/gallery3.jpg') }}" alt="Rooftop Pool">
                        <div class="overlay">
                            <i class="bi bi-zoom-in"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#zoomModal"
                        data-img="{{ asset('public/assets/images/room/gallery4.jpg') }}" data-caption="Rooftop Pool">
                        <img src="{{ asset('public/assets/images/room/gallery4.jpg') }}" alt="Rooftop Pool">
                        <div class="overlay">
                            <i class="bi bi-zoom-in"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <section class="client-logo-section">
            <div class="container-fluid">
                <div class="owl-carousel client-logo-slider">
                    <div class="client-logo"><img src="{{ asset('public/assets/images/home-1/booking-com.svg') }}"
                            alt="Logo 1"></div>
                    <div class="client-logo"><img src="{{ asset('public/assets/images/home-1/Airbnb.png') }}"
                            alt="Logo 2"></div>
                    <div class="client-logo"><img src="{{ asset('public/assets/images/home-1/agoda.svg') }}"
                            alt="Logo 3"></div>
                    <div class="client-logo"><img src="{{ asset('public/assets/images/home-1/Expedia.png') }}"
                            alt="Logo 4"></div>
                    <div class="client-logo"><img src="{{ asset('public/assets/images/home-1/MakeMyTrip_Logo.png') }}"
                            alt="Logo 5"></div>
                    <!-- Add more logos as needed -->
                </div>
            </div>
        </section>
        <div class="modal fade" id="zoomModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content bg-transparent border-0">
                    <div class="modal-body p-0 text-center">
                        <img src="" id="modalImage" class="img-fluid rounded" alt="Zoomed">
                    </div>
                </div>
            </div>
        </div>
        <div class="testimonial-area inner">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="section-title two" data-cue="zoomIn">
                            <h4>Luxury Hotel And Resort</h4>
                            <h2 style="color: white;">Hear From Our Happy Guests</h2>
                            <p class="section-desc-2 at">At Stay Royal – BNB, guest satisfaction is our top priority.
                                Here's
                                what our valued travelers and tourists have to say about their luxurious experiences with
                                us.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row border-add" data-cue="zoomIn">
                    <div class="testi-list-inner owl-carousel">
                        <div class="col-md-12">
                            <div class="single-testimonial-box">
                                <div class="testimonial-content">
                                    <p>"Staying at Stay Royal was beyond amazing. The comfort, ambiance, and service were
                                        truly
                                        royal. Highly recommended!"
                                    </p>
                                    <div class="testi-reating">
                                        <ul>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <div class="testi-quote">
                                        <img src="{{ asset('public/assets/images/inner/testi-quote.png') }}"alt="">
                                    </div>
                                </div>
                                <div class="testi-author">
                                    <div class="testi-title">
                                        <h4>Mukul Sharma</h4>
                                        <p>Traveller</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="single-testimonial-box">
                                <div class="testimonial-content">
                                    <p>"The attention to detail and the warm hospitality made my stay unforgettable.
                                        Everything
                                        was perfect!"
                                    </p>
                                    <div class="testi-reating">
                                        <ul>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <div class="testi-quote">
                                        <img src="{{ asset('public/assets/images/inner/testi-quote.png') }}"alt="">
                                    </div>
                                </div>
                                <div class="testi-author">
                                    <div class="testi-title">
                                        <h4>Deepak Rana</h4>
                                        <p>Traveler</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="single-testimonial-box">
                                <div class="testimonial-content">
                                    <p>"I travel often, but this was by far the best BNB experience. From the interiors to
                                        the
                                        staff, everything felt five-star."
                                    </p>
                                    <div class="testi-reating">
                                        <ul>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <div class="testi-quote">
                                        <img src="public/assets/images/inner/testi-quote.png" alt="">
                                    </div>
                                </div>
                                <div class="testi-author">
                                    <div class="testi-title">
                                        <h4>Vishal Thakur</h4>
                                        <p>Tourist</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
