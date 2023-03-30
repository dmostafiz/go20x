@extends('site-layouts.master')
@section('css')
<style>
    .StripeElement {
        box-sizing: border-box;
        height: 40px;
        padding: 10px 12px;
        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }
    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }
    .StripeElement--invalid {
        border-color: #fa755a;
    }
    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
</style>
@endsection

@section('content')
<div class="g-3 row">
	<div class="col-xl-4 order-xl-1">
		<div class="mb-3 card">
			<div class="bg-light btn-reveal-trigger d-flex flex-between-center card-header">
				<h5 class="mb-0">Order Summary</h5>
				<a class="btn btn-link btn-sm btn-reveal text-600" href="{{route('show.bucket')}}">
					<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pencil-alt" class="svg-inline--fa fa-pencil-alt fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
						<path fill="currentColor" d="M497.9 142.1l-46.1 46.1c-4.7 4.7-12.3 4.7-17 0l-111-111c-4.7-4.7-4.7-12.3 0-17l46.1-46.1c18.7-18.7 49.1-18.7 67.9 0l60.1 60.1c18.8 18.7 18.8 49.1 0 67.9zM284.2 99.8L21.6 362.4.4 483.9c-2.9 16.4 11.4 30.6 27.8 27.8l121.5-21.3 262.6-262.6c4.7-4.7 4.7-12.3 0-17l-111-111c-4.8-4.7-12.4-4.7-17.1 0zM124.1 339.9c-5.5-5.5-5.5-14.3 0-19.8l154-154c5.5-5.5 14.3-5.5 19.8 0s5.5 14.3 0 19.8l-154 154c-5.5 5.5-14.3 5.5-19.8 0zM88 424h48v36.3l-64.5 11.3-31.1-31.1L51.7 376H88v48z"></path>
					</svg>
				</a>
			</div>
			<div class="card-body">
				<table class="fs--1 mb-0 table table-borderless">
					<tbody>
						@foreach($cartItems as $item)
						<tr class="border-bottom">
							<th class="ps-0 ">{{ $item->name }}  x  {{$item->quantity}}
								<!-- <div class="text-400 fw-normal fs--2">16GB RAM, 1TB SSD Hard Drive, 10-core Intel Xeon, Mac OS, Secured</div> -->
							</th>
							<th class="pe-0 text-end">${{ $item->price *  $item->quantity}}</th>
						</tr>
						@endforeach
						{{-- <tr class="border-bottom">
							<th class="ps-0">Subtotal</th>
							<th class="pe-0 text-end">${{ Cart::getTotal() }}</th>
						</tr> --}}
						<tr class="border-bottom">
							<th class="ps-0">Shipping Tax</th>
							<th class="pe-0 text-end shipping-tax">$0.00</th>
						</tr>
						<tr class="border-bottom">
							<th class="ps-0 vat_state_tax">Vat Tax</th>
							<th class="pe-0 text-end shipping-vat-tax">$0.00</th>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="d-flex justify-content-between bg-light card-footer">
				<div class="fw-semi-bold">Payable Total</div>
				<div class="fw-bold grand-total">$0.00</div>
			</div>
		</div>
	</div>
	<div class="col-xl-8">
		<form action="{{route('stripe.post')}}" id="signupform" class="stripe-form" method="post" name="signupform">
		@csrf
		<input type="hidden" name="payment_method" class="payment-method">
		<div class="mb-3 card">
			<div class="bg-light card-header">
				<div class="flex-between-center row">
					<div class="col-sm-auto">
						<h5 class="mb-0">Your Shipping Address</h5></div>
					<div class="col-sm-auto">
						<a href="{{route('create.shipping')}}" type="button" class="btn btn-falcon-default btn-sm">
							<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14 me-2 me-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="transform-origin: 0.4375em 0.5em;">
								<g transform="translate(224 256)">
									<g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
										<path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" transform="translate(-224 -256)"></path>
									</g>
								</g>
							</svg>Add New Address</a>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					@foreach($shipping_address as $address)
					@php
					$state = '';
					$country = '';
					$state = getStateByISO2($address->state , $address->country);
					$country = getCountryByISO2($address->country);
					@endphp
					<div class="mb-3 mb-md-0 col-md-6">
						<div class="mb-0 form-check radio-select form-check">
							<input name="clientAddress" type="radio" id="address-{{$address->id}}" class="form-check-input" checked="" data-state="{{$address->state}}" data-country="{{$address->country}}" value="{{$address->id}}">
							<label for="address-{{$address->id}}" class="mb-0 fw-bold d-block form-check-label">{{$address->first_name ?? ''}} {{$address->last_name ?? ''}}<span class="radio-select-content"><span>{{$address->address_line_1 ?? ''}} {{$address->address ?? ''}}, <br> {{$address->city ?? ''}}, <br> {{$state}}, {{$address->zipcode ?? ''}} {{$country}} <span class="d-block mb-0 pt-2">
							{{$address->phone_number ?? ''}}</span></span>
								</span>
							</label><a class="fs--1" href="{{route('edit.shipping',$address->id)}}">Edit</a></div>
					</div>
					
					@endforeach
				</div>
			</div>
		</div>
		<div class="card">
			<div class="bg-light card-header">
				<h5 class="mb-0">Payment Method</h5></div>
			<div class="card-body">
				<div class="mb-0 form-check form-check">
					<input name="payment-method" type="radio" id="credit-card" class="form-check-input" checked="">
					<label for="credit-card" class="mb-2 fs-1 form-check-label">Credit Card</label>
				</div>
				
				
					<div class="gx-0 ps-2 mb-4 row">
						<div class="px-3 col-sm-8">
							<div class="mb-3 mt-3">
								<label class="ls text-uppercase text-600 fw-semi-bold mb-0 form-label">Name On Card</label>
								<input name="card_holder_name" placeholder="Name" type="text" id="nameoncard" class="form-control StripeElement" required="">
							</div>
							<div id="card-element"></div>
							
                            <div id="card-errors" class="mt-3 text-danger" role="alert"></div>
						</div>
						<div class="ps-3 text-center pt-2 d-none d-sm-block col-4">
							<div class="rounded-1 p-2 mt-3 bg-100">
								<div class="text-uppercase fs--2 fw-bold">We Accept</div><img src="https://falconreact18.prium.me/static/media/icon-payment-methods-grid.68687164029e40e843d9.png" width="120" alt="card payment options"></div>
						</div>
					</div>
				
				
				<div class="border-dashed border-bottom my-5"></div>
				<div class="row">
					<!-- <div class="px-md-3 mb-xxl-0 position-relative col-xxl-7 col-xl-12 col-md-7">
						<div class="d-flex"><img src="https://falconreact18.prium.me/static/media/shield.80663a32ee894fbd73f8.png" alt="protection" width="60" height="60" class="me-3">
							<div class="flex-1">
								<h5 class="mb-2">Buyer Protection</h5>
								<div class="mb-0 form-check form-check">
									<input type="checkbox" id="full-refund" class="mb-0 form-check-input" checked="">
									<label for="full-refund" class="mb-0 form-check-label"><strong>Full Refund</strong> If you don't
										<br class="d-none d-md-block d-lg-none"> receive your order</label>
								</div>
								<div class="form-check form-check">
									<input type="checkbox" id="partial-refund" class="mb-0 form-check-input" checked="">
									<label for="partial-refund" class="mb-0 form-check-label"><strong>Full or Partial Refund,</strong> If the product is not as described in details</label>
								</div><a class="fs--1 ms-3 ps-2" href="/e-commerce/checkout#!">Learn More<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-right" class="svg-inline--fa fa-caret-right fa-w-6 ms-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512" style="transform-origin: 0.1875em 0.625em;"><g transform="translate(96 256)"><g transform="translate(0, 64)  scale(1, 1)  rotate(0 0 0)"><path fill="currentColor" d="M0 384.662V127.338c0-17.818 21.543-26.741 34.142-14.142l128.662 128.662c7.81 7.81 7.81 20.474 0 28.284L34.142 398.804C21.543 411.404 0 402.48 0 384.662z" transform="translate(-96 -256)"></path></g></g></svg></a></div>
						</div>
						<div class="vertical-line d-none d-md-block d-xl-none d-xxl-block"></div>
					</div> -->
					<div class="ps-xxl-5 text-center text-md-start text-xl-center  col-xxl-12 col-xl-12 col-md-5">
						<div class="border-dashed border-bottom d-block d-md-none d-xl-block d-xxl-none my-4"></div>
						<div class="fs-2 fw-semi-bold">All Total: <span class="text-primary grand-total">$0.00</span></div>
						<button type="submit" class="mt-3 px-5 btn btn-success pay-button">Confirm &amp; Pay</button>
						<p class="fs--1 mt-3 mb-0">By clicking <strong>Confirm &amp; Pay </strong> button you agree to the <a href="/e-commerce/checkout#!">Terms &amp; Conditions</a></p>
					</div>
					
				</div>
			</div>
		</div>
		</form>
	</div>
</div>
@endsection
@section('js')
<script src="https://js.stripe.com/v3/"></script>

@php
	$price = Cart::getTotal();
@endphp
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });	

   	let stripe = Stripe("{{ env('STRIPE_KEY') }}");
    let elements = stripe.elements();
    let style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    }
    let card = elements.create('card', {style: style});
    card.mount('#card-element');

    let paymentMethod = null
    $('.stripe-form').on('submit', function (e) {
        $('.pay-button').attr('disabled', true)
        if (paymentMethod) {
            return true
        }
        stripe.confirmCardSetup(
            "{{ $intent->client_secret }}",
            {
                payment_method: {
                    card: card,
                    billing_details: {name: $('.card_holder_name').val()}
                }
            }
        ).then(function (result) {
            if (result.error) {
                $('#card-errors').text(result.error.message)
                $('.pay-button').removeAttr('disabled')

            } else {

                paymentMethod = result.setupIntent.payment_method
                $('.payment-method').val(paymentMethod)
                $('.stripe-form').submit()
            }
        })
        return false
    });


$(document).ready(function () {

 		var state = $("input[name='clientAddress']:checked").attr('data-state');
        var country = $("input[name='clientAddress']:checked").attr('data-country');
        if(country == 'US'){
            $('.vat_state_tax').html('State Tax');
        }else{
            $('.vat_state_tax').html('VAT Tax');
        }
        tax_calculation_ajax(country,state);
});
$(document).on('change','input[type=radio][name=clientAddress]', function(){
        
        var state = $(this).attr('data-state');
        var country = $(this).attr('data-country');

        if(country == 'US'){
            $('.vat_state_tax').html('State Tax');
        }else{
            $('.vat_state_tax').html('VAT Tax');
        }
 		tax_calculation_ajax(country,state);
});

function tax_calculation_ajax(country,state){
		@php 
          $ShipTaxSet = ShippingTaxSettings();
        @endphp
        	$.ajax({
                url : '{{ route('get.tax.by.state') }}',
                type : 'POST',
                data: {country:country,state:state,_token:'{{ csrf_token() }}'},
                dataType: "json",
                success : function(data) {   
                  
                  if(country == 'CA'){
                      var cart_total = {{ $price }};
                      var ca_tax = data.tax;
                      var vat_tax = cart_total*ca_tax/100;
                      $('.shipping-vat-tax').html('$'+(vat_tax.toFixed(2)));
                      $('.shipping-tax').html('$'+({{ number_format($ShipTaxSet->ca_shipping ,2) }}));
                      var net_total =   cart_total+vat_tax+{{ $ShipTaxSet->ca_shipping }};
                      $('.grand-total').html('$' + net_total.toFixed(2));
                  }

                  if(country == 'US'){
                   
                      var cart_total = {{ $price }};
                      var us_tax = data.tax;
                      var vat_tax = cart_total*us_tax/100;
                      $('.shipping-vat-tax').html('$'+(vat_tax.toFixed(2)));
                      $('.shipping-tax').html('$'+({{ number_format($ShipTaxSet->usa_shipping , 2) }}));
                      var net_total =   cart_total+vat_tax+{{ $ShipTaxSet->usa_shipping }};
                      $('.grand-total').html('$' + net_total.toFixed(2));
                  }

                  if(country == 'AU'){
                      var cart_total = {{ $price }};
                      var au_tax = data.tax;
                      var vat_tax = cart_total*au_tax/100;
                      $('.shipping-vat-tax').html('$'+(vat_tax.toFixed(2)));
                      $('.shipping-tax').html('$'+({{number_format($ShipTaxSet->au_shipping , 2)}}));
                      var net_total =   cart_total+vat_tax+{{ $ShipTaxSet->au_shipping }};
                      $('.grand-total').html('$' + net_total.toFixed(2));
                  }

                  if(country == 'NZ'){
                    var cart_total = {{ $price }};
                    var nz_tax = data.tax;
                    var vat_tax = cart_total*nz_tax/100;
                    $('.shipping-vat-tax').html('$'+(vat_tax.toFixed(2)));
                    $('.shipping-tax').html('$'+({{ number_format($ShipTaxSet->nz_shipping , 2) }}));
                    var net_total =   cart_total+vat_tax+{{ $ShipTaxSet->nz_shipping }};
                    $('.grand-total').html('$' + net_total.toFixed(2));
                }


                  if(country == 'GB'){
                      var cart_total = {{ $price }};
                      var uk_tax = data.tax;
                      var vat_tax = cart_total*uk_tax/100;
                      $('.shipping-vat-tax').html('$'+(vat_tax.toFixed(2)));
                      $('.shipping-tax').html('$'+({{ number_format($ShipTaxSet->uk_shipping , 2) }}));
                      var net_total =   cart_total+vat_tax+{{ $ShipTaxSet->uk_shipping }};
                      
                      $('.grand-total').html('$' + net_total.toFixed(2));
                      
                  }

                  if(country == 'PH'){
                      var cart_total = {{ $price }};
                      var ph_tax = data.tax;
                      var vat_tax = cart_total*ph_tax/100;
                      $('.shipping-vat-tax').html('$'+(vat_tax.toFixed(2)));
                      $('.shipping-tax').html('$'+({{ number_format($ShipTaxSet->ph_shipping , 2) }}));
                      var net_total =   cart_total+vat_tax+{{ $ShipTaxSet->ph_shipping }};
                      $('.grand-total').html('$' + net_total.toFixed(2));
                  }
 

                },
                error : function(request,error)
                {
                    console.log(error);
                }
            });
        }
</script>
@endsection