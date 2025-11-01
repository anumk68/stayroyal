@extends('website.layouts.layout')
@section('meta_title', $metatitle)
@section('meta_description', $metaDescription)

@section('content')
    <!--==================================================-->
    <!-- Start Royella Breadcumb Area -->
    <div class="breadcumb-area"
        style="background: linear-gradient(0deg, rgb(0 0 0 / 54%), rgb(0 0 0 / 34%)), url({{ asset('public/assets/images/room/about-b.jpg') }}); background-position: center; background-repeat: no-repeat; background-size: cover; ">
        <div class="container">
            <div class=" align-items-center breadcum-title">
                <h1 style="color: rgb(255, 255, 255);">About Us</h1>
            </div>
        </div>
    </div>

    <div class="about-area inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-video">
                        <video controls autoplay muted loop width="100%" height="auto">
                            <source src="{{ asset('public/assets/video/MicrosoftTeams-video.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                </div>
                <div class="col-lg-6  upper">
                    <div class="section-title two">
                        <h4>Feel Like Home, Stay in Style</h4>
                        <h2>About Stay Royal BNB – Mohali’s Premier Luxury Villa & Homestay</h2>
                        <p class="section-desc-2">Experience a luxurious stay in the beautiful city at Stay Royal BNB — a
                            premium luxury villa in Mohali designed for travelers who seek elegance, comfort, and peace.
                            Known as the best homestay in the region, our thoughtfully curated space blends modern living
                            with serene surroundings. Whether it’s for business, leisure, or a quiet workcation, Stay Royal
                            is your ideal homestay in Mohali.
                        </p>

                    </div>
                    <div class="about-address">
                        <p>📍 Location: Villa 87, Sector 125, Jhungiyan, Kharar, Punjab 140301</p>
                    </div>
                    <div class="luxury-button">
                        <a href="{{ route('rooms') }}">Booking Online</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="feature-area inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title center inner" data-cue="zoomIn">
                        <div class="section-thumb">
                            <img src="{{ asset('public/assets/images/inner/stay-logo.png') }}"
                                alt="Luxury Villas in Mohali">
                        </div>
                        <h2>Our Amenities</h2>
                        <p class="section-desc-1">Designed to elevate your stay — seamless comfort, modern features and
                            everything you need right where you stay.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="single-feature-box" data-cue="zoomIn">
                        <div class="feature-icon">
                            <img src="{{ asset('public/assets/images/home-1/Comfy & Clean Rooms.png') }}"
                                alt="Villa Stay Offers Mohali">
                        </div>
                        <div class="feature-content new-f">
                            <h4>Comfy & Clean Rooms</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="single-feature-box" data-cue="zoomIn">
                        <div class="feature-icon ">
                            <img src="{{ asset('public/assets/images/home-1/Fast Wi-Fi.png') }}"
                                alt="Villa Stay Offers Mohali">
                        </div>
                        <div class="feature-content new-f">
                            <h4>Fast Wi-Fi</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="single-feature-box" data-cue="zoomIn">
                        <div class="feature-icon ">
                            <img src="{{ asset('public/assets/images/home-1/Easy Self Check-In.png') }}"
                                alt="Luxury Villas in Mohali">
                        </div>
                        <div class="feature-content new-f">
                            <h4>Easy Self Check-In</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="single-feature-box" data-cue="zoomIn">
                        <div class="feature-icon ">
                            <img src="{{ asset('public/assets/images/home-1/Smart tv.png') }}"
                                alt="Luxury Villas in Mohali">
                        </div>
                        <div class="feature-content new-f">
                            <h4>Smart Tv</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="single-feature-box" data-cue="zoomIn">
                        <div class="feature-icon">
                            <img src="{{ asset('public/assets/images/home-1/Free Parking.png') }}"
                                alt="Luxury Villas in Mohali">
                        </div>
                        <div class="feature-content  new-f">
                            <h4>Free Parking</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="single-feature-box" data-cue="zoomIn">
                        <div class="feature-icon ">
                            <img src="{{ asset('public/assets/images/home-1/Great Location.png') }}"
                                alt="Luxury Villas in Mohali">
                        </div>
                        <div class="feature-content new-f">
                            <h4>Great Location</h4>
                        </div>
                    </div>
                </div>
                <!-- secont row -->
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="single-feature-box" data-cue="zoomIn">
                        <div class="feature-icon ">
                            <img src="{{ asset('public/assets/images/home-1/Washing Machine.png') }}"
                                alt="Luxury Villas in Mohali">
                        </div>
                        <div class="feature-content new-f">
                            <h4>Washing Machine</h4>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="single-feature-box" data-cue="zoomIn">
                        <div class="feature-icon ">
                            <img src="{{ asset('public/assets/images/home-1/Food Order Facility.png') }}"
                                alt="Luxury Living Room">
                        </div>
                        <div class="feature-content new-f">
                            <h4>Food Order Facility</h4>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="single-feature-box" data-cue="zoomIn">
                        <div class="feature-icon ">
                            <img src="{{ asset('public/assets/images/home-1/Independent Villa.png') }}"
                                alt="Luxury Living Room">
                        </div>
                        <div class="feature-content new-f">
                            <h4>Independent Villa</h4>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="single-feature-box" data-cue="zoomIn">
                        <div class="feature-icon ">
                            <img src="{{ asset('public/assets/images/home-1/Towel.png') }}" alt="Luxury Living Room">
                        </div>
                        <div class="feature-content new-f">
                            <h4>Towel</h4>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="single-feature-box" data-cue="zoomIn">
                        <div class="feature-icon ">
                            <img src="{{ asset('public/assets/images/home-1/Toiletries.png') }}"
                                alt="Luxury Living Room">
                        </div>
                        <div class="feature-content new-f">
                            <h4>Toiletries</h4>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="single-feature-box" data-cue="zoomIn">
                        <div class="feature-icon ">
                            <img src="{{ asset('public/assets/images/home-1/Gyser.png') }}" alt="Luxury Living Room">
                        </div>
                        <div class="feature-content new-f">
                            <h4>Gyser</h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="call-do-action-area inner mb-5">
        <div class="container">
            <div class="row align-items-center call-do-action-bg">
                <div class="col-lg-6 col-md-6 col-12">

                    <img src="https://stayroyal.in/public/assets/images/room/6footer-g.jpg" alt="Luxury Living Room"
                        class="img-fluid">
                </div>

                <div class="col-lg-6 col-md-6 col-12 matha-ta-ghurlo" data-cue="zoomIn">
                    <div class="section-title two">

                        <h2>Premium Stays Crafted <br> for Comfort</h2>

                        <p class="section-desc-2">Step into beautifully designed living spaces that blend elegance, warmth,
                            and functionality. Whether you're traveling for business or leisure, our curated homes offer
                            everything you need for a refined and restful experience.
                        </p>
                    </div>
                    <div class="call-do-action-text mb-4">
                        <a href="#">"Every space is thoughtfully styled — because you deserve more than just a place
                            to sleep."</a>
                    </div>

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
                        <p class="section-desc-2 at">At Stay Royal – BNB, guest satisfaction is our top priority. Here's
                            what our valued travelers and tourists have to say about their luxurious experiences with us.
                        </p>

                    </div>
                </div>
            </div>
            <div class="row border-add" data-cue="zoomIn">
                <div class="testi-list-inner owl-carousel">
                    <div class="col-md-12">
                        <div class="single-testimonial-box">
                            <div class="testimonial-content">
                                <p>"Staying at Stay Royal was beyond amazing. The comfort, ambiance, and service were truly
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
                                    <img src="{{ asset('public/assets/images/inner/testi-quote.png') }}"
                                        alt="Stay Royal Villa Mohali">
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
                                <p>"The attention to detail and the warm hospitality made my stay unforgettable. Everything
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
                                    <img src="{{ asset('public/assets/images/inner/testi-quote.png') }}"
                                        alt="Luxury Living Room">
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
                                <p>"I travel often, but this was by far the best BNB experience. From the interiors to the
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
                                    <img src="public/assets/images/inner/testi-quote.png" alt="Luxury Living Room">
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

    @verbatim
        <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [{
    "@type": "Question",
    "name": "What makes Stay Royal BNB different from other homestays in Mohali?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Stay Royal stands out for its blend of luxury, comfort, and privacy. Each villa is thoughtfully designed with modern amenities, offering guests a premium hotel-like experience with homely warmth."
    }
  },{
    "@type": "Question",
    "name": "Where is the Stay Royal BNB located?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Stay Royal is conveniently located at Villa 87, Sector 125, Jhungiyan, Kharar, Punjab 140301, just minutes away from Mohali's top attractions, ensuring easy access and a peaceful environment."
    }
  },{
    "@type": "Question",
    "name": "Who can book a stay at Stay Royal BNB?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Our villas are ideal for families, couples, business travelers, and groups seeking a comfortable, private, and stylish stay with complete modern facilities in Mohali."
    }
  },{
    "@type": "Question",
    "name": "What facilities are available for guests?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Guests enjoy Wi-Fi, Smart TV, free parking, self-check-in, a modern kitchen, toiletries, a geyser, and a food order facility, ensuring a smooth and comfortable stay experience."
    }
  },{
    "@type": "Question",
    "name": "Can I book Stay Royal BNB online?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Yes, you can easily book your villa online through stayroyal. Choose your preferred stay, confirm dates, and get instant booking confirmation for your luxury getaway."
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
                    <img src="{{ asset('public/assets/images/question-mark-query-information-support-service-graphic.webp') }}"
                        alt="FAQ" class="img-fluid rounded shadow">
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
                                    1. What makes Stay Royal BNB different from other homestays in Mohali?

                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Stay Royal stands out for its blend of luxury, comfort, and privacy. Each villa is
                                    thoughtfully designed with modern amenities, offering guests a premium hotel-like
                                    experience with homely warmth.

                                </div>
                            </div>
                        </div>

                        <!-- FAQ 2 -->
                        <div class="accordion-item border-0 mb-2">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    2. Where is the Stay Royal BNB located?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Stay Royal is conveniently located at Villa 87, Sector 125, Jhungiyan, Kharar, Punjab
                                    140301, just minutes away from Mohali's top attractions, ensuring easy access and a
                                    peaceful environment.

                                </div>
                            </div>
                        </div>

                        <!-- FAQ 3 -->
                        <div class="accordion-item border-0 mb-2">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    3. Who can book a stay at Stay Royal BNB?

                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Our villas are ideal for families, couples, business travelers, and groups seeking a
                                    comfortable, private, and stylish stay with complete modern facilities in Mohali.

                                </div>
                            </div>
                        </div>

                        <!-- FAQ 4 -->
                        <div class="accordion-item border-0 mb-2">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    4. What facilities are available for guests?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Guests enjoy Wi-Fi, Smart TV, free parking, self-check-in, a modern kitchen, toiletries,
                                    a geyser, and a food order facility, ensuring a smooth and comfortable stay experience.

                                </div>
                            </div>
                        </div>

                        <!-- FAQ 5 -->
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    5. Can I book Stay Royal BNB online?

                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes, you can easily book your villa online through stayroyal. Choose your preferred
                                    stay, confirm dates, and get instant booking confirmation for your luxury getaway.

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
