@extends('website.layouts.layout')
@section('content')
<style>
  .error-msg {
    text-align: left;
    margin-top: 4px;
    font-size: 0.9rem;
  }
</style>

<!--==================================================-->
<!-- Start Royella Breadcumb Area -->
<!--==================================================-->
<div class="breadcumb-area d-flex align-items-center">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-12">
				<div class="breacumb-content">
					<div class="breadcum-title">
						<h4>Contact</h4>
					</div>
					<ul>
						<li><a href="index.html">Home</a></li>
						<li>/</li>
						<li>Contact</li>
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
<!-- Start Royella Contact Style Two inner Area -->
<!--==================================================-->
<div class="contact-area style-two inner">
	<div class="container">
		<div class="row add-backgroun">
			<div class="col-lg-6">
				<div class="section-title two">
					<h4>Contact us</h4>
					<h1>Contact With Us</h1>
					<p class="section-desc-2">Rapidiously myocardinate cross-platform intellectual capital after the
                       model. Appropriately create interactive infrastructures after maintance
                       Holisticly facilitate stand-alone
					</p>
				</div>
				<div class="single-contact-box">
					<div class="contact-icon">
						<i class="bi bi-telephone-fill"></i>
					</div>
					<div class="contact-title">
						<h4>Call Us Now</h4>
						<p>+980 123 (4567) 890</p>
					</div>
				</div>				
				<div class="single-contact-box">
					<div class="contact-icon">
						<i class="bi bi-envelope"></i>
					</div>
					<div class="contact-title">
						<h4>Sent Email</h4>
						<p>example@gmail.com</p>
					</div>
				</div>					
				<div class="single-contact-box">
					<div class="contact-icon">
						<i class="bi bi-geo-alt-fill"></i>
					</div>
					<div class="contact-title">
						<h4>Our Locations</h4>
						<p>New elephant Road, Dhanmondi<br>Dhaka - 1212</p>
					</div>
				</div>	
			</div>



<div class="col-lg-6">
  <form action="{{ route('user.enquery') }}" method="POST" id="dreamit-form">
    @csrf
    <div class="single-contact-form">
      <div class="contact-content">
        <h4>Get In Touch</h4>
      </div>

      <div class="single-input-box">
        <input type="text" name="name" id="name" placeholder="Your Name" required>
        <div class="error-msg text-danger" id="name-error"></div>
      </div>

      <div class="single-input-box">
        <input type="email" name="email" id="email" placeholder="Enter Your Email" required>
        <div class="error-msg text-danger" id="email-error"></div>
      </div>

      <div class="single-input-box">
       <select name="subject" id="subject">
  <option value="">Select Subject</option>  <!-- value="" -->
  <option value="Luxury Hotel">Luxury Hotel</option>
  <option value="Room">Room</option>
  <option value="Hotel">Hotel</option>
</select>
  <div class="error-msg text-danger" id="subject-error"></div>
      </div>

      <div class="single-input-box">
        <textarea name="message" id="message" placeholder="Write Message" required></textarea>
        <div class="error-msg text-danger" id="message-error"></div>
      </div>

      <div class="single-input-box">
        <button type="submit">Send Message</button>
      </div>

      <div id="form-success" class="text-success mt-3"></div>
      <div id="form-error" class="text-danger mt-3"></div>
    </div>
  </form>
</div>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  // Live validation on keyup/change
  $('#name').on('input', function() {
    validateName();
  });
  $('#email').on('input', function() {
    validateEmail();
  });
  $('#subject').on('change', function() {   // Use #Subject (capital S) to match your HTML
    validateSubject();
  });
  $('#message').on('input', function() {
    validateMessage();
  });

  // Form submit handler
  $('#dreamit-form').submit(function(e) {
    e.preventDefault();

    // Clear success/error messages
    $('#form-success').text('');
    $('#form-error').text('');

    // Validate all fields
    let validName = validateName();
    let validEmail = validateEmail();
    let validSubject = validateSubject();
    let validMessage = validateMessage();

    if (!(validName && validEmail && validSubject && validMessage)) {
      $('#form-error').text('Please fix the errors above before submitting.');
      return; // stop submission if any invalid
    }

    // Prepare data for AJAX
    let formData = {
      _token: '{{ csrf_token() }}',
      name: $('#name').val().trim(),
      email: $('#email').val().trim(),
      subject: $('#subject').val(),
      message: $('#message').val().trim()
    };
console.log(formData);
    // Send AJAX
    $.ajax({
      url: "{{ route('user.enquery') }}",
      method: "POST",
      data: formData,
      success: function(response) {   
        $('#form-success').text('Message sent successfully!');
        $('#dreamit-form')[0].reset();
        $('.error-msg').text('');
        $('#form-error').text('');
      },
      error: function(xhr) { 
        $('#form-error').text('Something went wrong. Please try again later.');
      }
    });
  });

  // Validation functions:
  function validateName() {
    let name = $('#name').val().trim();
    if (name.length === 0) {
      $('#name-error').text('Name is required.');
      return false;
    } else if (name.length < 4) {
      $('#name-error').text('Name must be at least 4 characters.');
      return false;
    } else if (name.length > 20) {
      $('#name-error').text('Name must not exceed 20 characters.');
      return false;
    } else {
      $('#name-error').text('');
      return true;
    }
  }

  function validateEmail() {
    let email = $('#email').val().trim();
    let regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email.length === 0) {
      $('#email-error').text('Email is required.');
      return false;
    } else if (!regex.test(email)) {
      $('#email-error').text('Please enter a valid email.');
      return false;
    } else {
      $('#email-error').text('');
      return true;
    }
  }

  function validateSubject() {
    let subject = $('#subject').val();
    if (!subject || subject === "saab") {
      $('#subject-error').text('Please select a subject.');
      return false;
    } else {
      $('#subject-error').text('');
      return true;
    }
  }

  function validateMessage() {
    let message = $('#message').val().trim();
    if (message.length === 0) {
      $('#message-error').text('Message is required.');
      return false;
    } else if (message.length < 20) {
      $('#message-error').text('Message must be at least 20 characters.');
      return false;
    } else {
      $('#message-error').text('');
      return true;
    }
  }
});
</script>






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
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3021.0662009102393!2d-73.96815832342757!3d40.78255873329212!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2589a018531e3%3A0xb9df1f7387a94119!2sCentral%20Park!5e0!3m2!1sen!2sbd!4v1697123394994!5m2!1sen!2sbd"></iframe>
			</div>
		</div>
	</div>
</div>
<!--==================================================-->
<!-- End Royella Google Map Area -->
<!--==================================================-->







<!--==================================================-->
<!-- Start Royella Brand Area -->
<!--==================================================-->
<div class="brand-area">
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

