@extends('website.layouts.layout')
@section('content')

<!--room-area-->




<!--==================================================-->
<!-- Start Royella Hero Area -->
<!--==================================================-->
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
						<h1>The Best Luxury Stay <br>Royal BNB IN Mohali</h1>
						
					</div>
					<div class="luxury-button">
						<a href="about.html">BOOK NOW</a>
					</div>
					<div class="hero-contact">
						<a href="#"><i class="bi bi-telephone-fill"></i>+980 123 4567 890</a>
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
						<h1>In California</h1>
					</div>
					<div class="luxury-button">
						<a href="about.html">Discover More</a>
					</div>
					<div class="hero-contact">
						<a href="#"><i class="bi bi-telephone-fill"></i>+980 123 4567 890</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--==================================================-->
<!-- End Royella Hero Area -->
<!--==================================================-->


<!--==================================================-->
<!-- Start Royella Booking Area -->
<!--==================================================-->
<div class="booking-area home-1">
	<div class="container">
		<form action="https://formspree.io/f/myyleorq" method="POST" id="dreamit-form">
			@csrf
			<div class="row add-bg align-items-center">
				<div class="booking-input-box">
					<h4>Check In</h4>
					<input type="date" id="start_date" name="start_date" required>
				</div>
				<div class="booking-input-box">
					<h4>Check Out</h4>
					<input type="date" id="end_date" name="end_date" required>
				</div>
				<div class="booking-input-box">
					<h4>Rooms</h4>
					  <select id="room_type" name="room_type" required>
                        <option value="" disabled selected>Select Room</option>
                         @foreach ($roomtypes as $roomtype)
                      <option value="{{ $roomtype->id }}">{{ $roomtype->room_type }}</option>
                       @endforeach
                      </select>

				</div>
				<div class="booking-input-box upper">
					<h4>Guests</h4>
					<select name="place" id="total_days" name="total_days">
						<option value="saab">01 Adult, 0 Child</option>
						<option value="opel">02 Adult, 1 Child</option>
						<option value="audi">02 Adult, 2 Child</option>
						<option value="audi">02 Adult, 3 Child</option>
					</select>
				</div>
			    <div class="booking-button">
					<button type="submit">Book Now</button>
				</div>
		    </div>
		</form>
		<div id="status"></div>
	</div>
</div>
<!--==================================================-->
<!-- End Royella Booking Area -->
<!--==================================================-->



<!--==================================================-->
<!-- Start Royella Room Area -->
<!--==================================================-->
<div class="room-title-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="section-title center" data-cue="zoomIn">
					<div class="section-thumb">
						<img src="assets/images/home-1/section-shape1.png" alt="">
					</div>
					<h2>Welcome to Stay Royal – Royal BNB in the Heart of Mohali</h2>
					<p class="section-desc-1">Discover a unique blend of comfort, elegance, and tranquility at Stay Royal, your private getaway in Mohali. Designed for travelers who appreciate finer details, our luxury villas and suites offer more than just a place to rest — they create a memorable stay experience.
</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!--room-area-->
<div class="room-area">
	<div class="container">
		<div class="row margin-top" data-cue="zoomIn">
			<div class="room_list owl-carousel">
				@foreach($rooms as $room)
			    <div class="col-lg-12">
					<div class="room-single-box">
						<div class="room-thumb">
							<img src="{{ asset('storage/' . $room->room_image) }}" alt="">
							<div class="room-details-button">
								<a href="{{ route('roomdetails', $room->id) }}">View Details<i class="bi bi-arrow-right"></i></a>
							</div>
                          </div>
						<div class="room-pricing">
							<span class="dolar">$ #{{ $room->price }}</span>
							<span>Night</span>
						</div>
	                    <div class="room-content">
	                    	<span class="room-location">
                            <i class="bi bi-geo-alt-fill"></i> {{ $room->location }}
                                </span>
	                    	<p>{{ $room->room_type }} </p>
	                    </div>
	                    <div class="room-bottom">
	                    	<div class="room-bottom-icon">
	                    		<span><img src="assets/images/home-1/room-bottom-icon.png" alt="">{{ $room->size }}</span>
	                    	</div>
	                    	<div class="coustomar-rating">
	                    		<ul>
	                    			<li><i class="bi bi-star-fill"></i></li>
	                    			<li><i class="bi bi-star-fill"></i></li>
	                    			<li><i class="bi bi-star-fill"></i></li>
	                    			<li><i class="bi bi-star-fill"></i></li>
	                    			<li><i class="bi bi-star-half"></i></li>
	                    		</ul>
	                    	</div>
	                    </div>
					</div>
				</div>		
				@endforeach
				


        </div>
		</div>
	</div>
