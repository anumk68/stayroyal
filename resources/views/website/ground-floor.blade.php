@extends('website.layouts.layout')
@section('meta_title', $metatitle)
@section('meta_description', $metaDescription)

@section('content')
    <!--==================================================-->
    <!-- Start Royella Breadcumb Area -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <div class="breadcumb-area"
        style="background: linear-gradient(0deg, rgb(0 0 0 / 54%), rgb(0 0 0 / 34%)), url({{ asset('public/assets/images/room/about-b.jpg') }}); background-position: center; background-repeat: no-repeat; background-size: cover; ">
        <div class="container">
            <div class=" align-items-center breadcum-title">
                @if ($details)
                    <h1 style="color: rgb(255, 255, 255);">
                        @if (!empty($details->slug) && !empty($offer->slug))
                            {{ ucwords(str_replace('-', ' ', $details->slug . ' / ' . $offer->slug)) }}
                        @elseif(!empty($details->slug))
                            {{ ucwords(str_replace('-', ' ', $details->slug)) }}
                        @endif
                    </h1>
                @else
                    <h1 style="color: red;">Luxury Villa - Ground Floor</h1>
                @endif


            </div>
        </div>
    </div>

    <div class="room-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="swiper gallery-top">
                        <div class="swiper-wrapper">
                            @foreach (json_decode($details->room_images, true) ?: [] as $img)
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/app/public/' . $img) }}"
                                        onerror="this.onerror=null; this.src='{{ asset('public/' . $img) }}';"
                                        alt="First Floor 2BHK Villa Mohali">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div class="swiper gallery-thumbs">
                        <div class="swiper-wrapper">
                            @foreach (json_decode($details->room_images, true) ?: [] as $img)
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/app/public/' . $img) }}"
                                        onerror="this.onerror=null; this.src='{{ asset('public/' . $img) }}';"
                                        alt="Stay Royal Villa Mohali">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="room-details-content">
                                <h4>Luxury Room</h4>
                                {{-- <h1>{{ $details->room_type }}</h1> --}}
                                @if ($details->description)
                                    <p class="room-detils-desc" data-cue="zoomIn">
                                        {!! $details->description !!}
                                    </p>
                                @else
                                    <p class="room-detils-desc" data-cue="zoomIn">Rapidiously myocardinate cross-platform
                                        intellectual capital after
                                        marketing model. Appropriately create interactive infrastructures after maintainable
                                        are
                                        Holisticly facilitate stand-alone inframe extend state of the art benefits via
                                        web-enabled value.
                                        Completely fabricate extensible infomediaries rather than reliable e-services.
                                        Dramatically
                                        whiteboard alternative
                                    </p>

                                    <div class="room-details-check-box" data-cue="zoomIn">
                                        <div class="room-details-check-content">
                                            <span><img src="{{ asset('public/assets/images/inner/room-details-1.png') }}"
                                                    alt="Stay Royal Villa Mohali">Check In</span>
                                            <p class="check-item"><i class="bi bi-check2"></i>Check-in from 9:00 AM –
                                                Anytime
                                            </p>
                                            <p class="check-item"><i class="bi bi-check2"></i>Early check-in available
                                                (subject
                                                to availability)
                                            </p>

                                        </div>
                                    </div>

                                    <div class="room-details-check-box upper" data-cue="zoomIn">
                                        <div class="room-details-check-content">
                                            <span><img src="{{ asset('public/assets/images/inner/room-details-2.png') }}"
                                                    alt="Stay Royal Villa Mohali">Check Out</span>
                                            <p class="check-item"><i class="bi bi-check2"></i>Standard check-out by 12:00 PM
                                                (noon)
                                            </p>
                                            <p class="check-item"><i class="bi bi-check2"></i>Late check-out up to 9:00 AM –
                                                Anytime, based on availability

                                            </p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="booking-list">
                                <div class="booking-list-content">
                                    <h4>Booking</h4>
                                </div>

                                @if ($errors->has('booking_error'))
                                    <div style="color: red; margin-bottom: 10px;">
                                        {!! $errors->first('booking_error') !!}
                                    </div>
                                @endif

                                <div class="booking-item">
                                    @php
                                        use Carbon\Carbon;

                                        $hasOffer = request()->segment(3);
                                        $discount = $offer->offer_price ?? 0;
                                        $originalPrice = $details->price ?? 0;
                                        $discountPr =
                                            $discount > 0
                                                ? $originalPrice - ($originalPrice * $discount) / 100
                                                : $originalPrice;

                                        $offerDuration = $offer->offer_valid_time ?? null;
                                        $hasDurationOffer = $offerDuration !== null;

                                        $finalPrice = $discountPr;
                                        $totalOfferDays = 0;

                                        if ($hasDurationOffer) {
                                            preg_match('/(\d+)\s*(day|week|days|weeks)/i', $offerDuration, $matches);

                                            if (!empty($matches)) {
                                                $number = (int) $matches[1];
                                                $unit = strtolower($matches[2]);

                                                $multiplier = in_array($unit, ['week', 'weeks']) ? 7 : 1;
                                                $totalOfferDays = $number * $multiplier;

                                                $discountPrice = $discountPr * $totalOfferDays;
                                            }
                                        }
                                        if ($originalPrice) {
                                            preg_match('/(\d+)\s*(day|week|days|weeks)/i', $offerDuration, $matches);

                                            if (!empty($matches)) {
                                                $number = (int) $matches[1];
                                                $unit = strtolower($matches[2]);

                                                $multiplier = in_array($unit, ['week', 'weeks']) ? 7 : 1;
                                                $totalOfferDays = $number * $multiplier;

                                                $originalPricelast = $originalPrice * $totalOfferDays;
                                            }
                                        }
                                        $today = Carbon::today();
                                        $checkInDate = $today->format('Y-m-d');
                                        $checkOutDate = $hasDurationOffer
                                            ? $today->copy()->addDays($totalOfferDays)->format('Y-m-d')
                                            : $data['end_date'] ?? '';
                                    @endphp

                                    <form action="{{ route('user.details', $details->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="price" id="price"
                                            value="{{ $discount > 0 ? $discountPrice : $originalPrice }}">
                                        <input type="hidden" name="total_days" id="total_days"
                                            value="{{ $hasDurationOffer ? $offerDuration : '' }}">
                                        <input type="hidden" name="room_id" value="{{ $details->id }}">


                                        <!-- Date & Room Type Section (unchanged) -->
                                        <div style="display:flex;gap:20px;flex-wrap:wrap;">

                                            <!-- Check-in -->
                                            <input type="date" id="start_date" name="start_date"
                                                value="{{ $checkInDate }}" {{ $hasDurationOffer }} required
                                                style="width:100%;padding:10px 15px;border-radius:8px;border:1px solid #ccc;height:45px;">

                                            @php
                                                $tomorrow = \Carbon\Carbon::tomorrow()->format('Y-m-d');
                                            @endphp

                                            <input type="date" id="end_date" name="end_date"
                                                value="{{ $tomorrow }}" {{ $hasDurationOffer ? 'readonly' : '' }}
                                                required
                                                style="width:100%;padding:10px 15px;border-radius:8px;border:1px solid #ccc;height:45px;">

                                            <!-- Room Type -->
                                            <div style="flex:1;min-width:250px;">
                                                <label for="room_type">Room Type</label>
                                                <select id="room_type" name="room_type" required
                                                    style="width:100%;padding:10px 15px;border-radius:8px;border:1px solid #ccc;height:45px;">
                                                    @foreach ($roomtypes as $roomtype)
                                                        @foreach ($roomtype->rooms as $room)
                                                            @php
                                                                $words = explode(' ', $roomtype->room_type);
                                                                $roomType = strtolower(end($words));
                                                            @endphp
                                                            <option value="{{ $roomtype->id }}"
                                                                data-roomtype="{{ $roomType }}"
                                                                data-price="{{ $room->price }}"
                                                                @selected(isset($details->id) && $details->id == $room->id)>
                                                                {{ $roomtype->room_type }}
                                                            </option>
                                                        @endforeach
                                                    @endforeach
                                                </select>

                                            </div>
                                            <!-- Guests -->
                                            <div style="flex:1;min-width:250px;position:relative;">
                                                <label>Guests</label>
                                                <div id="guestTrigger"
                                                    style="width:100%;padding:10px 15px;border-radius:8px;border:1px solid #ccc;height:auto;cursor:pointer;position:relative;background:white;">
                                                    <span id="guestSummary">Select Guests</span>
                                                    <span
                                                        style="position:absolute;top:50%;right:15px;transform:translateY(-50%);pointer-events:none;color:#888;">▼</span>
                                                </div>
                                                <input type="hidden" name="total_days" id="total_days">
                                                <div id="guestDropdown" class="guest-dropdown">
                                                    <!-- Adults -->
                                                    <div class="guest-row">
                                                        <span>Adults</span>
                                                        <div class="guest-controls d-flex align-items-center gap-2">
                                                            <button type="button" class="guest-minus"
                                                                data-type="adult">−</button>
                                                            <span id="adultCount">1</span>
                                                            <input type="hidden" name="adults" id="adultInput"
                                                                value="1">
                                                            <button type="button" class="guest-plus"
                                                                data-type="adult">+</button>
                                                        </div>
                                                    </div>
                                                    <!-- Children -->
                                                    <div class="guest-row">
                                                        <span>Children</span>
                                                        <div class="guest-controls d-flex align-items-center gap-2">
                                                            <button type="button" class="guest-minus"
                                                                data-type="child">−</button>
                                                            <span id="childCount">0</span>
                                                            <input type="hidden" name="children" id="childInput"
                                                                value="0">
                                                            <button type="button" class="guest-plus"
                                                                data-type="child">+</button>
                                                        </div>
                                                    </div>
                                                    <!-- Infant -->
                                                    <div class="guest-row">
                                                        <span>Infants</span>
                                                        <div class="guest-controls d-flex align-items-center gap-2">
                                                            <button type="button" class="guest-minus"
                                                                data-type="infant">−</button>
                                                            <span id="infantCount">0</span>
                                                            <input type="hidden" name="infants" id="infantInput"
                                                                value="0">
                                                            <button type="button" class="guest-plus"
                                                                data-type="infant">+</button>
                                                        </div>
                                                    </div>
                                                    <!-- Extra Bed -->
                                                    <div class="guest-row">
                                                        <span>Extra Bed</span>
                                                        <div class="guest-controls d-flex align-items-center gap-2">
                                                            <button type="button" class="guest-minus"
                                                                data-type="extra">−</button>
                                                            <span id="extraCount">0</span>
                                                            <input type="hidden" name="extra_beds" id="extraInput"
                                                                value="0">
                                                            <button type="button" class="guest-plus"
                                                                data-type="extra">+</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Price Display Button -->
                                        <div style="text-align:center;margin-top:30px;">
                                            <button class="pay" type="submit">
                                                @if ($discount > 0)
                                                    <div style="margin-bottom: 5px;">
                                                        <span id="original-price"
                                                            style="text-decoration:line-through;color:#999;">
                                                            Original:
                                                            ₹{{ number_format($originalPricelast ?? $originalPrice, 2) }}
                                                        </span><br>
                                                        <span style="color:green;">
                                                            Discount ({{ $discount }}% OFF)
                                                        </span>
                                                    </div>
                                                @endif

                                                Total Price: Rs. <span id="room-price">
                                                    {{ number_format($discount > 0 ? $discountPrice : $originalPrice, 2) }}
                                                </span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @if ($details->amenities)
                                @php
                                    $amenities = json_decode($details->amenities, true);
                                @endphp

                                @if (!empty($amenities))
                                    <div class="room-details-amenities mt-3">
                                        <div class="room-details-amenities-content">
                                            <h4>Amenities</h4>
                                        </div>
                                        <div class="room-amenities-item">
                                            <ul>
                                                @foreach ($amenities as $amenity)
                                                    <li>
                                                        <i class="bi bi-check2"></i>
                                                        @if (!empty($amenity['icon']))
                                                            <img src="{{ asset('storage/app/public/' . $amenity['icon']) }}"
                                                                alt="3BHK Luxury Villa Aerocity" width="20"
                                                                height="20" style="margin-right: 8px;">
                                                        @endif
                                                        {{ $amenity['text'] ?? '' }}
                                                    </li>
                                                @endforeach
                                            </ul>

                                        </div>
                                    </div>
                                @endif
                            @endif

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <section class="room ">
        <!--room-area-->
        <div class="room-area room-d">
            <div class="container">
                <div class="section-title center text-center" data-cue="zoomIn">
                    <div class="section-thumb text-center">
                        <img src="{{ asset('public/assets/images/inner/stay-logo.png') }}"
                            alt="3BHK Luxury Villa Aerocity">
                    </div>
                    <h2>Ground Floor, First Floor or Complete Villa – Luxury That Fits Your Stay
                    </h2>
                    <p class="section-desc-1">Stay Royal BNB in Mohali offers a personalized luxury stay for every need.
                        Choose the luxurious comfort of our 2BHK ground floor, the peaceful charm of the 2BHK first floor,
                        or experience complete indulgence with our full 4BHK villa. Each space is thoughtfully designed with
                        premium interiors, modern amenities and a serene ambiance making Stay Royal the best homestay in
                        Mohali for families, couples and groups alike.

                    </p>
                </div>
                <div class="room_listowl-carousel row">
                    @if ($rooms)
                        @foreach ($rooms as $room)
                            <div class="col-md-4 mb-3">
                                <div class="room-single-box">
                                    <div class="room-thumb">
                                        <div class="about_list owl-carousel sa">
                                            @foreach (json_decode($room->room_images, true) ?: [] as $img)
                                                <div class="item">
                                                    <img src="{{ asset('storage/app/public/' . $img) }}"
                                                        onerror="this.onerror=null; this.src='{{ asset('public/' . $img) }}';"
                                                        alt="3BHK Luxury Villa Aerocity">
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
                                                        alt="3BHK Luxury Villa Aerocity">
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
                                                            alt="Stay Royal Villa Mohali">
                                                    </li>
                                                    <span class="tooltiptext"> Free Wi-Fi</span>
                                                </div>
                                                <div class="tooltip">
                                                    <li><img src="{{ asset('public/assets/images/home-1/Parking1.png') }}"
                                                            alt="Stay Royal Villa Mohali">
                                                    </li>
                                                    <span class="tooltiptext">Parking</span>
                                                </div>
                                                <div class="tooltip">
                                                    <li><img src="{{ asset('public/assets/images/home-1/Refrigerator1.png') }}"
                                                            alt="Stay Royal Villa Mohali"></li>
                                                    <span class="tooltiptext"> Refrigerator</span>
                                                </div>
                                                <div class="tooltip">
                                                    <li><img src="{{ asset('public/assets/images/home-1/Self Key Unlocking1.png') }}"
                                                            alt="Stay Royal Villa Mohali"></li>
                                                    <span class="tooltiptext"> Self Key Unlocking</span>
                                                </div>
                                                <div class="tooltip">
                                                    <li><img src="{{ asset('public/assets/images/home-1/Toiletries1.png') }}"
                                                            alt="Stay Royal Villa Mohali"></li>
                                                    <span class="tooltiptext"> Toiletries</span>
                                                </div>
                                                <div class="tooltip">
                                                    <li><img src="{{ asset('public/assets/images/home-1/Hair Dryer1.png') }}"
                                                            alt="Stay Royal Villa Mohali"></li>
                                                    <span class="tooltiptext">Hair Dryer</span>
                                                </div>

                                            </div>
                                            <div class="room-bottom-icon mt-2">

                                                <div class="tooltip">
                                                    <li><img src="{{ asset('public/assets/images/home-1/Towel1.png') }}"
                                                            alt="First Floor 2BHK Villa Mohali">
                                                    </li>
                                                    <span class="tooltiptext">Towel</span>
                                                </div>
                                                <div class="tooltip">
                                                    <li><img src="{{ asset('public/assets/images/home-1/Washing Machine1.png') }}"
                                                            alt="First Floor 2BHK Villa Mohali"></li>
                                                    <span class="tooltiptext">Washing Machine</span>
                                                </div>
                                                <div class="tooltip">
                                                    <li><img src="{{ asset('public/assets/images/home-1/Water Purifier1.png') }}"
                                                            alt="First Floor 2BHK Villa Mohali"></li>
                                                    <span class="tooltiptext">Water Purifier</span>
                                                </div>
                                                <div class="tooltip">
                                                    <li><img src="{{ asset('public/assets/images/home-1/Electric Iron1.png') }}"
                                                            alt="First Floor 2BHK Villa Mohali"></li>
                                                    <span class="tooltiptext">Electric Iron</span>
                                                </div>
                                                <div class="tooltip">
                                                    <li><img src="{{ asset('public/assets/images/home-1/electric kettle1.png') }}"
                                                            alt="First Floor 2BHK Villa Mohali"></li>
                                                    <span class="tooltiptext">Electric kettle</span>
                                                </div>
                                                <div class="tooltip">
                                                    <li><i class="fa-solid fa-tv"></i></li>
                                                    <span class="tooltiptext">Smart Tv</span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        @foreach ($weekOffers as $offer)
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-img-wrapper">
                                        <div class="about_list owl-carousel sa">
                                            <div class="item"> <img
                                                    src="{{ asset('public/assets/images/room/6.jpg') }}"
                                                    alt="Luxury Living Room">
                                            </div>
                                            <div class="item"> <img
                                                    src="{{ asset('public/assets/images/room/5.jpg') }}"
                                                    alt="Luxury Living Room">
                                            </div>
                                            <div class="item"> <img
                                                    src="{{ asset('public/assets/images/room/4.jpg') }}"
                                                    alt="Luxury Living Room">
                                            </div>
                                            <div class="item"> <img
                                                    src="{{ asset('public/assets/images/room/7.jpg') }}"
                                                    alt="Luxury Living Room">
                                            </div>
                                            <div class="item"> <img
                                                    src="{{ asset('public/assets/images/room/8.jpg') }}"
                                                    alt="Luxury Living Room">
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
                    @endif
                </div>
            </div>
        </div>
    </section>

    <script type="application/ld+json">
        {!! $details->schema_seo !!}
    </script>
    <section class="faq-section py-5">
        <div class="container">
            <div class="row align-items-center g-4">

                <!-- Left: Image -->
                <div class="col-md-6 text-center">
                    <img src="{{ asset('public/assets/images/question-mark-query-information-support-service-graphic.webp') }}"
                        alt="FAQ" class="img-fluid rounded shadow">
                </div>

                <!-- Right: FAQ -->
                <div class="col-md-6">
                    <h2 class="mb-4 fw-bold text-uppercase text-gold">Frequently Asked Questions</h2>

                    <div class="accordion" id="faqAccordion">
                        @forelse($faqs as $index => $faq)
                            @php
                                $collapseId = 'collapse' . $index;
                                $headingId = 'heading' . $index;
                            @endphp

                            <div class="accordion-item border-0 mb-2">
                                <h2 class="accordion-header" id="{{ $headingId }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#{{ $collapseId }}" aria-expanded="false"
                                        aria-controls="{{ $collapseId }}">
                                        {{ $index + 1 }}. {{ $faq->question }}
                                    </button>
                                </h2>
                                <div id="{{ $collapseId }}" class="accordion-collapse collapse"
                                    aria-labelledby="{{ $headingId }}" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        {{ $faq->answer }}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted">No FAQs found.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (session('must_login'))
        <div class="modal fade" id="mustLoginModal" tabindex="-1" aria-labelledby="mustLoginModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content shadow-lg border-0 rounded-3">
                    <div class="modal-header bg-primary text-white border-0">
                        <h5 class="modal-title" id="mustLoginModalLabel">Login Required</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>You need to <strong>log in or register</strong> before booking a room.</p>
                    </div>
                    <div class="modal-footer border-0">
                        <a href="{{ route('user.register') }}" class="btn btn-primary">Go to Register</a>
                        <a href="{{ route('user.login') }}" class="btn btn-outline-secondary">Go to Login</a>
                    </div>
                </div>
            </div>
        </div>
    @endif


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const roomSelect = document.getElementById("room_type");
            const checkInInput = document.getElementById("start_date");
            const checkOutInput = document.getElementById("end_date");
            const priceDisplay = document.getElementById("room-price");
            const hiddenPriceInput = document.getElementById("price");
            const originalPriceDisplay = document.getElementById("original-price");

            let discountPercent = {{ $discount ?? 0 }};
            let offerDuration = {!! json_encode($offerDuration ?? '') !!};


            function parseDurationToDays(duration) {
                let days = 1;
                if (duration.includes("week")) {
                    const num = parseInt(duration);
                    days = num * 7;
                } else if (duration.includes("day")) {
                    const num = parseInt(duration);
                    days = num;
                }
                return days;
            }

            function getDaysDifference(start, end) {
                const sDate = new Date(start);
                const eDate = new Date(end);
                const diffTime = eDate - sDate;
                const diffDays = diffTime > 0 ? Math.ceil(diffTime / (1000 * 60 * 60 * 24)) : 1;
                return diffDays;
            }

            function updateEndDateIfOffer() {
                if (offerDuration.trim() !== "") {
                    const start = new Date(checkInInput.value);
                    const offerDays = parseDurationToDays(offerDuration);
                    const newEnd = new Date(start);
                    newEnd.setDate(start.getDate() + offerDays);

                    // Format to YYYY-MM-DD
                    const formatted = newEnd.toISOString().split('T')[0];
                    checkOutInput.value = formatted;
                }
            }

            function updatePrice() {
                const selectedRoom = roomSelect.options[roomSelect.selectedIndex];
                const roomPrice = parseFloat(selectedRoom.getAttribute("data-price")) || 0;

                const startDate = checkInInput.value;
                const endDate = checkOutInput.value;

                const days = getDaysDifference(startDate, endDate);

                let originalTotal = roomPrice * days;
                let discountedTotal = originalTotal;
                console.log(discountPercent, '2')

                if (discountPercent > 0) {
                    discountedTotal = originalTotal - (originalTotal * discountPercent) / 100;
                }

                // Update both prices
                priceDisplay.textContent = discountedTotal.toFixed(2);
                hiddenPriceInput.value = discountedTotal.toFixed(2);

                if (discountPercent > 0) {
                    originalPriceDisplay.textContent = "Original: ₹" + originalTotal.toFixed(2);
                    console.log(originalPriceDisplay, '3')
                    originalPriceDisplay.style.display = "inline";
                } else {
                    originalPriceDisplay.style.display = "none";
                }
            }

            checkInInput.addEventListener("change", function() {
                updateEndDateIfOffer();
                updatePrice();
            });

            roomSelect.addEventListener("change", updatePrice);
            checkOutInput.addEventListener("change", updatePrice);

            // Initial call
            updateEndDateIfOffer();
            updatePrice();
        });
    </script>


    <!-- ============================== -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const guestTrigger = document.getElementById('guestTrigger');
            const guestDropdown = document.getElementById('guestDropdown');
            const guestSummary = document.getElementById('guestSummary');
            const priceDisplay = document.getElementById('room-price');
            const hiddenPriceInput = document.getElementById('price');
            const originalPriceDisplay = document.getElementById('original-price');
            const roomSelect = document.getElementById('room_type');
            const checkInInput = document.getElementById('start_date');
            const checkOutInput = document.getElementById('end_date');

            let discountPercent = {!! json_encode($discount ?? 0) !!};
            if (isNaN(discountPercent)) discountPercent = 0;

            let guestCounts = {
                adult: 1,
                child: 0,
                infant: 0,
                extra: 0
            };

            const feeRules = {
                '2bhk': {
                    adultMax: 4,
                    childMax: 2,
                    childFreeLimit: 1,
                    infantMax: 2,
                    extraMax: 2,
                    extraBedFee: 1000,
                    childExtraFee: 1000
                },
                '4bhk': {
                    adultMax: 8,
                    childMax: 4,
                    childFreeLimit: 3,
                    infantMax: 4,
                    extraMax: 4,
                    extraBedFee: 1000,
                    childExtraFee: 1000
                },
                '3bhk': {
                    adultMax: 6,
                    childMax: 3,
                    childFreeLimit: 1,
                    infantMax: 3,
                    extraMax: 3,
                    extraBedFee: 1500,
                    childExtraFee: 1500
                }
            };

            function getRoomType() {
                return roomSelect.selectedOptions[0].getAttribute('data-roomtype'); // '2bhk' or '4bhk'
            }

            function showAlert(msg) {
                alert(msg);
            }

            function calculateDays(startDateStr, endDateStr) {
                const start = new Date(startDateStr);
                const end = new Date(endDateStr);
                const diffTime = end - start;
                return Math.max(1, Math.ceil(diffTime / (1000 * 60 * 60 * 24)));
            }

            function updateGuestSummaryAndFees() {
                const roomType = getRoomType();
                const rules = feeRules[roomType];
                const basePrice = parseFloat(roomSelect.selectedOptions[0].getAttribute('data-price')) || 0;
                console.log(basePrice, '1')

                let summary = [];
                let extraCharge = 0;
                let feeMessages = [];

                if (guestCounts.adult > 0)
                    summary.push(`${guestCounts.adult} Adult${guestCounts.adult > 1 ? 's' : ''}`);
                if (guestCounts.child > 0)
                    summary.push(`${guestCounts.child} Child${guestCounts.child > 1 ? 'ren' : ''}`);
                if (guestCounts.infant > 0)
                    summary.push(`${guestCounts.infant} Infant${guestCounts.infant > 1 ? 's' : ''}`);
                if (guestCounts.extra > 0)
                    summary.push(`${guestCounts.extra} Extra Bed${guestCounts.extra > 1 ? 's' : ''}`);

                // Child fee logic
                if (guestCounts.child > rules.childFreeLimit) {
                    if (
                        (roomType === '2bhk' && guestCounts.adult === rules.adultMax) ||
                        (roomType === '4bhk' && guestCounts.adult >= rules.adultMax) ||
                        (roomType === '3bhk' && guestCounts.adult >= rules.adultMax)
                    ) {
                        extraCharge += rules.childExtraFee;
                        feeMessages.push(`₹${rules.childExtraFee} extra for additional child.`);

                    }
                }

                if (guestCounts.extra > 0) {
                    // 1) Try to read offer days from hidden input
                    const raw = (document.getElementById('total_days')?.value || '').trim();
                    let chargeDays = NaN;

                    if (raw) {
                        // Accept "1 week", "3 days", "7", etc.
                        // If raw is pure number like "7", treat it as days.
                        const pureNum = /^\d+$/.test(raw) ? parseInt(raw, 10) : NaN;

                        if (Number.isFinite(pureNum)) {
                            chargeDays = pureNum;
                        } else {
                            const m = raw.match(/(\d+)\s*(day|week|days|weeks)/i);
                            if (m) {
                                const num = parseInt(m[1], 10);
                                const unit = m[2].toLowerCase();
                                chargeDays = num * (unit.startsWith('week') ? 7 : 1);
                            }
                        }
                    }

                    // 2) Fallback to date difference if offer not present / not parsable
                    if (!Number.isFinite(chargeDays) || chargeDays <= 0) {
                        chargeDays = calculateDays(checkInInput.value, checkOutInput.value);
                    }

                    // 3) Per-day × days
                    const feePerDay = guestCounts.extra * rules.extraBedFee; // beds × 1000/day
                    const fee = feePerDay * chargeDays;

                    extraCharge += fee;
                    feeMessages.push(
                        `₹${rules.extraBedFee}/day per extra bed × ${guestCounts.extra} × ${chargeDays} day(s) = ₹${fee}.`
                    );
                }



                guestSummary.innerText = summary.join(', ') + (feeMessages.length > 0 ?
                    ` (${feeMessages.join(', ')})` : '');

                const startDate = checkInInput.value;
                const endDate = checkOutInput.value;
                const days = calculateDays(startDate, endDate);


                const originalTotal = basePrice * days;

                const totalBeforeDiscount = originalTotal + extraCharge;


                let finalPrice = totalBeforeDiscount;
                console.log(finalPrice, 'anu')

                if (discountPercent > 0) {
                    finalPrice = finalPrice - (finalPrice * discountPercent) / 100;
                }

                hiddenPriceInput.value = finalPrice.toFixed(2);
                priceDisplay.innerText = finalPrice.toFixed(2);
                console.log(priceDisplay.innerText, 'test')
                const originalPriceDisplay = document.getElementById('originalPrice');

                if (originalPriceDisplay) {
                    if (discountPercent > 0 || extraCharge > 0) {
                        originalPriceDisplay.innerText = `Original: ₹${totalBeforeDiscount.toFixed(2)}`;
                        console.log(originalPriceDisplay, 'test2')
                        originalPriceDisplay.style.display = 'inline';
                    } else {
                        originalPriceDisplay.style.display = 'none';
                    }
                }


                // Sync inputs
                for (const type in guestCounts) {
                    document.getElementById(`${type}Count`).innerText = guestCounts[type];
                    document.getElementById(`${type}Input`).value = guestCounts[type];
                }
            }

            function adjustGuest(type, change) {
                const roomType = getRoomType();
                const rules = feeRules[roomType];

                let current = guestCounts[type] + change;

                switch (type) {
                    case 'adult':
                        if (current > rules.adultMax) {
                            showAlert(`Max ${rules.adultMax} adults allowed.`);
                            return;
                        }
                        guestCounts.adult = Math.max(1, current);
                        break;
                    case 'child':
                        if (current > rules.childMax) {
                            showAlert(`Max ${rules.childMax} children allowed.`);
                            return;
                        }
                        guestCounts.child = Math.max(0, current);
                        break;
                    case 'infant':
                        if (current > rules.infantMax) {
                            showAlert(`Max ${rules.infantMax} infants allowed.`);
                            return;
                        }
                        guestCounts.infant = Math.max(0, current);
                        break;
                    case 'extra':
                        if (current > rules.extraMax) {
                            showAlert(`Max ${rules.extraMax} extra beds allowed.`);
                            return;
                        }
                        guestCounts.extra = Math.max(0, current);
                        break;
                }

                updateGuestSummaryAndFees();
            }

            // Events
            guestTrigger.addEventListener('click', function(e) {
                e.stopPropagation();
                guestDropdown.style.display = guestDropdown.style.display === 'block' ? 'none' : 'block';
            });

            document.addEventListener('click', function(e) {
                if (!guestDropdown.contains(e.target) && e.target !== guestTrigger) {
                    guestDropdown.style.display = 'none';
                }
            });

            document.querySelectorAll('.guest-plus').forEach(btn => {
                btn.addEventListener('click', function() {
                    adjustGuest(btn.dataset.type, 1);
                });
            });

            document.querySelectorAll('.guest-minus').forEach(btn => {
                btn.addEventListener('click', function() {
                    adjustGuest(btn.dataset.type, -1);
                });
            });

            roomSelect.addEventListener('change', () => {
                guestCounts = {
                    adult: 1,
                    child: 0,
                    infant: 0,
                    extra: 0
                };
                updateGuestSummaryAndFees();
            });

            checkInInput.addEventListener('change', updateGuestSummaryAndFees);
            checkOutInput.addEventListener('change', updateGuestSummaryAndFees);

            // Initial Call
            updateGuestSummaryAndFees();
        });
    </script>


@endsection
