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
					<h2>Contact With Us</h2>
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
@verbatim
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [{
    "@type": "Question",
    "name": "How can I contact Stay Royal for bookings or inquiries?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "You can reach us by phone at +91 7006022986 or email us at contact@stayroyal.in for bookings, inquiries, or any support. We're always happy to assist."
    }
  },{
    "@type": "Question",
    "name": "Where is Stay Royal located?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Stay Royal is located at Villa 87, Sector 125, Jhungiyan, Kharar, Punjab 140301. We are easily accessible and ready to welcome you to a premium stay in Mohali."
    }
  },{
    "@type": "Question",
    "name": "What is the best way to reach Stay Royal?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "For quick communication, you can call us directly at +91 7006022986 or send an email to contact@stayroyal.in for any assistance related to your booking or stay."
    }
  },{
    "@type": "Question",
    "name": "How can I send a message to Stay Royal?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "You can fill out the contact form on our website with your name, email, subject, and message, and we'll get back to you as soon as possible to assist with your queries."
    }
  },{
    "@type": "Question",
    "name": "Do you offer customer support after booking?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Yes, we offer continuous support for any booking inquiries or assistance during your stay. Feel free to contact us anytime by phone or email. We are here to ensure your stay is perfect."
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
                <img src="{{ asset('public/assets/images/question-mark-query-information-support-service-graphic.webp')  }}" alt="FAQ" class="img-fluid rounded shadow">
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
                              1. How can I contact Stay Royal for bookings or inquiries?

                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse"
                            aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                               You can reach us by phone at +91 7006022986 or email us at contact@stayroyal.in for bookings, inquiries, or any support. We're always happy to assist.

                            </div>
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="accordion-item border-0 mb-2">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              2. Where is Stay Royal located?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse"
                            aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                            Stay Royal is located at Villa 87, Sector 125, Jhungiyan, Kharar, Punjab 140301. We are easily accessible and ready to welcome you to a premium stay in Mohali.

                            </div>
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                     <div class="accordion-item border-0 mb-2">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            3. What is the best way to reach Stay Royal?

                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse"
                            aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                              For quick communication, you can call us directly at +91 7006022986 or send an email to contact@stayroyal.in for any assistance related to your booking or stay.

                            </div>
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="accordion-item border-0 mb-2">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                           4. How can I send a message to Stay Royal?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse"
                            aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                            You can fill out the contact form on our website with your name, email, subject, and message, and we'll get back to you as soon as possible to assist with your queries.

                            </div>
                        </div>
                    </div>

                    <!-- FAQ 5 -->
                    <div class="accordion-item border-0">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                           5. Do you offer customer support after booking?


                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse"
                            aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                              Yes, we offer continuous support for any booking inquiries or assistance during your stay. Feel free to contact us anytime by phone or email. We are here to ensure your stay is perfect.

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<div class="google-map">
	<div class="row">
		<div class="col-md-12">
			<div class="google-map-content">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3428.5798130435783!2d76.666415!3d30.758302300000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ff11ccaa56767%3A0xa223abc4e1da6d6b!2sStay%20Royal%20-%20BNB!5e0!3m2!1sen!2sin!4v1757153595659!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

			</div>
		</div>
	</div>
</div>


@endsection