</div>

<!--==================================================-->
<!-- End Royella Room Area -->
<!--==================================================-->



<!--==================================================-->
<!-- Start Royella About Area -->
<!--==================================================-->
<div class="about-area">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6 col-md-12">
				<div class="row" data-cue="zoomIn">
	                <div class="about_list owl-carousel">
	                 	<div class="col-md-12">
	                 		<div class="about-thumb">
					           <img src="assets/images/home-1/about1.jpg" alt="">
			            	</div>
	                 	</div>	                 	
	                 	<div class="col-md-12">
	                 		<div class="about-thumb">
					           <img src="assets/images/home-1/about2.jpg" alt="">
			            	</div>
	                 	</div>
	                </div>
				</div>
			</div>
			<div class="col-lg-6 col-md-12  upper">
				<div class="section-title two" data-cue="zoomIn">
					<h4>STAY ROYAL IN MOHALI</h4>
					<h2>Your Perfect Getaway Destination <br>in Mohali</h2>
					
					<p class="section-desc-2">Discover a premium living space where comfort meets elegance. Whether you're visiting for work or leisure, Stay Royal offers a unique experience with beautifully designed interiors, modern amenities, and a warm, welcoming atmosphere.
</p>
				</div>
				<div class="about-conuter-box" data-cue="zoomIn">
					<div class="about-counter-content">
						<h4 class="counter">300</h4>
						<span>+</span>
						<p>Guests Hosted</p>
					</div>
				</div>				
				<div class="about-conuter-box" data-cue="zoomIn">
					<div class="about-counter-content">
						<h4 class="counter">4.9</h4>
						<p>Customer Rating.</p>
					</div>
				</div>
				<div class="animation-bar" data-cue="zoomIn">
				</div>
				<div class="luxury-button" data-cue="zoomIn">
					<a href="about.html">BOOK NOW</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!--==================================================-->
<!-- End Royella About Area -->
<!--==================================================-->



<!--==================================================-->
<!-- Start Royella Feature Area -->
<!--==================================================-->
<div class="feature-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="section-title center" data-cue="zoomIn">
					<div class="section-thumb">
						<img src="assets/images/home-1/section-shape1.png" alt="">
					</div>
					<h2>What Makes Your Stay Special at Stay Royal BNB in Mohali</h2>
					<p class="section-desc-1">Looking for a cozy, stylish space to relax, unwind, and feel at home? At Stay Royal, we've got just what you need — and a little more.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2 col-md-4 col-sm-6">
				<div class="single-feature-box" data-cue="zoomIn">
					<div class="feature-icon">
						<img src="assets/images/home-1/feature-1.png" alt="">
					</div>
					<div class="feature-content">
						<h4>Comfy & Clean Rooms</h4>
					</div>
				</div>
			</div>			
			<div class="col-lg-2 col-md-4 col-sm-6">
				<div class="single-feature-box" data-cue="zoomIn">
					<div class="feature-icon">
						<img src="assets/images/home-1/feature-2.png" alt="">
					</div>
					<div class="feature-content">
						<h4>Fast Wi-Fi</h4>
					</div>
				</div>
			</div>			
			<div class="col-lg-2 col-md-4 col-sm-6">
				<div class="single-feature-box" data-cue="zoomIn">
					<div class="feature-icon">
						<img src="assets/images/home-1/feature-3.png" alt="">
					</div>
					<div class="feature-content">
						<h4>Easy Self Check-In</h4>
					</div>
				</div>
			</div>			
			<div class="col-lg-2 col-md-4 col-sm-6">
				<div class="single-feature-box" data-cue="zoomIn">
					<div class="feature-icon">
						<img src="assets/images/home-1/feature-4.png" alt="">
					</div>
					<div class="feature-content">
						<h4>Light Breakfast</h4>
					</div>
				</div>
			</div>			
			<div class="col-lg-2 col-md-4 col-sm-6">
				<div class="single-feature-box" data-cue="zoomIn">
					<div class="feature-icon">
						<img src="assets/images/home-1/feature-5.png" alt="">
					</div>
					<div class="feature-content">
						<h4>Chill by the Pool</h4>
					</div>
				</div>
			</div>			
			<div class="col-lg-2 col-md-4 col-sm-6">
				<div class="single-feature-box" data-cue="zoomIn">
					<div class="feature-icon">
						<img src="assets/images/home-1/feature-2.png" alt="">
					</div>
					<div class="feature-content">
						<h4>Great Location</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--==================================================-->
