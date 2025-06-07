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

        
    <div class="row align-items-center" style="margin-top: 30px;">
    @foreach($rooms as $room)
        <div class="col-lg-4 col-md-6" style="margin-top: 30px;">
            <div class="room-single-box {{ in_array($room->id, $bookedRoomIds ?? []) ? 'booked' : '' }}"
                 style="{{ in_array($room->id, $bookedRoomIds ?? []) ? 'opacity: 0.6;' : '' }}">
                 
                <div class="room-thumb">
                    <img src="{{ asset('storage/' . $room->room_image) }}" alt="">
                    <div class="room-details-button">
                        @if(in_array($room->id, $bookedRoomIds ?? []))
                            <span style="color:red; font-weight:bold;">Unavailable</span>
                        @else
                            <a href="{{ route('roomdetails', $room->id) }}">View Details <i class="bi bi-arrow-right"></i></a>
                        @endif
                    </div>
                </div>

                <div class="room-pricing">
                    <span class="dolar">$#{{ $room->price }}</span>
                    <span>Night</span>
                </div>

                <div class="room-content">
                    <span class="room-location">
                        <i class="bi bi-geo-alt-fill"></i> {{ $room->location }}
                    </span>
                    <h3>{{ $room->room_type }}</h3>   
                    <p>{{ $room->type_name }}</p>
                </div>

                <div class="room-bottom">
                    <div class="room-bottom-icon">
                        <span><img src="assets/images/home-1/room-bottom-icon.png" alt=""> {{ $room->size }}</span>
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

            @if(in_array($room->id, $bookedRoomIds ?? []))
                <p style="color:red; margin-top: 15px; margin-bottom: 0;">
                    ⚠️ This room is booked for selected dates
                </p>
            @endif
        </div>
    @endforeach
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
				          @if ($errors->has('booking_error'))
                   <div style="color: red; margin-bottom: 10px;">
                  {{ $errors->first('booking_error') }}
                   </div>
                  @endif
							<div class="booking-item">
								<form action="{{ route('user.details') }}" method="POST" style="max-width:900px;margin:40px auto;background:#fff;box-shadow:0 10px 25px rgba(0,0,0,0.1);padding:30px 40px;border-radius:12px;">
                              @csrf
							  <input type="hidden" name="id" id="id" value="{{ $details->id }}">
                           <div style="display:flex;gap:20px;flex-wrap:wrap;">
                            <div style="flex:1;min-width:250px;">
                             <label for="start_date" style="font-weight:500;display:block;margin-bottom:8px;">Check-In Date</label>
                             <input type="date"
                              id="start_date"
                             name="start_date"
                             value="{{ $data['start_date'] ?? '' }}"
                             required
                             style="width:100%;padding:10px 15px;border-radius:8px;border:1px solid #ccc;height:45px;">
                           </div>

                          <script>
                              // Set today's date as minimum for check-in
                               const today = new Date().toISOString().split('T')[0];
                               document.getElementById('start_date').setAttribute('min', today);
                           </script>

                         <div style="flex:1;min-width:250px;">
                            <label for="end_date" style="font-weight:500;display:block;margin-bottom:8px;">Check-Out Date</label>
                           <input type="date" name="end_date" value="{{ $data['end_date'] }}" required
                               style="width:100%;padding:10px 15px;border-radius:8px;border:1px solid #ccc;height:45px;">
                             </div>

                          <div style="flex:1;min-width:250px;">
                       <label for="room_type" style="font-weight:500;display:block;margin-bottom:8px;">Room Type</label>
                          <select name="room_type" required
                          style="width:100%;padding:10px 15px;border-radius:8px;border:1px solid #ccc;height:45px;">
                             @foreach ($roomtypes as $roomtype)
                              <option value="{{ $roomtype->id }}"
                            @if(isset($data['room_type']) && $data['room_type'] == $roomtype->id) selected @endif>
                             {{ $roomtype->room_type }}
                       </option>
                     @endforeach
                </select>
                 </div>


                 <div style="flex:1;min-width:250px;">
                     <label for="total_days" style="font-weight:500;display:block;margin-bottom:8px;">Guests</label>
                       <select name="total_days" required
                       style="width:100%;padding:10px 15px;border-radius:8px;border:1px solid #ccc;height:45px;">

                       <option value="" disabled {{ empty($data['total_days']) ? 'selected' : '' }}>Select Guests</option>
                        <option value="01 Adult" @if(isset($data['total_days']) && $data['total_days'] == "01 Adult") selected @endif>
                       01 Member
                      </option>
                       <option value="02 Adult" @if(isset($data['total_days']) && $data['total_days'] == "02 Adult") selected @endif>
                     02 Member
                     </option>

                      <option value="03 Adult" @if(isset($data['total_days']) && $data['total_days'] == "03 Adult") selected @endif>
                        03 Member
                     </option>
                      <option value="04 Adult" @if(isset($data['total_days']) && $data['total_days'] == "04 Adult") selected @endif>
                      04 Member
                       </option>

                    </select>
                </div>

           </div>

    <div style="text-align:center;margin-top:30px;">
        <button type="submit"
                style="background-color:#0d6efd;color:white;border:none;padding:12px 30px;border-radius:8px;font-size:16px;cursor:pointer;transition:0.3s;">
            Book Now
        </button>
    </div>
</form>

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

@endsection

