@extends('website.layouts.layout')

 @section('meta_title', $metatitle)
@section('meta_description', $metaDescription)
@section('content')
	<style>
		.error-msg {
			text-align: left;
			margin-top: 4px;
			font-size: 0.9rem;
		}
	</style>
	   <div class="breadcumb-area" style="background: linear-gradient(0deg, rgb(0 0 0 / 54%), rgb(0 0 0 / 34%)), url({{ asset('public/assets/images/room/about-b.jpg') }}); background-position: center; background-repeat: no-repeat; background-size: cover; ">
	<div class="container">
					<div class=" align-items-center breadcum-title">
						<h1 style="color: rgb(255, 255, 255);">Contact us</h1>
					</div>
	</div>
</div>

	<div class="contact-area style-two inner">
		<div class="container">
			<div class="row add-backgroun">
				<div class="col-lg-6">
					<div class="section-title two">
						<h4>Contact us</h4>
						<h1>Contact With Us</h1>
						<p class="section-desc-2">Have questions or need assistance? We’re here to help! Reach out to us anytime for bookings, inquiries, or support. Your perfect stay is just a message or call away.

						</p>
					</div>
					<a href="tel:+91 7006022986">
					<div class="single-contact-box">
						<div class="contact-icon">
							<i class="bi bi-telephone-fill"></i>
						</div>
					
							<div class="contact-title">
							<h4>Call Us Now</h4>
							<p>+91 7006022986</p>
						</div>
					
					</div>
					</a>
					<a href="mailto:royalstaybnbofficial@gmail.com">
					<div class="single-contact-box">
						<div class="contact-icon">
							<i class="bi bi-envelope"></i>
						</div>
							<div class="contact-title">
							<h4>Sent Email</h4>
							<p>contact@stayroyal.in</p>
						</div>
						
					</div>
					</a>
					<div class="single-contact-box">
						<div class="contact-icon">
							<i class="bi bi-geo-alt-fill"></i>
						</div>
						<div class="contact-title">
							<h4>Our Locations</h4>
							<p>Villa 87, Sector 125, Kharar, <br>Punjab 140301</p>
						</div>
					</div>
				</div>

           <div class="col-lg-6">
					<div class="single-contact-form">
						<div class="contact-content">
							<h4>Get In Touch</h4>
						</div>
						<form method="POST" action="{{ route('user.enquery') }}">
							@csrf
							<div class="single-input-box">
								<input type="text" name="name" id="name" placeholder="Your Name" value="{{ old('name') }}">
								<div class="error-msg text-danger" id="name-error"></div>
							</div>
							@if ($errors->has('name'))
								<div class="error-message" style="color: red; margin-top: 5px; text-align: left;">
									{{ $errors->first('name') }}
								</div>
							@endif

							<div class="single-input-box">
								<input type="email" name="email" id="email" placeholder="Enter Your Email"
									value="{{ old('email') }}">
								<div class="error-msg text-danger" id="email-error"></div>
							</div>
							@if ($errors->has('email'))
								<div class="error-message" style="color: red; margin-top: 5px; text-align: left;">
									{{ $errors->first('email') }}
								</div>
							@endif

							<div class="single-input-box">
								<select name="subject" id="subject">
									<option value="">Select Subject</option> <!-- value="" -->
									<option value="Luxury Hotel">Luxury Hotel</option>
									<option value="Room">Room</option>
									<option value="Hotel">Hotel</option>
								</select>
								<div class="error-msg text-danger" id="subject-error"></div>
							</div>
							@if ($errors->has('subject'))
								<div class="error-message" style="color: red; margin-top: 5px; text-align: left;">
									{{ $errors->first('subject') }}
								</div>
							@endif

							<div class="single-input-box">
								<textarea name="message" id="message" placeholder="Write Message"></textarea>
								<div class="error-msg text-danger" id="message-error"></div>
							</div>
							@if ($errors->has('message'))
								<div class="error-message" style="color: red; margin-top: 5px; text-align: left;">
									{{ $errors->first('message') }}
								</div>
							@endif

							<div class="single-input-box">
								<button type="submit">Send Message</button>
							</div>

							<div id="form-success" class="text-success mt-3"></div>
							<div id="form-error" class="text-danger mt-3"></div>
						</form>
					</div>

				</div>

			</div>
		</div>
	</div>
	<!--==================================================-->
	<!-- Start Royella Contact Style two Inner Area -->
	<!--==================================================-->




	<!--==================================================-->
	<!-- Start Royella Google Map Area -->
	<!--==================================================-->
	<div class="google-map">
		<div class="row">
			<div class="col-md-12">
				<div class="google-map-content">
			<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d27428.5938168737!2d76.62448818487266!3d30.758459151495135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sVilla%2087%2C%20Sector%20125%2C%20Kharar%2C%20Punjab%20140301!5e0!3m2!1sen!2sin!4v1750086397083!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			</div>
		</div>
	</div>
	<!--==================================================-->
	<!-- End Royella Google Map Area -->
	<!--==================================================-->







	<!--==================================================-->

	<!--==================================================-->

@endsection