@extends('website.layouts.layout')
@section('content')
<!--==================================================-->
<!-- Start Royella Breadcumb Area -->
<div class="breadcumb-area d-flex align-items-center">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-12">
				<div class="breacumb-content">
					<div class="breadcum-title">
						<h4>Room Details</h4>
					</div>
					<ul>
						<li><a href="index.html">Home</a></li>
						<li>/</li>
						<li>Room Details</li>
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
<!-- Start Royella Room Details Area -->
<!--==================================================-->
<div class="room-details">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">

        	<div class="row">
					<div class="room-details-list owl-carousel">
					    <div class="col-lg-12">
					    	<div class="room-detils-thumb">
					    		<img src="{{ asset('storage/' . $details->room_image) }}" alt="Room Image" width="800" height="400">

					    	</div>
					    </div>							   
					    <div class="col-lg-12">
					    	<div class="room-detils-thumb">
					    		<img src="{{ asset('storage/' . $details->room_image) }}" alt="Room Image" width="800" height="400">

					    	</div>
					    </div>		
						<div class="col-lg-12">
					    	<div class="room-detils-thumb">
					    		 <img src="{{ asset('storage/' . $details->room_image) }}" alt="Room Image" width="800" height="400">
                         	</div>
					    </div>	
						<div class="col-lg-12">
					    	<div class="room-detils-thumb">
					    		<img src="assets/images/room-details/4a.jpg" alt="">
					    	</div>
					    </div>								    
					</div>
				</div>
             



				<div class="row">
					<div class="col-lg-12">
						<div class="room-details-content">
							<h4>Luxury Room</h4>
							<h1>{{ $details->room_type }}</h1>
							<p class="room-detils-desc" data-cue="zoomIn">Rapidiously myocardinate cross-platform intellectual capital after 
						    	marketing model. Appropriately create interactive infrastructures after maintainable are
                                Holisticly facilitate stand-alone inframe extend state of the art benefits via web-enabled value. 
                                Completely fabricate extensible infomediaries rather than reliable e-services. Dramatically 
                                whiteboard alternative
                            </p>

                           <p class="room-detils-desc" data-cue="zoomIn">Conveniently fashion pandemic potentialities for team driven 
                           	    technologies. 
                            	Proactively orchestrate robust systems rather than user-centric vortals. Distinctively seize 
                            	top-line e-commerce with premier intellectual capital. Efficiently strategize goal-oriented
                            </p>

                            <div class="room-details-check-box" data-cue="zoomIn">
                            	<div class="room-details-check-content">
                            		<span><img src="assets/images/inner/room-details-1.png" alt="">Check In</span>
                            		<p class="check-item"><i class="bi bi-check2"></i>Check-in from 9:00 AM - anytime</p>
                            		<p class="check-item"><i class="bi bi-check2"></i>Early check-in subject to availability</p>
                            	</div>
                            </div>   

                            <div class="room-details-check-box upper" data-cue="zoomIn">
                            	<div class="room-details-check-content">
                            		<span><img src="assets/images/inner/room-details-2.png" alt="">Check Out</span>
                            		<p class="check-item"><i class="bi bi-check2"></i>Check-out before noon</p>
                            		<p class="check-item"><i class="bi bi-check2"></i>Check-out from 9:00 AM - anytime</p>
                            	</div>
                            </div>

                            <h1 class="room-detils-title-2" data-cue="zoomIn">House Rules</h1>
                            <p class="room-detils-desc upper" data-cue="zoomIn">Professionally deliver fully researched scenarios with turnkey communities.
                              Competently unleash empowered applications without seamless data.
                              Uniquely underwhelm quality outsourcing before transparent relationships.
                             Efficiently enhance diverse relationships whereas leveraged</p>  

                            <h1 class="room-detils-title-2" data-cue="zoomIn">Childreen & Extra Beds</h1>
                            <p class="room-detils-desc" data-cue="zoomIn">Applications without seamless data. Uniquely underwhelm quality outsourcing before 
                             transparent relationships. Efficiently enhance diverse relationships whereas leveraged new house cafe.</p>

                            <div class="room-detls-list-item" data-cue="zoomIn">
                             	<ul>
                             		<li><i class="bi bi-check2"></i>Quickly generate bricks-and-clicks</li>
                             		<li><i class="bi bi-check2"></i>Interactively cultivate visionary platforms</li>
                             		<li><i class="bi bi-check2"></i>Energistically envisioneer resource</li>
                             		<li><i class="bi bi-check2"></i>Uniquely restore turnkey paradigms</li>
                             	</ul>
                            </div>
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
				
							<div class="booking-item">
        <!--              Personal detail  add        -->
					<!-- Registration Form -->
   <div id="register-form" style="display: {{ session('show_login') ? 'none' : 'block' }};">
    <form action="{{ route('user.register') }}" method="POST" style="max-width:900px; margin:40px auto; background:#fff; box-shadow:0 10px 25px rgba(0,0,0,0.1); padding:30px 40px; border-radius:12px;">
        @csrf
        <div style="display:flex; gap:20px; flex-wrap:wrap;">
            <div style="flex:1; min-width:250px;">
                <label for="user_name" style="font-weight:600; display:block; margin-bottom:6px; color:#333;">Name</label>
                <input type="text" name="user_name" id="user_name" value="{{ old('user_name') }}" required
                    style="width:100%; padding:10px 15px; border-radius:8px; border:1px solid #ccc; height:45px; font-size:16px;">
            </div>
			 @if ($errors->has('user_name'))
                <div class="error-message" style="color: red; margin-top: 5px; text-align: left;">
                 {{ $errors->first('user_name') }}
              </div>
             @endif

            <div style="flex:1; min-width:250px;">
                <label for="email" style="font-weight:600; display:block; margin-bottom:6px; color:#333;">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"  required
                    style="width:100%; padding:10px 15px; border-radius:8px; border:1px solid #ccc; height:45px; font-size:16px;">
            </div>
			@if ($errors->has('email'))
                <div class="error-message" style="color: red; margin-top: 5px; text-align: left;">
                 {{ $errors->first('email') }}
              </div>
             @endif

			
            <div style="flex:1; min-width:250px;">
                <label for="phone" style="font-weight:600; display:block; margin-bottom:6px; color:#333;">Phone</label>
                <input type="tel" name="phone" id="phone" value="{{ old('phone') }}"  required
                    style="width:100%; padding:10px 15px; border-radius:8px; border:1px solid #ccc; height:45px; font-size:16px;">
            </div>
			@if ($errors->has('phone'))
                <div class="error-message" style="color: red; margin-top: 5px; text-align: left;">
                 {{ $errors->first('phone') }}
              </div>
             @endif

            <div style="flex:1; min-width:250px;">
                <label for="address" style="font-weight:600; display:block; margin-bottom:6px; color:#333;">Address</label>
                <input type="text" name="address" id="address" value="{{ old('address') }}" required 
                    style="width:100%; padding:10px 15px; border-radius:8px; border:1px solid #ccc; height:45px; font-size:16px;">
            </div>
			@if ($errors->has('address'))
                <div class="error-message" style="color: red; margin-top: 5px; text-align: left;">
                 {{ $errors->first('address') }}
              </div>
             @endif
        </div>

        <div style="text-align:center; margin-top:30px;">
            <button type="submit"
                style="background-color:#0d6efd; color:#fff; border:none; padding:12px 30px; border-radius:8px; font-size:16px; cursor:pointer;">
                Register
            </button>
            <div style="margin-top:15px;">
				<a href="javascript:void(0)" onclick="showLoginForm()">Already have an account? Login</a>
                
            </div>
        </div>
    </form>
