@extends('site-layouts.master')

@section('content')
<div class="mb-3 card">
	<div class="card-header">
		<div class="align-items-end g-2 row">
			<div class="col">
				<div class="d-flex">
					<h5 class="mb-0 hover-actions-trigger" id="example">Add Shipping Address</h5></div>
			</div>
			{{-- <div class="col-auto">
				<div class="row">
					<div class="col">
						<div class="nav-pills-falcon m-0 nav card-header-pills nav-pills" role="tablist">
							<div class="nav-item">
								<button type="button" role="tab" data-rr-ui-event-key="preview" id="react-aria6333640756-47-tab-preview" aria-controls="react-aria6333640756-47-tabpane-preview" aria-selected="true" class="nav-link active btn btn-primary btn-sm" fdprocessedid="xmmagt">Preview</button>
							</div>
							<div class="nav-item">
								<button type="button" role="tab" data-rr-ui-event-key="code" id="react-aria6333640756-47-tab-code" aria-controls="react-aria6333640756-47-tabpane-code" aria-selected="false" tabindex="-1" class="nav-link btn btn-primary btn-sm">Code</button>
							</div>
						</div>
					</div>
				</div>
			</div> --}}
		</div>
	</div>
	<div class="bg-light card-body">
				<form class="" action="{{route('store.shipping')}}" method="post">
				@csrf
				<div class="gx-2 gy-3 row">
					<div class="col-md-6">
						<div>
							<label class="form-label" for="firstname">First Name</label>
							<input placeholder="First Name" name="fname" type="text" id="firstname" class="form-control @error('fname') is-invalid @enderror">
						</div>
						@if ($errors->has('fname'))
							<span class="invalid-feedback d-block" role="alert">
                					<strong>{{ $errors->first('fname') }}</strong>
            				</span>
                        @endif
					</div>
					<div class="col-md-6">
						<div>
							<label class="form-label" for="last_name">Last Name</label>
							<input placeholder="Last Name" name="lname" type="text" id="last_name" class="form-control @error('lname') is-invalid @enderror" >
						</div>
						@if ($errors->has('lname'))
							<span class="invalid-feedback d-block" role="alert">
                					<strong>{{ $errors->first('lname') }}</strong>
            				</span>
                        @endif
					</div>
					
					<div class="col-md-12">
						<div>
							<label class="form-label" for="address">Address</label>
							<input placeholder="Street" name="street" type="text" id="address" class="form-control @error('street') is-invalid @enderror" >
						</div>
						@if ($errors->has('street'))
							<span class="invalid-feedback d-block" role="alert">
                					<strong>{{ $errors->first('street') }}</strong>
            				</span>
                        @endif
					</div>

					<div class="col-md-12">
						<div>
							<label class="form-label" for="street2">Address(Optional)</label>
							<input placeholder="Apartment, house number, suite, etc. (optional)" name="street2" type="text" id="street2" class="form-control" >
						</div>
					</div>
					<div class="col-md-12">
						<div>
							<label class="form-label" for="country">Country</label>
							<select aria-label="Default select example" name="country" class="form-select @error('country') is-invalid @enderror" id="country" >
								<option value="">Select a Country...</option>
								@foreach($countries as $country)
                                    @php $country = json_decode(json_encode($country), TRUE);  @endphp
                                    <option  value="{{ $country['iso2']}}"

                                    {{-- old('country') == $country['iso2'] ? "selected" : "" --}}

                                    >{{ $country['name']}}</option>
                                @endforeach
							</select>

						</div>
						@if ($errors->has('country'))
							<span class="invalid-feedback d-block" role="alert">
                					<strong>{{ $errors->first('country') }}</strong>
            				</span>
                        @endif
					</div>
					<div class="col-md-4">
						<div>
							<label class="form-label" for="city">City</label>
							<input placeholder="City" name="city" type="text" id="city" class="form-control 
							@error('city') is-invalid @enderror" >
						</div>
						@if ($errors->has('city'))
							<span class="invalid-feedback d-block" role="alert">
                					<strong>{{ $errors->first('city') }}</strong>
            				</span>
                        @endif
					</div>
					<div class="col-md-4">
						<div>
							<label class="form-label" for="state">State</label>
							<select  name="state" id="state" aria-label="Select a state" data-placeholder="Select a state..." class="form-select @error('state') is-invalid @enderror">
                                    <option value="">Select a State...</option>

                            </select>
						</div>
						@if ($errors->has('state'))
							<span class="invalid-feedback d-block" role="alert">
                					<strong>{{ $errors->first('state') }}</strong>
            				</span>
                        @endif
					</div>
					<div class="col-md-4">
						<div>
							<label class="form-label" for="zipcode">Zipcode</label>
							<input placeholder="Zipcode" name="zipcode" type="text" id="zipcode" class="form-control @error('zipcode') is-invalid @enderror">
						</div>
						@if ($errors->has('zipcode'))
							<span class="invalid-feedback d-block" role="alert">
                					<strong>{{ $errors->first('zipcode') }}</strong>
            				</span>
                        @endif
					</div>
					<div class="col-md-12 mb-3">
						<div>
							<label class="form-label" for="phone">Phone Number</label>
							<input placeholder="Phone Number" name="phone" type="text" id="phone" class="form-control @error('phone') is-invalid @enderror">
						</div>
						@if ($errors->has('phone'))
							<span class="invalid-feedback d-block" role="alert">
                					<strong>{{ $errors->first('phone') }}</strong>
            				</span>
                        @endif
					</div>
				</div>
				<div class="text-end">
						<button type="submit" class="btn btn-primary" fdprocessedid="t2coi8">Submit</button>
				</div>
				</form>
			</div>
</div>
@endsection
@section('js')
<script type="text/javascript">

	 function getStates(country_id){
      
        jQuery.ajax({
          url: "{{ url('shippingaddress/getStates') }}/"+country_id,
          method: 'get',
          success: function(result){
            $('#state').html(result);
        }
      });
        
    } 
	$(document).on('change','#country', function(){

        @php 
          $ShipTaxSet = ShippingTaxSettings();
        @endphp
 
        
        if($(this).val() == 'CA'){
            $('#state').html('');
            getStates($(this).val());
        }

        if($(this).val() == 'US'){
            $('#state').html('');
            getStates($(this).val());
        }

        if($(this).val() == 'AU'){
            $('#state').html('');
            getStates($(this).val());
        }

        if($(this).val() == 'NZ'){
            $('#state').html('');
            getStates($(this).val());
        }

        if($(this).val() == 'GB'){
            $('#state').html('');
            getStates($(this).val());
        }

        if($(this).val() == 'PH'){
            $('#state').html('');
            getStates($(this).val());
        }

        if($(this).val() == 'US'){
            $('.vat_state_tax').html('State Tax');
        }else{
            $('.vat_state_tax').html('VAT Tax');
        }


    });
</script>
@endsection