<!-- End Royella Feature Area -->
<!--==================================================-->



<!--==================================================-->
<!-- Start Royella Call Do Action Area -->
<!--==================================================-->
<div class="call-do-action-area">
	<div class="container">
		<div class="row align-items-center call-do-action-bg">
			<div class="col-lg-6 col-md-12">
				<div class="section-title two footar" data-cue="zoomIn">
					
					<h2 style="color: white;">Your Perfect Escape <br>in Mohali</h2>
				
					<p class="section-desc-2" style="color: white;">Whether you're traveling solo, with family, or just looking for a weekend breather — we've crafted the perfect setting for you to relax, recharge, and feel at home.
</p>
					<div class="luxury-button" data-cue="zoomIn" data-show="true" style="animation-name: zoomIn; animation-duration: 2500ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
					<a href="room.html">BOOK NOW</a>
				</div>
				</div>
			
			
			</div>
			<div class="col-lg-6 col-md-12">
				<div class="call-do-action-video" data-cues="zoomIn">
					<a class="video-vemo-icon venobox vbox-item" data-vbtype="youtube" data-autoplay="true" href="https://www.youtube.com/watch?v=e6R6VsgD8yQ&t=179s"><i class="bi bi-play"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>
<!--==================================================-->
<!-- End Royella Call Do Action Area -->
<!--==================================================-->




