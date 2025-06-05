<!--==================================================-->
<!-- Start Royella Footer Area -->
<!--==================================================-->
<div class="footer-area" data-cue="zoomIn">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="footer-widget-contact">
					<div class="footer-widget-logo">
						<a href="index.html"><img src="assets/images/inner/logo-1.png" alt=""></a>
					</div>
					<div class="footer-widget-content">
						<div class="footer-widget-title">
							<h4>Contact Info</h4>
						</div>
						<div class="footer-widget-contact-info">
							<ul>
								<li><i class="bi bi-telephone-fill"></i>+980 (1234) 567 220</li>
								<li><i class="bi bi-envelope"></i>example@yahoo.com</li>
								<li><i class="bi bi-geo-alt-fill"></i>102/B New Elephant Rd<br>Dhaka - 1212</li>
							</ul>
						</div>
					</div>
					<div class="footer-widget-social-icon">
						<ul>
							<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
							<li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="footer-widget-content upper">
					<div class="footer-widget-title">
						<h4>Useful Links</h4>
					</div>
					<div class="footer-widget-menu">
                        <ul>
							<li><a href="{{ url('/') }}">Home</a></li>
                         	<li><a href="{{ url('/about') }}">About Hotel</a></li>
                         	<li><a href="{{ url('/rooms') }}">Rooms</a></li>
                         	<li><a href="{{ url('/blogs') }}">Blog</a></li>
							<li><a href="{{ url('/contacts') }}">Contact</a></li>
							<li><a href="{{ url('/policy') }}">Privacy Policy</a></li>
                         	<li><a href="{{ url('/refund') }}">Refund Policy</a></li>
                         </ul>
					</div>
				</div>
			</div>			
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="footer-widget-content">
					<div class="footer-widget-title">
						<h4>Gallery</h4>
					</div>
					<div class="footer-widget-gallery">
                        <a class="place venobox vbox-item" data-gall="lace-imgs" href="assets/images/home-1/1fg.webp"><img src="assets/images/home-1/1fg.webp" alt=""></a>                       
                         <a class="place venobox vbox-item" data-gall="lace-imgs" href="assets/images/home-1/2fg.webp"><img src="assets/images/home-1/2fg.webp" alt=""></a>                      
                        <a class="place venobox vbox-item" data-gall="lace-imgs" href="assets/images/home-1/3fg.webp"><img src="assets/images/home-1/3fg.webp" alt=""></a> 
                        <a class="place venobox vbox-item" data-gall="lace-imgs" href="assets/images/home-1/4fg.webp"><img src="assets/images/home-1/4fg.webp" alt=""></a> 
                        <a class="place venobox vbox-item" data-gall="lace-imgs" href="assets/images/home-1/5fg.webp"><img src="assets/images/home-1/5fg.webp" alt=""></a>
                        <a class="place venobox vbox-item" data-gall="lace-imgs" href="assets/images/home-1/6fg.webp"><img src="assets/images/home-1/6fg.webp" alt=""></a>
					</div>
				</div>
			</div>			
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="footer-widget-content">
					<div class="footer-widget-title">
						<h4>Newsletter</h4>
					</div>
					<p>Subscribe our Newsletter</p>
					 <form action="{{ route('user.subscribe') }}" method="POST">
				        @csrf
						<input type="hidden" name="Is_subscribe"  value="1">
						<div class="single-newsletter-box">
							<input type="text" name="email" placeholder="Enter E-Mail" value="{{ old('email') }}">
                         	<button type="submit">Subscribe Now</button>
							 {{-- Show validation error under the input --}}
							  @if ($errors->has('email'))
                          <div class="error-message" style="color: red; margin-top: 5px;">{{ $errors->first('email') }}</div>
                             @endif
               	</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!--==================================================-->
<!-- End Royella Footer Area -->
<!--==================================================-->



<!--==================================================-->
<!-- Start Royella Footer Bottom Area -->
<!--==================================================-->
<div class="footer-bottom-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="footer-bottom-content">
					<h4>© 2023, Stayroyal. All Rights Reserved.</h4>
				</div>
			</div>
		</div>
	</div>
</div>
<!--==================================================-->
<!-- End Royella Footer Bottom Area -->
<!--==================================================-->


<!--==================================================-->
	<!-- Start Curser Section Here -->
	<!--==================================================-->
	<div class="curser"></div>
	<div class="curser2"></div>
	<!--==================================================-->
	<!-- Ends Curser Section Here -->
	<!--==================================================-->



<!--==================================================-->
<!-- Start scrollup section Section -->
<!--==================================================-->
   <div class="prgoress_indicator active-progress">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
          <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 270.456;"></path>
        </svg>
    </div>
<!--==================================================-->
<!-- Start scrollup section Section -->
<!--==================================================-->


	<!-- jQuery -->
<script src="{{ asset('assets/js/vendor/jquery-3.6.2.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>

<!-- Bootstrap JS -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- Carousel JS -->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

<!-- CounterUp JS -->
<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>

<!-- Waypoints JS -->
<script src="{{ asset('assets/js/waypoints.min.js') }}"></script>

<!-- WOW JS -->
<script src="{{ asset('assets/js/wow.js') }}"></script>

<!-- ImagesLoaded JS -->
<script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>

<!-- Venobox JS -->
<script src="{{ asset('venobox/venobox.js') }}"></script>
<script src="{{ asset('venobox/venobox.min.js') }}"></script>

<!-- Animated Text JS -->
<script src="{{ asset('assets/js/animated-text.js') }}"></script>

<!-- Isotope JS -->
<script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>

<!-- MeanMenu JS -->
<script src="{{ asset('assets/js/jquery.meanmenu.js') }}"></script>

<!-- ScrollUp JS -->
<script src="{{ asset('assets/js/jquery.scrollUp.js') }}"></script>

<!-- Theme JS -->
<script src="{{ asset('assets/js/theme.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('assets/js/coustom.js') }}"></script>

<!-- Barfiller JS -->
<script src="{{ asset('assets/js/jquery.barfiller.js') }}"></script>

<!-- ScrollCue JS -->
<script src="{{ asset('assets/js/scrollCue.min.js') }}"></script>

</body>
</html>