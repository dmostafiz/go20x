@extends('site-layouts.master')
@section('css')
<style>
    .hover-input-popup {
        position: relative;
    }
    .hover-input-popup:hover .input-popup {
        opacity: 1;
        visibility: visible;
    }
    .input-popup {
        position: absolute;
        bottom: 130%;
        left: 50%;
        width: 280px;
        background-color: #1a1a1a;
        color: #fff;
        padding: 20px;
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        -ms-border-radius: 5px;
        -o-border-radius: 5px;
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        transform: translateX(-50%);
        opacity: 0;
        visibility: hidden;
        -webkit-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
    }
    .input-popup::after {
        position: absolute;
        content: '';
        bottom: -19px;
        left: 50%;
        margin-left: -5px;
        border-width: 10px 10px 10px 10px;
        border-style: solid;
        border-color: transparent transparent #1a1a1a transparent;
        -webkit-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        transform: rotate(180deg);
    }
    .input-popup p {
        padding-left: 20px;
        position: relative;
    }
    .input-popup p::before {
        position: absolute;
        content: '';
        font-family: 'Line Awesome Free';
        font-weight: 900;
        left: 0;
        top: 4px;
        line-height: 1;
        font-size: 18px;
    }
    .input-popup p.error {
        text-decoration: line-through;
    }
    .input-popup p.error::before {
        content: "\f057";
        color: #ea5455;
    }
    .input-popup p.success::before {
        content: "\f058";
        color: #28c76f;
    }
</style>
@endsection

@section('content')
<div class="mb-3 card">
	<div class="mb-8 position-relative min-vh-25 mb-7 card-header">
		<div class="bg-holder rounded-3 rounded-bottom-0" style="background-image: url(https://falconreact18.prium.me/static/media/4.ddc97c4637126ada8136.jpg);"></div>
		<div class="avatar avatar-5xl avatar-profile"><img class="rounded-circle img-thumbnail shadow-sm" 
			@if(is_null($user->image)) src="{{url('static/assets/img/userprofile/default.png')}}" 
			@else
			src="{{url('static/assets/img/userprofile/'.$user->image)}}" 
			@endif alt="UserImage"></div>
	</div>