<!--==================================================-->
<!-- Start Royella Facilities Area -->
<!--==================================================-->
<!-- <div class="facilities-area">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6 col-md-12">
				<div class="section-title two" data-cue="zoomIn">
					<h4>Facilities</h4>
					<h1>Enjoy Complete & Best</h1>
					<h1>Quality Facilities</h1>
				</div>
			</div>
			<div class="col-lg-6 col-md-12">
				<div class="luxury-button" data-cue="zoomIn">
					<a href="service.html">View More item</a>
				</div>
			</div>
		</div>
		<div class="row add-boder">
			<div class="col-lg-6 col-md-6">
				<div class="single-facilities-images-box" data-cue="zoomIn">
					<div class="facilities-thumb">
						<img src="assets/images/home-1/facilities-thumb-1.jpg" alt="">
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="single-facilities-box" data-cue="zoomIn">
					<div class="facilities-content">
						<h4>Fitness</h4>
					    <h1>Gym Training Grounds</h1>
						<p>Rapidiously myocardinate cross-platform intellectual capital after
						model. Appropriately create interactive infrastructures after are
						Holisticly facilitate stand-alone</p>
						<a class="facilities-button" href="services-details.html"><i class="bi bi-arrow-right"></i></a>
					</div>
					<div class="facilities-number">
						<h1>01</h1>
					</div>
				</div>
			</div>
		</div>	

		<div class="row add-boder">
			<div class="col-lg-6 col-md-6">
				<div class="single-facilities-box two" data-cue="zoomIn">
					<div class="facilities-content">
						<h4>Fitness</h4>
					    <h1>Indoor Swimming Pool</h1>
						<p>Rapidiously myocardinate cross-platform intellectual capital after
						model. Appropriately create interactive infrastructures after are
						Holisticly facilitate stand-alone</p>
						<a class="facilities-button" href="services-details.html"><i class="bi bi-arrow-right"></i></a>
					</div>
					<div class="facilities-number two">
						<h1>02</h1>
					</div>

				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="single-facilities-images-box" data-cue="zoomIn">
					<div class="facilities-thumb">
						<img src="assets/images/home-1/facilities-thumb-2.jpg" alt="">
					</div>
				</div>
			</div>
		</div>	

		<div class="row add-boder">
			<div class="col-lg-6 col-md-6">
				<div class="single-facilities-images-box" data-cue="zoomIn">
					<div class="facilities-thumb">
						<img src="assets/images/home-1/facilities-thumb-3.jpg" alt="">
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="single-facilities-box" data-cue="zoomIn">
					<div class="facilities-content">
						<h4>Fitness</h4>
					    <h1>The Restaurent Center</h1>
						<p>Rapidiously myocardinate cross-platform intellectual capital after
						model. Appropriately create interactive infrastructures after are
						Holisticly facilitate stand-alone</p>
						<a class="facilities-button" href="services-details.html"><i class="bi bi-arrow-right"></i></a>
					</div>
					<div class="facilities-number">
						<h1>03</h1>
					</div>
				</div>
			</div>
		</div>
		<div class="row add-boder">
			<div class="col-lg-6 col-md-6">
				<div class="single-facilities-box two" data-cue="zoomIn">
					<div class="facilities-content">
						<h4>Fitness</h4>
					    <h1>SPA and Parlor Center</h1>
						<p>Rapidiously myocardinate cross-platform intellectual capital after
						model. Appropriately create interactive infrastructures after are
						Holisticly facilitate stand-alone</p>
						<a class="facilities-button" href="services-details.html"><i class="bi bi-arrow-right"></i></a>
					</div>
					<div class="facilities-number two">
						<h1>04</h1>
					</div>

				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="single-facilities-images-box" data-cue="zoomIn">
					<div class="facilities-thumb">
						<img src="assets/images/home-1/facilities-thumb-4.jpg" alt="">
					</div>
				</div>
			</div>
		</div>	
	</div>
</div> -->
<!--==================================================-->
<!-- End Royella Facilities Area -->
<!--==================================================-->



<!--==================================================-->
<!-- Start Royella Offers Area -->
<!--==================================================-->
<div class="offers-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
	    	    <div class="section-title two" data-cue="zoomIn">
				   
				    <h2>Exclusive Seasonal Deals at<br> Stay Royal</h2>
				   
			    </div>
			</div>
		</div>
		<div class="row" data-cue="zoomIn">
			<div class="offers-list owl-carousel">
			    <div class="col-md-12">
				    <div class="single-offers-box">
					    <div class="offers-thumb">
						    <img src="assets/images/home-1/1.jpg" alt="">
					    </div>
					    <div class="offers-content">
					     	<a href="room-details.html">Delux Family Rooms</a>
					    </div>
					    <div class="offers-dollar">
						   <h4>25% off</h4>
					    </div>
				    </div>
			    </div>			
			    <div class="col-md-12">
				    <div class="single-offers-box">
					   <div class="offers-thumb">
						   <img src="assets/images/home-1/2.jpg" alt="">
					    </div>
				    	<div class="offers-content">
						   <a href="room-details.html">Doubble Suite Room</a>
					    </div>
					    <div class="offers-dollar">
						  <h4>25% off</h4>
					    </div>
				    </div>
			    </div>			   
			    <div class="col-md-12">
				    <div class="single-offers-box">
					   <div class="offers-thumb">
						   <img src="assets/images/home-1/3.jpg" alt="">
					    </div>
				    	<div class="offers-content">
						   <a href="room-details">Suprior Bed Room</a>
					    </div>
					    <div class="offers-dollar">
						  <h4>25% off</h4>
					    </div>
				    </div>
			    </div>			    
			    <div class="col-md-12">
				    <div class="single-offers-box">
					   <div class="offers-thumb">
						   <img src="assets/images/home-1/4.jpg" alt="">
					    </div>
				    	<div class="offers-content">
						   <a href="room-details">Junior Suite Room</a>
					    </div>
					    <div class="offers-dollar">
						  <h4>25% off</h4>
					    </div>
				    </div>
			    </div>
			</div>
		</div>
	</div>