</div>

<!-- Login Form (Hidden by default) -->
 <div id="login-form" style="display: {{ session('show_login') ? 'block' : 'none' }};">
    <form action="{{ route('user.login') }}" method="POST" style="max-width:600px; margin:40px auto; background:#fff; box-shadow:0 10px 25px rgba(0,0,0,0.1); padding:30px 40px; border-radius:12px;">
        @csrf
        <h3 style="text-align:center; margin-bottom:20px;">Login</h3>
        <div style="margin-bottom:20px;">
            <label for="login_email" style="font-weight:600; display:block; margin-bottom:6px; color:#333;">Email</label>
            <input type="email" name="email" id="login_email" required
                style="width:100%; padding:10px 15px; border-radius:8px; border:1px solid #ccc; height:45px; font-size:16px;">
        </div>
	 	@if ($errors->has('email'))
                <div class="error-message" style="color: red; margin-top: 5px; text-align: left;">
                 {{ $errors->first('email') }}
              </div>
             @endif

        <div style="margin-bottom:20px;">
            <label for="login_password" style="font-weight:600; display:block; margin-bottom:6px; color:#333;">Password</label>
            <input type="password" name="password" id="login_password" required
                style="width:100%; padding:10px 15px; border-radius:8px; border:1px solid #ccc; height:45px; font-size:16px;">
        </div>
		@if ($errors->has('password'))
                <div class="error-message" style="color: red; margin-top: 5px; text-align: left;">
                 {{ $errors->first('password') }}
              </div>
             @endif

        <div style="text-align:center;">
            <button type="submit"
                style="background-color:#0d6efd; color:#fff; border:none; padding:12px 30px; border-radius:8px; font-size:16px; cursor:pointer;">
                Login
            </button>
            <div style="margin-top:15px;">
				<a href="javascript:void(0)" onclick="showRegisterForm()">Don't have an account? Register</a>
             </div>
        </div>
    </form>
</div>




							</div>
						</div>
						<div class="room-details-amenities">
							<div class="room-details-amenities-content">
								<h4>Amenities</h4>
							</div>
							<div class="room-amenities-item">
								<ul>
									<li><img src="assets/images/inner/room-amenities-1.png" alt="">2 - 5 Persons</li>
									<li><img src="assets/images/inner/room-amenities-2.png" alt="">Free WiFi Available</li>
									<li><img src="assets/images/inner/room-amenities-3.png" alt="">Swimingpools</li>
									<li><img src="assets/images/inner/room-amenities-4.png" alt="">Breakfast</li>
									<li><img src="assets/images/inner/room-amenities-5.png" alt="">250 SQFT Rooms</li>
									<li><img src="assets/images/inner/room-amenities-6.png" alt="">Gym facilities</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--==================================================-->
<!-- End Royella Room Details Area -->
<!--==================================================-->



<!--==================================================-->
<!-- Start Royella Room Area -->
<!--==================================================-->

<!--==================================================-->
<!-- End Royella Room Area -->
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
<!-- JavaScript to toggle forms -->
<script>
    function showLoginForm() {
        document.getElementById('register-form').style.display = 'none';
        document.getElementById('login-form').style.display = 'block';
    }

    function showRegisterForm() {
        document.getElementById('register-form').style.display = 'block';
        document.getElementById('login-form').style.display = 'none';
    }

    // Show login form if validation failed during login
    window.onload = function () {
        @if(session('show_login'))
            showLoginForm();
        @else
            showRegisterForm();
        @endif
    };
</script>
@endsection

