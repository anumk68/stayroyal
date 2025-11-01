@extends('website.layouts.layout')
@section('meta_title', $metatitle)
@section('meta_description', $metaDescription)

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

<div class="breadcumb-area"
    style="background: linear-gradient(0deg, rgb(0 0 0 / 54%), rgb(0 0 0 / 34%)), url({{ asset('public/assets/images/room/about-b.jpg') }}); background-position: center; background-repeat: no-repeat; background-size: cover; ">
    <div class="container">
        <div class=" align-items-center breadcum-title">
            <h1 style="color: rgb(255, 255, 255);">Rooms</h1>
        </div>
    </div>
</div>


<section class="room room-area inner">
    <!--room-area-->
    <div class="room-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title center inner" data-cue="zoomIn">
                        <div class="section-thumb">
                            <img src="{{ asset('public/assets/images/inner/stay-logo.png') }}" alt="Complete 4BHK Luxury Villa Room Mohali">
                        </div>
                        <h2>Welcome to Stay Royal – Best Mohali Rooms at Stay Royal</h2>
                        <p class="section-desc-1">Welcome to Stay Royal, where comfort meets elegance in the heart of Mohali. Whether you're searching for premium rooms in Mohali or peaceful rooms in Kharar, our thoughtfully designed spaces offer the perfect blend of style, privacy, and convenience. Each room features tasteful interiors, modern amenities, and a calming ambiance tailored for both business and leisure travelers.

                        </p>
                    </div>
                </div>
            </div>
            <div class="room_listowl-carousel row">
                @foreach ($rooms as $room)
                <div class="col-md-4 mb-3">
                    <div class="room-single-box">
                        <div class="room-thumb">
                            <div class="about_list owl-carousel sa">
                                @foreach (json_decode($room->room_images, true) as $img)
                                <div class="item"> <img src="{{ asset('storage/app/public/' . $img) }}"
                                        onerror="this.onerror=null; this.src='{{ asset('public/' . $img) }}';"
                                        alt="First Floor 2BHK Villa Mohali">
                                </div>
                                @endforeach

                            </div>
                            <div class="room-details-button">
                                <a href="{{ route('roomdetails', $room->slug) }}">View Details<i
                                        class="bi bi-arrow-right"></i></a>

                            </div>
                        </div>

                        <div class="room-pricing">
                            <span class="dolar">Rs.{{ $room->price }}</span><span> Night</span>
                        </div>

                        <div class="room-content">
                            <p>Status:
                                @if ($room->is_booked)
                                <span style="color:red;">Booked</span>
                                @else
                                <span style="color:green;">Available</span>
                                @endif
                            </p>
                            <h4>Luxury Villa</h4>
                            <a href="{{ route('roomdetails', $room->slug) }}">{{ $room->roomType->room_type ?? 'N/A' }}
                            </a>
                            <p><i class="fa-solid fa-chart-area"></i> {{ $room->size }} SQ.FT</p>
                            <ul>
                                @foreach (json_decode($room->amenities, true) as $amenity)
                                <li><img src="{{ asset('storage/app/public/' . $amenity['icon']) }}"
                                        alt="3BHK Luxury Villa Room Aerocity">
                                    {{ $amenity['text'] }}
                                </li>
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
                                                alt="First Floor 2BHK Villa Mohali"></li>
                                        <span class="tooltiptext"> Free Wi-Fi</span>
                                    </div>
                                    <div class="tooltip">
                                        <li><img src="{{ asset('public/assets/images/home-1/Parking1.png') }}"
                                                alt="First Floor 2BHK Villa Mohali"></li>
                                        <span class="tooltiptext">Parking</span>
                                    </div>
                                    <div class="tooltip">
                                        <li><img src="{{ asset('public/assets/images/home-1/Refrigerator1.png') }}"
                                                alt="Complete 4BHK Luxury Villa Room Mohali"></li>
                                        <span class="tooltiptext"> Refrigerator</span>
                                    </div>
                                    <div class="tooltip">
                                        <li><img src="{{ asset('public/assets/images/home-1/Self Key Unlocking1.png') }}"
                                                alt="3BHK Luxury Villa Room Aerocity"></li>
                                        <span class="tooltiptext"> Self Key Unlocking</span>
                                    </div>
                                    <div class="tooltip">
                                        <li><img src="{{ asset('public/assets/images/home-1/Toiletries1.png') }}"
                                                alt="First Floor 2BHK Villa Room Mohali"></li>
                                        <span class="tooltiptext"> Toiletries</span>
                                    </div>
                                    <div class="tooltip">
                                        <li><img src="{{ asset('public/assets/images/home-1/Hair Dryer1.png') }}"
                                                alt="Luxury Living Room"></li>
                                        <span class="tooltiptext">Hair Dryer</span>
                                    </div>

                                </div>

                                <!-- - -->
                                <div class="room-bottom-icon mt-2">

                                    <div class="tooltip">
                                        <li><img src="{{ asset('public/assets/images/home-1/Towel1.png') }}"
                                                alt="3BHK Luxury Villa Room Aerocity"></li>
                                        <span class="tooltiptext">Towel</span>
                                    </div>
                                    <div class="tooltip">
                                        <li><img src="{{ asset('public/assets/images/home-1/Washing Machine1.png') }}"
                                                alt="Ground Floor 2BHK Villa Room Mohali"></li>
                                        <span class="tooltiptext">Washing Machine</span>
                                    </div>
                                    <div class="tooltip">
                                        <li><img src="{{ asset('public/assets/images/home-1/Water Purifier1.png') }}"
                                                alt="3BHK Luxury Villa Room Aerocity"></li>
                                        <span class="tooltiptext">Water Purifier</span>
                                    </div>
                                    <div class="tooltip">
                                        <li><img src="{{ asset('public/assets/images/home-1/Electric Iron1.png') }}"
                                                alt="Stay Royal BNB Rooms Mohali"></li>
                                        <span class="tooltiptext">Electric Iron</span>
                                    </div>
                                    <div class="tooltip">
                                        <li><img src="{{ asset('public/assets/images/home-1/electric kettle1.png') }}"
                                                alt="Stay Royal BNB Rooms Mohali"></li>
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
            </div>
        </div>
    </div>