</div>
<!--==================================================-->
<!-- End Royella Offers Area -->
<!--==================================================-->



<!--==================================================-->
<!-- Start Royella Testimonial Area -->
<!--==================================================-->
<div class="testimonial-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="section-title center" data-cue="zoomIn">
					<div class="section-thumb">
						<img src="assets/images/home-1/section-shape1.png" alt="">
					</div>
					<h2>What Our Guests Say</h2>
					<p class="section-desc-1">At Stay Royal, we believe your comfort speaks louder than words. Our guests often share their experiences, and their kind words reflect the warmth and care they felt during their time with us. 
</p>
				</div>
			</div>
		</div>
		<div class="row" data-cue="zoomIn">
			<div class="testi-list owl-carousel">
			    <div class="col-lg-12">
				    <div class="single-testi-box">
					    <div class="testi-quote-icon">
						    <img src="assets/images/home-1/testi-quote.png" alt="">
				    	</div>
					    <div class="testi-rating">
						    <ul>
							    <li><i class="bi bi-star-fill"></i></li>
							    <li><i class="bi bi-star-fill"></i></li>
							    <li><i class="bi bi-star-fill"></i></li>
							    <li><i class="bi bi-star-fill"></i></li>
							    <li><i class="bi bi-star"></i></li>
						    </ul>
					    </div>    
					    <div class="testi-content">
							<h5>  A Truly Royal Experience
</h5>
					    	<p>"Stay Royal exceeded every expectation I had! The villa was not only beautifully designed but also incredibly comfortable. From the smooth self-check-in to the clean, cozy rooms and fast Wi-Fi, everything felt perfectly planned. I especially loved the pool area — a quiet spot to relax after a long day. If you're in Mohali and want something premium, this is it!"
</p>
					    </div>
					    <div class="testi-author">
					    	<!-- <div class="testi-author-thumb">
					    		<img src="assets/images/home-1/testi-author.png" alt="">
					    	</div> -->
					    	<div class="testi-author-title">
					    		<h4>— Ritika Sharma</h4>
					    		<p>Business Traveler
</p>
					    	</div>
					    </div>
				    </div>
			    </div>			   
			     <div class="col-lg-12">
				    <div class="single-testi-box">
					    <div class="testi-quote-icon">
						    <img src="assets/images/home-1/testi-quote.png" alt="">
				    	</div>
					    <div class="testi-rating">
						    <ul>
							    <li><i class="bi bi-star-fill"></i></li>
							    <li><i class="bi bi-star-fill"></i></li>
							    <li><i class="bi bi-star-fill"></i></li>
							    <li><i class="bi bi-star-fill"></i></li>
							    <li><i class="bi bi-star-half"></i></li>
						    </ul>
					    </div>    
					    <div class="testi-content">
							<h5>The Perfect Weekend Getaway
</h5>
					    	<p>"My family and I spent a weekend at Stay Royal, and we didn't want to leave. The location was ideal — peaceful yet accessible. The little touches, such as the light breakfast, elegant interiors, and warm ambiance, made our stay unforgettable. It's rare to find a place that feels like both a hotel and a home. Highly recommended!"
