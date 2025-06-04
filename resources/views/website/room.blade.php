@extends('website.layouts.layout')
@section('content')

		

		</div>

	<!--==================================================-->
<!-- Start Royella Breadcumb Area -->
<div class="breadcumb-area d-flex align-items-center">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-12">
				<div class="breacumb-content">
					<div class="breadcum-title">
						<h4>Rooms</h4>
					</div>
					<ul>
						<li><a href="index.html">Home</a></li>
						<li>/</li>
						<li>Rooms</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!--==================================================-->
<!-- End Royella Breadcumb Area -->
<!--==================================================-->




<!--==================================================-->
<!-- Start Royella Room Area -->
<!--==================================================-->
<div class="room-area inner">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="section-title center inner" data-cue="zoomIn">
					<div class="section-thumb">
						<img src="assets/images/home-1/section-shape1.png" alt="">
					</div>
					<h1>Welcome to Stay Royal, a Luxurious BNB in the Heart of Mohali</h1>
					<p class="section-desc-1">Discover elegant service at Stay Royal, where comfort and style Co-reside at an excellent spot in Mohali. We guarantee a memorable stay with our well-designed rooms, individualized services, and peaceful environment. Your elegant holiday is ideal for business as well as pleasure. Reserve now.

</p>
				</div>
			</div>
		</div>
		<div class="row align-items-center">

            @foreach($rooms as $room)
		    <div class="col-lg-4 col-md-6">
				<div class="room-single-box" data-cue="zoomIn">
					<div class="room-thumb">
						<img src="{{ asset('storage/' . $room->room_image) }}" alt="">
						<div class="room-details-button">
							<a href="standard-room.html">View Details<i class="bi bi-arrow-right"></i></a>
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
<!--==================================================-->
<!-- End Royella Room Area -->
<!--==================================================-->
<!--==================================================-->
<!-- Start Royella Contact Area Inner -->
<!--==================================================-->
<div class="contact-area style-two">
	<div class="container">
		<div class="row add-backgroun">
			<div class="col-lg-6 col-md-12">
				<div class="section-title two" data-cue="zoomIn">
					<h4>Contact us</h4>
					<h1>Contact With Us</h1>
					<p class="section-desc-2">Rapidiously myocardinate cross-platform intellectual capital after the
                       model. Appropriately create interactive infrastructures after maintance
                       Holisticly facilitate stand-alone
					</p>
				</div>
				<div class="single-contact-box" data-cue="zoomIn">
					<div class="contact-icon">
						<i class="bi bi-telephone-fill"></i>
					</div>
					<div class="contact-title">
						<h4>Call Us Now</h4>
						<p>+980 123 (4567) 890</p>
					</div>
				</div>				
				<div class="single-contact-box" data-cue="zoomIn">
					<div class="contact-icon">
						<i class="bi bi-envelope"></i>
					</div>
					<div class="contact-title">
						<h4>Sent Email</h4>
						<p>example@gmail.com</p>
					</div>
				</div>					
				<div class="single-contact-box" data-cue="zoomIn">
					<div class="contact-icon">
						<i class="bi bi-geo-alt-fill"></i>
					</div>
					<div class="contact-title">
						<h4>Our Locations</h4>
						<p>New elephant Road, Dhanmondi</br>Dhaka - 1212</p>
					</div>
				</div>	
			</div>
			<div class="col-lg-6 col-md-12">
				<form action="https://formspree.io/f/myyleorq" method="POST" id="dreamit-form">
					<div class="single-contact-form" data-cue="zoomIn">
						<div class="contact-content">
							<h4>Get In Touch</h4>
						</div>
						<div class="single-input-box">
							<input type="text" name="Name" placeholder="Your Name" required>
						</div>
						<div class="single-input-box">
							<input type="text" name="Email" placeholder="Enter Your Email" required>
						</div>
						<div class="single-input-box">
					        <select name="Subject" id="Subject">
					        	<option value="saab">select Subject</option>
					        	<option value="opel">Luxury Hotel</option>
					        	<option value="audi">Room</option>
					        	<option value="audi">Hottel</option>
					        </select>
						</div>
						<div class="single-input-box">
							<textarea name="Message" id="Message" placeholder="Write Message"></textarea>
						</div>
						<div class="single-input-box">
							<button type="submit">Sent Message</button>
						</div>
					</div>
				</form>
				<div id="status"></div>
			</div>
		</div>
	</div>
</div>
<!--==================================================-->
<!-- End Royella Contact Area Inner -->
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

