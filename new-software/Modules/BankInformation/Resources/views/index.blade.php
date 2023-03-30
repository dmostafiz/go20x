@extends('site-layouts.master')

@section('content')
<?php $country_selected = isset($_GET['country_selected']) ? $_GET['country_selected'] : '';
if (isset($user->bank_country)) {
    $country_code = strtolower($user->bank_country);
} else {
    //$country_code = strtolower($user->country_code);
    $country_code = 'us';
}
?>
<style>
    span.error {
        color: red;
    }
</style>
<div class="mb-3 card">
	<div class="card-header">
		<div class="align-items-end g-2 row">
			<div class="col">
				<div class="d-flex">
					<h5 class="mb-0 hover-actions-trigger" id="example">Banking Information</h5></div>
			</div>
		</div>
	</div>
	<div class="bg-light card-body">
		<form class="profile-edit-form mb--25" id="bank_form" action="{{route('store.bankinfo')}}" method="post" novalidate>
			<div class="gx-2 gy-3 row">
                        @csrf
                        <div class='col-md-12 row mt-3'>
                            <div class=" col-md-12 ">
                                <select class="custom-select form-control" id="country_select" name="bank_country">
                                    
                                    @foreach($countries as $country)
                                    @php $country = json_decode(json_encode($country), TRUE);  @endphp
                                    <option  value="{{strtolower( $country['iso2'])}}"
                                    {{ $country_code == strtolower($country['iso2']) || $country_selected == strtolower($country['iso2']) ? 'selected':''}}>
                                	{{ $country['name']}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class='usa row' @if ($country_code=='us' ) style="" @else style="display:none" @endif>
                            <div class="col-md-6 mt-3">
                                <label for="legal-name">@lang('Legal Name')</label>
                                <input type="text" id="legal-name" class="form-control @error('bank_legal_name_us') is-invalid @enderror" name="bank_legal_name_us" value="{{ old('bank_legal_name_us', @$user->bank_legal_name_us)}}">
                                @if ($errors->has('bank_legal_name_us'))
									<span class="invalid-feedback d-block" role="alert">
		                					<strong>{{ $errors->first('bank_legal_name_us') }}</strong>
		            				</span>
		                        @endif
                                
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="bank-email">@lang('Email')</label>
                                <input type="email" id="bank-email" name="bank_email_us" class="form-control" placeholder="@lang('Enter Email')" value="{{ old('bank_email_us', @$user->bank_email_us)}}">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="account-number">@lang('Account Number')</label>
                                <input type="text" id="account-number" class="form-control @error('bank_account_number_us') is-invalid @enderror" name="bank_account_number_us" value="{{ old('bank_account_number_us', @$user->bank_account_number_us)}}" required="">
		                        @if ($errors->has('bank_account_number_us'))
									<span class="invalid-feedback d-block" role="alert">
		                					<strong>{{ $errors->first('bank_account_number_us') }}</strong>
		            				</span>
		                        @endif
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="verify-account-number">@lang('Verify Account Number')</label>
                                <input type="text" id="verify-account-number" class="form-control" name="verify_account_number_us" value="{{ old('verify_account_number_us', @$user->bank_account_number_us)}}" required="">
                                {{-- <span  id="account-number-span" class="error"></span> --}}
                                <span class="invalid-feedback d-block" role="alert">
		                			<strong id="account-number-span"></strong>
		            			</span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="routing-number">@lang('Routing Number')</label>
                                <input type="text" id="routing-number" class="form-control @error('bank_route_number_us') is-invalid @enderror" name="bank_route_number_us" value="{{ old('bank_route_number_us', @$user->bank_route_number_us)}}" required="">
                                @if ($errors->has('bank_route_number_us'))
									<span class="invalid-feedback d-block" role="alert">
		                					<strong>{{ $errors->first('bank_route_number_us') }}</strong>
		            				</span>
		                        @endif
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="verify-routing-number">@lang('Verify Routing Number')</label>
                                <input type="text" id="verify-routing-number" class="form-control" name="verify_routing_number_us" value="{{ old('verify_routing_number_us', @$user->bank_route_number_us)}}" required="">
                                {{-- <span id="routing-number-span" class="error"></span> --}}
                                <span class="invalid-feedback d-block" role="alert">
		                			<strong id="routing-number-span"></strong>
		            			</span>
                            </div>
                            
                            <div class=" col-md-6 mt-3">
                                <label for="bank-phone">@lang('Phone')</label>
                                <input type="text" id="bank-phone" name="bank_phone_us" class="form-control" placeholder="@lang('Enter Phone')" value="{{ old('bank_phone_us', @$user->bank_phone_us)}}">
                            </div>
                        </div>
                        <div class='ca row' @if ($country_code=='ca' ) style="" @else style="display:none" @endif>
                            <div class="col-md-6 mt-3">
                                <label for="legal-name">@lang('Legal Name')</label>
                                <input type="text" id="legal-name" class="form-control @error('bank_legal_name_ca') is-invalid @enderror" name="bank_legal_name_ca" value="{{ old('bank_legal_name_ca', @$user->bank_legal_name)}}">
                                @if ($errors->has('bank_legal_name_ca'))
									<span class="invalid-feedback d-block" role="alert">
		                					<strong>{{ $errors->first('bank_legal_name_ca') }}</strong>
		            				</span>
		                        @endif
                            </div>
                            <div class=" col-md-6 mt-3">
                                <label for="email">@lang('Interac Registered Email')</label>
                                <input type="email" id="email" class="form-control" name="bank_email_ca" placeholder="@lang('Enter Email')" value="{{ old('bank_email_ca', @$user->bank_email)}}">
                            </div>
                            <div class=" col-md-6 mt-3">
                                <label for="institution-number">@lang('Institution Number')</label>
                                <input type="text" id="institution-number" class="form-control" name="bank_institution_number" value="{{ old('bank_institution_number', @$user->bank_institution_number)}}">
                            </div>

                            <div class=" col-md-6 mt-3">
                                <label for="transit-number">@lang('Transit Number')</label>
                                <input type="text" id="transit-number" class="form-control" name="bank_transit_number" value="{{ old('bank_transit_number', @$user->bank_transit_number)}}">
                            </div>

                            <div class=" col-md-6 mt-3">
                                <label for="account-number2">@lang('Account Number')</label>
                                <input type="text" id="account-number2" class="form-control @error('bank_account_number_ca') is-invalid @enderror" name="bank_account_number_ca" value="{{ old('bank_account_number_ca', @$user->bank_account_number)}}" required="">
                                @if ($errors->has('bank_account_number_ca'))
									<span class="invalid-feedback d-block" role="alert">
		                					<strong>{{ $errors->first('bank_account_number_ca') }}</strong>
		            				</span>
		                        @endif
                            </div>
                            <div class=" col-md-6 mt-3">
                                <label for="verify-account-number2">@lang('Verify Account Number')</label>
                                <input type="text" id="verify-account-number2" class="form-control" name="verify_account_number_ca" value="{{ old('verify_account_number_ca', @$user->bank_account_number)}}" required="">
                                {{-- <span id="account-number-span2" class="error"></span> --}}
                                <span class="invalid-feedback d-block" role="alert">
		                				<strong id="account-number-span2"></strong>
		            			</span>
                            </div>

                            <div class=" col-md-6 mt-3">
                                <label for="bank_province">@lang('Province')</label>
                                <input type="text" id="bank_province" class="form-control" name="bank_province_ca" placeholder="@lang('Enter Province')" value="{{ old('bank_province_ca', @$user->bank_province_ca)}}">
                            </div>

                            <div class=" col-md-6 mt-3">
                                <label for="city">@lang('City')</label>
                                <input type="text" id="city" name="bank_city_ca" class="form-control" placeholder="@lang('Enter City')" value="{{ old('bank_city_ca', @$user->bank_city_ca)}}">
                            </div>


                            <div class=" col-md-6 mt-3">
                                <label for="address">@lang('Address 1')</label>
                                <input type="text" id="address" name="bank_add1_ca" class="form-control" placeholder="@lang('Enter Address 1')" value="{{ old('bank_add1_ca', @$user->bank_add1_ca)}}">
                            </div>

                            <div class=" col-md-6 mt-3">
                                <label for="bank-add2">@lang('Address 2')</label>
                                <input type="text" id="bank-add2" name="bank_add2_ca" class="form-control" placeholder="@lang('Enter Address 2')" value="{{ old('bank_add2_ca', @$user->bank_add2_ca)}}">
                            </div>

                            <div class=" col-md-6 mt-3">
                                <label for="bank-postal-code">@lang('Postal Code')</label>
                                <input type="text" id="bank-postal-code" class="form-control" name="bank_postal_code_ca" placeholder="@lang('Enter Postal Code')" value="{{ old('bank_postal_code_ca', @$user->bank_postal_code_ca)}}">
                            </div>

                        </div>
                        <div class='au row' @if ($country_code=='au' ) style="" @else style="display:none" @endif>
                            <div class="col-md-6 mt-3">
                                <label for="legal-name">@lang('Legal Name')</label>
                                <input type="text" id="legal-name" class="form-control @error('bank_legal_name_au') is-invalid @enderror" name="bank_legal_name_au" value="{{__(@$user->bank_legal_name_au)}}">
                                @if ($errors->has('bank_legal_name_au'))
									<span class="invalid-feedback d-block" role="alert">
		                					<strong>{{ $errors->first('bank_legal_name_au') }}</strong>
		            				</span>
		                        @endif
                            </div>
                            <div class=" col-md-6 mt-3">
                                <label for="bsb">@lang('BSB Code')</label>
                                <input type="text" id="bsb" name="au_bsb" class="form-control @error('au_bsb') is-invalid @enderror" placeholder="@lang('Enter Bsb Code')" value="{{ old('au_bsb', @$user->au_bsb)}}">
                                @if ($errors->has('au_bsb'))
									<span class="invalid-feedback d-block" role="alert">
		                					<strong>{{ $errors->first('au_bsb') }}</strong>
		            				</span>
		                        @endif
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="account-number2">@lang('Account Number')</label>
                                <input type="text" id="account-number2" class="form-control @error('bank_account_number_au') is-invalid @enderror" name="bank_account_number_au" value="{{ old('bank_account_number_au', @$user->bank_account_number_au)}}" required="">
                                @if ($errors->has('bank_account_number_au'))
									<span class="invalid-feedback d-block" role="alert">
		                					<strong>{{ $errors->first('bank_account_number_au') }}</strong>
		            				</span>
		                        @endif
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="city">@lang('City')</label>
                                <input type="text" id="city" name="bank_city_au" class="form-control" placeholder="@lang('Enter City')" value="{{ old('bank_city_au', @$user->bank_city_au)}}">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="address">@lang('Address')</label>
                                <input type="text" id="address" name="bank_add1_au" class="form-control" placeholder="@lang('Enter Address')" value="{{ old('bank_add1_au', @$user->bank_add1_au)}}">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="bank-postal-code">@lang('Postal Code')</label>
                                <input type="text" id="bank-postal-code" class="form-control" name="bank_postal_code_au" placeholder="@lang('Enter Postal Code')" value="{{ old('bank_postal_code_au', @$user->bank_postal_code_au)}}">
                            </div>

                        </div>
                        <div class='uk row' @if ($country_code=='gb' ) style="" @else style="display:none" @endif>
                            <div class=" col-md-6 mt-3">
                                <label for="legal-name">@lang('Legal Name')</label>
                                <input type="text" id="legal-name" class="form-control @error('bank_legal_name_uk') is-invalid @enderror" name="bank_legal_name_uk" value="{{ old('bank_legal_name_uk', @$user->bank_legal_name_uk)}}">
                                @if ($errors->has('bank_legal_name_uk'))
									<span class="invalid-feedback d-block" role="alert">
		                					<strong>{{ $errors->first('bank_legal_name_uk') }}</strong>
		            				</span>
		                        @endif
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="uk_short_code">@lang('UK Sort Code')</label>
                                <input type="text" id="uk_short_code" class="form-control @error('uk_short_code') is-invalid @enderror" name="uk_short_code" placeholder="@lang('Enter UK Sort Code')" value="{{ old('uk_short_code', @$user->uk_short_code)}}">
                                @if ($errors->has('uk_short_code'))
									<span class="invalid-feedback d-block" role="alert">
		                					<strong>{{ $errors->first('uk_short_code') }}</strong>
		            				</span>
		                        @endif
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="account-number2">@lang('Account Number')</label>
                                <input type="text" id="account-number2" class="form-control @error('bank_account_number_uk') is-invalid @enderror" name="bank_account_number_uk" value="{{ old('bank_account_number_uk', @$user->bank_account_number_uk)}}" required="">
                                @if ($errors->has('bank_account_number_uk'))
									<span class="invalid-feedback d-block" role="alert">
		                					<strong>{{ $errors->first('bank_account_number_uk') }}</strong>
		            				</span>
		                        @endif
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="city">@lang('City')</label>
                                <input type="text" id="city" name="bank_city" class="form-control" placeholder="@lang('Enter City')" value="{{ old('bank_city', @$user->bank_city_uk)}}">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="address">@lang('Address')</label>
                                <input type="text" id="address" name="bank_add1" class="form-control" placeholder="@lang('Enter Address')" value="{{ old('bank_add1', @$user->bank_add1_uk)}}">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="bank-postal-code">@lang('Postal Code')</label>
                                <input type="text" id="bank-postal-code" class="form-control" name="bank_postal_code" placeholder="@lang('Enter Postal Code')" value="{{ old('bank_postal_code', @$user->bank_postal_code_uk)}}">
                            </div>

                        </div>
                        <div class='ph row' @if ($country_code=='ph' ) style="" @else style="display:none" @endif>
                            <div class="col-md-6 mt-3">
                                <label for="legal-name">@lang('Legal Name')</label>
                                <input type="text" id="legal-name" class="form-control @error('bank_legal_name_ph') is-invalid @enderror" name="bank_legal_name_ph" value="{{ old('bank_legal_name_ph', @$user->bank_legal_name_ph)}}" required>
                                @if ($errors->has('bank_legal_name_ph'))
									<span class="invalid-feedback d-block" role="alert">
		                					<strong>{{ $errors->first('bank_legal_name_ph') }}</strong>
		            				</span>
		                        @endif
                            </div>
                           

                            <div class="col-md-6 mt-3">
                                <label for="account-number2">@lang('Account Number')</label>
                                <input type="text" id="account-number2" class="form-control @error('bank_account_number_ph') is-invalid @enderror" name="bank_account_number_ph" value="{{ old('bank_account_number_ph', @$user->bank_account_number_ph)}}" required>
                                @if ($errors->has('bank_account_number_ph'))
									<span class="invalid-feedback d-block" role="alert">
		                					<strong>{{ $errors->first('bank_account_number_ph') }}</strong>
		            				</span>
		                        @endif
                            </div>
                            
                            <div class="col-md-6 mt-3">
                                <label for="iban-number">@lang('Iban Number')</label>
                                <input type="text" id="iban-number" class="form-control" name="bank_iban_ph" value="{{ old('bank_iban_ph', @$user->bank_iban_ph)}}" >
                            </div>
                            
                            <div class="col-md-6 mt-3">
                                <label for="city">@lang('City')</label>
                                <input type="text" id="city" name="bank_city_ph" class="form-control" placeholder="@lang('Enter City')" value="{{ old('bank_city_ph', @$user->bank_city_ph)}}">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="address">@lang('Address')</label>
                                <input type="text" id="address" name="bank_add1_ph" class="form-control" placeholder="@lang('Enter Address')" value="{{ old('bank_add1_ph', @$user->bank_add1_ph)}}">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="bank-postal-code">@lang('Postal Code')</label>
                                <input type="text" id="bank-postal-code" class="form-control" name="bank_postal_code_ph" placeholder="@lang('Enter Postal Code')" value="{{ old('bank_postal_code_ph', @$user->bank_postal_code_ph)}}">
                            </div>

                        </div>
                        <div class='nz row' @if ($country_code=='nz' ) style="" @else style="display:none" @endif>
                            <div class="col-md-6 mt-3">
                                <label for="legal-name">@lang('Legal Name')</label>
                                <input type="text" id="legal-name" class="form-control @error('bank_legal_name_nz') is-invalid @enderror" name="bank_legal_name_nz" value="{{ old('bank_legal_name_nz', @$user->bank_legal_name_nz)}}" required>
                                @if ($errors->has('bank_legal_name_nz'))
									<span class="invalid-feedback d-block" role="alert">
		                					<strong>{{ $errors->first('bank_legal_name_nz') }}</strong>
		            				</span>
		                        @endif
                            </div>
                            
                            
                            <div class="col-md-6 mt-3">
                                <label for="account-number2">@lang('Account Number')</label>
                                <input type="text" id="account-number2" class="form-control @error('bank_account_number_nz') is-invalid @enderror" name="bank_account_number_nz" value="{{ old('bank_account_number_nz', @$user->bank_account_number_nz) }}" required>
                                @if ($errors->has('bank_account_number_nz'))
									<span class="invalid-feedback d-block" role="alert">
		                					<strong>{{ $errors->first('bank_account_number_nz') }}</strong>
		            				</span>
		                        @endif
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="city">@lang('City')</label>
                                <input type="text" id="city" name="bank_city_nz" class="form-control" placeholder="@lang('Enter City')" value="{{ old('bank_city_nz', @$user->bank_city_nz)}}">
                            </div>


                            <div class="col-md-6 mt-3">
                                <label for="address">@lang('Address')</label>
                                <input type="text" id="address" name="bank_add1_nz" class="form-control" placeholder="@lang('Enter Address')" value="{{ old('bank_add1_nz', @$user->bank_add1_nz)}}">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="bank-postal-code">@lang('Postal Code')</label>
                                <input type="text" id="bank-postal-code" class="form-control" name="bank_postal_code_nz" placeholder="@lang('Enter Postal Code')" value="{{ old('bank_postal_code_nz', @$user->bank_postal_code_nz)}}">
                            </div>

                        </div>
                       	<div class="row col-md-12 mt-3">
                       		<div class="text-end">
							<button type="submit" class="btn btn-primary" fdprocessedid="t2coi8">Submit</button>
							</div>
                       	</div>
                        
                </div>
                    </form>
			</div>
</div>
@endsection
@section('js')
<script type="text/javascript">

	
    (function($) {
        "use strict";
        $("#country_select").change(function() {
            if ($("#country_select").val() == "ca") {
                $(".ca").show();
                $(".usa").hide();
                $(".au").hide();
                $(".uk").hide();
                $(".ph").hide();
                $(".nz").hide();
            }
            if ($("#country_select").val() == "us") {
                $(".usa").show();
                $(".ca").hide();
                $(".au").hide();
                $(".uk").hide();
                $(".ph").hide();
                $(".nz").hide();
            }
            if ($("#country_select").val() == "au") {
                $(".au").show();
                $(".ca").hide();
                $(".usa").hide();
                $(".uk").hide();
                $(".ph").hide();
                $(".nz").hide();
            }
            if ($("#country_select").val() == "gb") {
                $(".uk").show();
                $(".au").hide();
                $(".ca").hide();
                $(".usa").hide();
                $(".ph").hide();
                $(".nz").hide();

            }
            if ($("#country_select").val() == "ph") {
                $(".ph").show();
                $(".uk").hide();
                $(".au").hide();
                $(".ca").hide();
                $(".usa").hide();
                $(".nz").hide();
            }
            if ($("#country_select").val() == "nz") {
                $(".nz").show();
                $(".uk").hide();
                $(".au").hide();
                $(".ca").hide();
                $(".usa").hide();
                $(".ph").hide();
            }
        });

        document.querySelector("#bank_form").addEventListener("submit", function(e) {

            var errors = false;

            if ($("#country_select").val() == "ca") {
                if ($("#account-number2").val() != $("#verify-account-number2").val()) {
                    $("#account-number-span2").html('The account numbers not match for canada!');
                    errors = true;
                } else {
                    $("#account-number-span2").html('');
                }
            }

            if ($("#country_select").val() == "us") {
                if ($("#routing-number").val() != $("#verify-routing-number").val()) {
                    $("#routing-number-span").html('The routing numbers not match!');
                    errors = true;
                } else {
                    $("#routing-number-span").html('');
                }

                if ($("#account-number").val() != $("#verify-account-number").val()) {
                    $("#account-number-span").html('The account numbers not match!');
                    errors = true;
                } else {
                    $("#account-number-span").html('');
                }
            }

            if (errors == true) {
                e.preventDefault();
                return false;
            } else {
                //var url = window.location.href.split("?")[0]; 
                //$('#bank_form').attr('action',url+'?country_selected='+$("#country_select").val()); 
                $('#bank_form').submit();
            }


        });

    })(jQuery);
</script>
@endsection