</p>
					    </div>
					    <div class="testi-author">
					    	<!-- <div class="testi-author-thumb">
					    		<img src="assets/images/home-1/testi-author-2.png" alt="">
					    	</div> -->
					    	<div class="testi-author-title">
					    		<h4>— Amanpreet Singh,</h4>
					    		<p>Family Guest</p>
					    	</div>
					    </div>
				    </div>
			    </div>
			</div>
		</div>
	</div>
</div>
<!--==================================================-->
<!-- End Royella Testimonial Area -->
<!--==================================================-->



<!--==================================================-->
<!-- Start Royella Blog Area -->
<!--==================================================-->
<!-- <div class="blog-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center" data-cue="zoomIn">
				<div class="section-title center">
					<div class="section-thumb">
						<img src="assets/images/home-1/section-shape1.png" alt="">
					</div>
					<h1>Latest post from blog</h1>
					<p class="section-desc-1">Proactively morph optimal infomediaries rather than accurate expertise. Intrinsicly
                     progressive resources rather than resource-leveling</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-6">
				<div class="single-blog-box" data-cue="zoomIn">
					<div class="single-blog-thumb">
						<img src="assets/images/home-1/blog-1.jpg" alt="">
					</div>
                    <div class="blog-content">
                       <div class="meta-blog">
						  <span>August 10, 2023</span>
						  <span>Interior</span>
					    </div>
                    	<a href="blog-details">Luxury Hotel for Travelling Spot USA, California</a>
                    </div>
                    <div class="blog-button">
                    	<a href="blog.html">Read More<span><i class="bi bi-arrow-right"></i></span></a>
                    </div>
				</div>
			</div>			
			<div class="col-lg-4 col-md-6">
				<div class="single-blog-box" data-cue="zoomIn">
					<div class="single-blog-thumb">
						<img src="assets/images/home-1/blog-2.jpg" alt="">
					</div>
                    <div class="blog-content">
                       <div class="meta-blog">
						  <span>August 10, 2023</span>
						  <span>Interior</span>
					    </div>
                    	<a href="blog-details.html">Luxury Hotel for Travelling Spot USA, California</a>
                    </div>
                    <div class="blog-button">
                    	<a href="blog.html">Read More<span><i class="bi bi-arrow-right"></i></span></a>
                    </div>
				</div>
			</div>			
			<div class="col-lg-4 col-md-6">
				<div class="single-blog-box" data-cue="zoomIn">
					<div class="single-blog-thumb">
						<img src="assets/images/home-1/blog-3.jpg" alt="">
					</div>
                    <div class="blog-content">
                       <div class="meta-blog">
						  <span>August 10, 2023</span>
						  <span>Interior</span>
					    </div>
                    	<a href="blog-details.html">Luxury Hotel for Travelling Spot USA, California</a>
                    </div>
                    <div class="blog-button">
                    	<a href="blog.html">Read More<span><i class="bi bi-arrow-right"></i></span></a>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div> -->
<!--==================================================-->
<!-- End Royella Blog Area -->
<!--==================================================-->



<!--==================================================-->
<!-- Start Royella Brand Area -->
<!--==================================================-->
<div class="brand-area" data-cue="zoomIn">
	<div class="container">
		<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-8">
				<div class="row">
					<div class="brand-list owl-carousel">
					    <div class="col-lg-12">
						    <div class="single-brand-box">
							    <div class="brand-thumb">
							    	<img src="assets/images/home-1/brand-1.png" alt="">
							    </div>
						    </div>
					    </div>					   
					    <div class="col-lg-12">
						    <div class="single-brand-box">
							    <div class="brand-thumb">
							    	<img src="assets/images/home-1/brand-2.png" alt="">
							    </div>
						    </div>
					    </div>					    
					    <div class="col-lg-12">
						    <div class="single-brand-box">
							    <div class="brand-thumb">
							    	<img src="assets/images/home-1/brand-3.png" alt="">
							    </div>
						    </div>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--==================================================-->
<!-- End Royella Brand Area -->
<!--==================================================-->


@endsection