</div>
<div class="g-3 row">
	<div class="col-lg-8">
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0">Profile Settings</h5></div>
			<div class="bg-light card-body">
				<form class="" method="post" action="{{route('update.profile')}}" enctype="multipart/form-data">
					@csrf
					<div class="mb-3 g-3 row">
						<div class="col-lg-6">
							<label class="form-label" for="firstName">First Name</label>
							<input placeholder="First Name" name="firstname" type="text" id="firstName" class="form-control @error('firstname') is-invalid @enderror" value="{{$user->firstname}}" >
							@if ($errors->has('firstname'))
								<span class="invalid-feedback d-block" role="alert">
	                					<strong>{{ $errors->first('firstname') }}</strong>
	            				</span>
	                        @endif
						</div>
						
						<div class="col-lg-6">
							<label class="form-label" for="lastName">Last Name</label>
							<input placeholder="Last Name" name="lastname" type="text" id="lastName" class="form-control @error('lastname') is-invalid @enderror " value="{{$user->lastname}}" >
							@if ($errors->has('lastname'))
							<span class="invalid-feedback d-block" role="alert">
                					<strong>{{ $errors->first('lastname') }}</strong>
            				</span>
                        @endif
						</div>
						
					</div>
					<div class="mb-3 g-3 row">
						@php
						$address = json_decode($user->address);
						@endphp
                        <div class="col-lg-6">
							<label class="form-label" for="address">Address</label>
							<input placeholder="Address" name="address" type="text" id="address" class="form-control @error('address') is-invalid @enderror" 
							value="{{@$address->address}}">
							@if ($errors->has('address'))
							<span class="invalid-feedback d-block" role="alert">
                					<strong>{{ $errors->first('address') }}</strong>
            				</span>
                        @endif
						</div>
						
						
                        <div class="col-lg-6">
							<label class="form-label" for="country">Country</label>
							<select name="country" class="form-select  @error('country') is-invalid @enderror" id="country" >
								<option value="">Select a Country...</option>
								@foreach($countries as $key => $country)
                                        <option class="form-control" data-mobile_code="{{ $country->phonecode }}" value="{{ $country->iso2 }}" @if(@$address->country == $country->iso2 ) selected @endif data-code="{{$key }}">{{ __($country->name) }}</option>
                                @endforeach
							</select>
							@if ($errors->has('country'))
							<span class="invalid-feedback d-block" role="alert">
                					<strong>{{ $errors->first('country') }}</strong>
            				</span>
                        @endif
						</div>
						

                        <div class="col-lg-6">
							<label class="form-label" for="city">City</label>
							<input placeholder="City" name="city" type="text" id="city" class="form-control 
							@error('city') is-invalid @enderror" value="{{@$address->city}}" >
							@if ($errors->has('city'))
							<span class="invalid-feedback d-block" role="alert">
                					<strong>{{ $errors->first('city') }}</strong>
            				</span>
                        @endif
						</div>
						

                        <div class="col-lg-6">
							<label class="form-label" for="state">State</label>
							<input placeholder="State" name="state" type="text" id="state" class="form-control 
							@error('state') is-invalid @enderror" value="{{@$address->state}}" >
							@if ($errors->has('state'))
							<span class="invalid-feedback d-block" role="alert">
                					<strong>{{ $errors->first('state') }}</strong>
            				</span>
                        @endif
						</div>
						

                        <div class="col-lg-6">
							<label class="form-label" for="zipcode">Zipcode</label>
							<input placeholder="City" name="zip" type="text" id="zipcode" class="form-control 
							@error('zip') is-invalid @enderror" value="{{@$address->zip}}">
							@if ($errors->has('zip'))
							<span class="invalid-feedback d-block" role="alert">
                					<strong>{{ $errors->first('zip') }}</strong>
            				</span>
                        @endif
						</div>
						

                        <div class="col-lg-6">
							<label class="form-label" for="email">Email</label>
							<input placeholder="Email" name="email" type="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}">
							@if ($errors->has('email'))
							<span class="invalid-feedback d-block" role="alert">
                					<strong>{{ $errors->first('email') }}</strong>
            				</span>
                        	@endif
						</div>
						

                        <div class="col-lg-6">
							<label class="form-label" for="phone">Phone</label>
							<input placeholder="Phone" name="mobile" type="text" id="phone" class="form-control @error('mobile') is-invalid @enderror" value="{{$user->mobile}}" >
							@if ($errors->has('mobile'))
								<span class="invalid-feedback d-block" role="alert">
	                					<strong>{{ $errors->first('mobile') }}</strong>
	            				</span>
	                        @endif
						</div>
						
                        <div class="col-lg-12">
	                        <div class="mb-3">
	                        	<label class="form-label" for="formFile">Change Profile Picture</label>
	                        	<input type="file" id="formFile" name="image" class="form-control">
	                        </div>
						</div>
					</div>
					{{-- <div class="mb-3">
						<label class="form-label" for="heading">Heading</label>
						<input placeholder="Heading" name="heading" type="text" id="heading" class="form-control" value="Software Engineer">
					</div> --}}
					{{-- <div class="mb-3">
						<label class="form-label" for="intro">Intro</label>
						<textarea rows="13" placeholder="Intro" name="intro" id="intro" class="form-control">Dedicated, passionate, and accomplished Full Stack Developer with 9+ years of progressive experience working as an Independent Contractor for Google and developing and growing my educational social network that helps others learn programming, web design, game development, networking. I’ve acquired a wide depth of knowledge and expertise in using my technical skills in programming, computer science, software development, and mobile app development to developing solutions to help organizations increase productivity, and accelerate business performance. It’s great that we live in an age where we can share so much with technology but I’m but I’m ready for the next phase of my career, with a healthy balance between the virtual world and a workplace where I help others face-to-face. There’s always something new to learn, especially in IT-related fields. People like working with me because I can explain technology to everyone, from staff to executives who need me to tie together the details and the big picture. I can also implement the technologies that successful projects need.</textarea>
					</div> --}}
					<div class="text-end">
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
				</form>
			</div>
		</div>
		
		
	</div>
	<div class="col-lg-4">
		<div class="sticky-sidebar">
			
			<div class="mb-3 card">
				<div class="card-header">
					<h5 class="mb-0">Billing Setting</h5></div>
				<div class="bg-light card-body">
					<h5>Plan</h5>
					<p class="fs-0"><strong>Developer</strong> - Unlimited private repositories</p><a role="button" tabindex="0" href="/user/settings#!" class="btn btn-falcon-default btn-sm">Update Plan</a></div>
				<div class="bg-light border-top card-body">
					<h5>Payment</h5>
					<p class="fs-0">You have not added any payment.</p><a role="button" tabindex="0" href="/user/settings#!" class="btn btn-falcon-default btn-sm">Add Payment</a></div>
			</div>
			<div class="mb-3 card">
				<div class="card-header">
					<h5 class="mb-0">Change Password</h5></div>
				<div class="bg-light card-body">
					<form class="" action="{{route('change.password')}}" method="post">
						@csrf
						<div class="mb-3">
							<label class="form-label" for="oldPassword">Current Password</label>
							
							<input name="current_password" type="password" id="oldPassword" class="form-control @error('current_password') is-invalid @enderror" value="">

							@if ($errors->has('current_password'))
							<span class="invalid-feedback d-block" role="alert">
                					<strong>{{ $errors->first('current_password') }}</strong>
            				</span>
                        	@endif

						</div>
						<div class="mb-3">
							<label class="form-label" for="newPassword">New Password</label>
							<div class="hover-input-popup">
								<input name="password" type="password" id="newPassword" class="form-control 
								@error('password') is-invalid @enderror" value="" >

							@if($general->secure_password)
                                <div class="input-popup">
                                    <p class="error lower">@lang('1 small letter minimum')</p>
                                    <p class="error capital">@lang('1 capital letter minimum')</p>
                                    <p class="error number">@lang('1 number minimum')</p>
                                    <p class="error special">@lang('1 special character minimum')</p>
                                    <p class="error minimum">@lang('6 character password')</p>
                                </div>
                            @endif
							</div>
							@if ($errors->has('password'))
							<span class="invalid-feedback d-block" role="alert">
                					<strong>{{ $errors->first('password') }}</strong>
            				</span>
                        	@endif
						</div>
						<div class="mb-3">
							<label class="form-label" for="confirmPassword">Confirm Password</label>
							<input name="password_confirmation" type="password" id="confirmPassword" class="form-control @error('password') is-invalid @enderror" value="">
							@if ($errors->has('password'))
							<span class="invalid-feedback d-block" role="alert">
                					<strong>{{ $errors->first('password_confirmation') }}</strong>
            				</span>
                            @endif
						</div>
						<button type="submit" class="w-100 btn btn-primary">Update Password</button>
					</form>
				</div>
			</div>
			
		</div>
	</div>
</div>
@endsection
@section('js')
<script type="text/javascript">
(function ($) {
    "use strict";
    @if($general->secure_password)
        $('input[name=password]').on('input',function(){
            secure_password($(this));
        });
    @endif
})(jQuery);
"use strict";
function secure_password(input){
    var password = input.val();
    var capital = /[ABCDEFGHIJKLMNOPQRSTUVWXYZ]/;
    var capital = capital.test(password);
    if (!capital){
        $('.capital').removeClass('success');
        $('.capital').addClass('error');
    }else{
        $('.capital').removeClass('error');
        $('.capital').addClass('success');
    }
    var lower = /[abcdefghijklmnopqrstuvwxyz]/;
    var lower = lower.test(password);
    if (!lower){
        $('.lower').removeClass('success');
        $('.lower').addClass('error');
    }else{
        $('.lower').removeClass('error');
        $('.lower').addClass('success');
    }
    var number = /[1234567890]/;
    var number = number.test(password);
    if (!number){
        $('.number').removeClass('success');
        $('.number').addClass('error');
    }else{
        $('.number').removeClass('error');
        $('.number').addClass('success');
    }
    var special = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
    var special = special.test(password);
    if (!special){
        $('.special').removeClass('success');
        $('.special').addClass('error');
    }else{
        $('.special').removeClass('error');
        $('.special').addClass('success');
    }
    var minimum = password.length;
    if (minimum < 6){
        $('.minimum').removeClass('success');
        $('.minimum').addClass('error');
    }else{
        $('.minimum').removeClass('error');
        $('.minimum').addClass('success');
    }
}
</script>
@endsection