</section>
<!-- Exclusive Seasonal Deals at -->
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
                            {{-- @foreach (json_decode($offer->room->room_images, true) ?: [] as $img)
                                            <div class="item">
                                                <img src="{{ asset('storage/app/public/' . $img) }}"
                            onerror="this.onerror=null; this.src='{{ asset('public/' . $img) }}';"
                            alt="">
                        </div>
                        @endforeach --}}
                        <div class="item"> <img src="{{ asset('public/assets/images/room/5.jpg') }}" alt="Stay Royal BNB Rooms Mohali">
                        </div>
                        <div class="item"> <img src="{{ asset('public/assets/images/room/4.jpg') }}" alt="Stay Royal BNB Rooms Mohali">
                        </div>
                        <div class="item"> <img src="{{ asset('public/assets/images/room/7.jpg') }}" alt="Stay Royal BNB Rooms Mohali">
                        </div>
                        <div class="item"> <img src="{{ asset('public/assets/images/room/8.jpg') }}" alt="Stay Royal BNB Rooms Mohali">
                        </div>
                    </div>
                    <div class="discount-badge">{{ $offer->offer_price }}% OFF</div>
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title">
                        {{ $offer->roomType->room_type ?? 'Room' }} - One Week Offer
                        <br>{{ $offer->offer_price }}% Off
                    </h5>
                    <div class="luxury-button card-d" data-cue="zoomIn">

                        <a href="{{ route('roomdetails', ['slug' => $offer->room->slug, 'offer_id' => $offer->slug]) }}">BOOK NOW</a>


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

@verbatim
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [{
    "@type": "Question",
    "name": "What types of rooms are available at Stay Royal?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Stay Royal offers a variety of rooms, including 2BHK and 4BHK villas, perfect for families, groups, and business travelers. Enjoy spacious rooms, modern amenities, and a serene ambiance in the heart of Mohali and Kharar."
    }
  },{
    "@type": "Question",
    "name": "How much does a stay in the rooms cost?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Our rooms start at ₹3500 per night for a 2BHK villa on the first floor. Prices vary based on room type, season, and availability. Check our website for exclusive offers and deals."
    }
  },{
    "@type": "Question",
    "name": "Are the rooms in Mohali suitable for families or groups?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Yes, our 2BHK and 4BHK villas in Mohali are ideal for families, groups, and corporate stays. The villas offer spacious living areas, private kitchens, and all the comforts of home."
    }
  },{
    "@type": "Question",
    "name": "Can I book a room online at Stay Royal?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Yes, you can easily book any of our rooms or villas directly through our website, stayroyal. Select your preferred room and dates, then confirm your booking instantly."
    }
  },{
    "@type": "Question",
    "name": "What amenities are available in the rooms at Stay Royal?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Our rooms are equipped with high-speed Wi-Fi, Smart TVs, modern kitchens, air conditioning, free parking, and more to ensure a comfortable and luxurious stay for both business and leisure travelers."
    }
  }]
}
</script>
@endverbatim

<section class="faq-section py-5">
    <div class="container">
        <div class="row align-items-center g-4">

            <!-- Left: Image -->
            <div class="col-md-6 text-center">
                <img src="{{ asset('public/assets/images/question-mark-query-information-support-service-graphic.webp') }}" alt="FAQ" class="img-fluid rounded shadow">
            </div>

            <!-- Right: FAQ -->
            <div class="col-md-6">
                <h2 class="mb-4 fw-bold text-uppercase text-gold">Frequently Asked Questions</h2>

                <div class="accordion" id="faqAccordion">

                    <!-- FAQ 1 -->
                    <div class="accordion-item border-0 mb-2">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                1. What types of rooms are available at Stay Royal?

                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse"
                            aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Stay Royal offers a variety of rooms, including 2BHK and 4BHK villas, perfect for families, groups, and business travelers. Enjoy spacious rooms, modern amenities, and a serene ambiance in the heart of Mohali and Kharar.

                            </div>
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="accordion-item border-0 mb-2">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                2. How much does a stay in the rooms cost?

                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse"
                            aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Our rooms start at ₹3500 per night for a 2BHK villa on the first floor. Prices vary based on room type, season, and availability. Check our website for exclusive offers and deals.

                            </div>
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="accordion-item border-0 mb-2">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">

                                3. Are the rooms in Mohali suitable for families or groups?


                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse"
                            aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, our 2BHK and 4BHK villas in Mohali are ideal for families, groups, and corporate stays. The villas offer spacious living areas, private kitchens, and all the comforts of home.

                            </div>
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="accordion-item border-0 mb-2">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">

                                4. Can I book a room online at Stay Royal?

                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse"
                            aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, you can easily book any of our rooms or villas directly through our website, stayroyal. Select your preferred room and dates, then confirm your booking instantly.

                            </div>
                        </div>
                    </div>

                    <!-- FAQ 5 -->
                    <div class="accordion-item border-0">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                5. What amenities are available in the rooms at Stay Royal?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse"
                            aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Our rooms are equipped with high-speed Wi-Fi, Smart TVs, modern kitchens, air conditioning, free parking, and more to ensure a comfortable and luxurious stay for both business and leisure travelers.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection