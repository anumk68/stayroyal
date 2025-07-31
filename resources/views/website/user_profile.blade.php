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
						<h4>Profile</h4>
					</div>
					<ul>
						<li><a href="{{ route('home') }}">Home</a></li>
						<li>/</li>
						<li>Profile</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<!--==================================================-->
<!-- End Royella Breadcumb Area -->
<!--==================================================-->
<style>
    
</style>

<div class="room-details">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="profile-form-wrapper">
                     <div style="display: flex;align-items: center;gap: 8px;justify-content: center;">
                <img src="{{ asset('public/storage/image/user-logo.png') }}" alt="User" style="width: 170px; height: 100px; border-radius: 50%;">
                <span style="font-weight: 500; font-size: 14px; color: #f1f1f1;">{{ Auth::user()->user_name }}</span>
                </div>
                    <h3>User Profile</h3>
                     <form action="{{ route('update.user.profile') }}" method="POST">
                       @csrf
                     <input type="hidden" name="id" value="{{ $user_details->id }}" required>
                   <label for="user_name">Name</label>
               <input type="text" name="user_name" value="{{ old('user_name', $user_details->user_name) }}" required>
                 <div class="error-msg text-danger" id="user_name-error"></div>
                 @if ($errors->has('user_name'))
                <div class="error-message" style="color: red; margin-top: 5px; text-align: left;">
                  {{ $errors->first('user_name') }}
               </div>
              @endif

              <label for="email">Email</label>
              <input type="email" name="email" value="{{ old('email', $user_details->email) }}" required>
                <div class="error-msg text-danger" id="email-error"></div>
                 @if ($errors->has('email'))
                <div class="error-message" style="color: red; margin-top: 5px; text-align: left;">
                  {{ $errors->first('email') }}
               </div>
              @endif

               <label for="phone">Phone</label>
               <input type="text" name="phone" value="{{ old('phone', $user_details->phone) }}">
                  <div class="error-msg text-danger" id="phone-error"></div>
                 @if ($errors->has('phone'))
                <div class="error-message" style="color: red; margin-top: 5px; text-align: left;">
                  {{ $errors->first('phone') }}
               </div>
              @endif

               <label for="address">Address</label>
               <input type="text" name="address" value="{{ old('address', $user_details->address) }}">
                <div class="error-msg text-danger" id="address-error"></div>
                 @if ($errors->has('address'))
                <div class="error-message" style="color: red; margin-top: 5px; text-align: left;">
                  {{ $errors->first('address') }}
               </div>
              @endif

               <div style="display: flex; justify-content: space-between;">
             <button type="submit" class="btn btn-success">Update Profile</button>
             </div>
              </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

