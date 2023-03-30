@extends('site-layouts.master')


@section('content')

<div class="card">
	<div class="card-header">
		<div class="justify-content-between row">
			<div class="col-md-auto">
				<h5 class="mb-3 mb-md-0">Shopping Cart ({{count(\Cart::getContent())}} Items)</h5></div>
			<div class="col-md-auto">
				<a role="button" tabindex="0" href="{{url('user/products')}}" class="border-300 me-2 btn btn-outline-secondary btn-sm">
					<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" class="svg-inline--fa fa-chevron-left fa-w-10 me-1 me-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" style="transform-origin: 0.3125em 0.5em;">
						<g transform="translate(160 256)">
							<g transform="translate(0, 0)  scale(0.75, 0.75)  rotate(0 0 0)">
								<path fill="currentColor" d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z" transform="translate(-160 -256)"></path>
							</g>
						</g>
					</svg>Continue Shopping</a><a role="button" tabindex="0" href="{{route('checkout.index')}}" class="btn btn-primary btn-sm">Checkout</a></div>
		</div>
	</div>
	<div class="p-0 card-body">
		@if(count($cartItems) > 0 )
		<div class="gx-card mx-0 bg-200 text-900 fs--1 fw-semi-bold row">
			<div class="py-2 col-md-8 col-9">Name</div>
			<div class="col-md-4 col-3">
				<div class="row">
					<div class="py-2 d-none d-md-block text-center col-md-8">Quantity</div>
					<div class="text-end py-2 col-md-4 col-12">Price</div>
				</div>
			</div>
		</div>
		
		@foreach($cartItems as $item)
		<div class="gx-card mx-0 align-items-center border-bottom border-200 row">
			<div class="py-3 col-8">
				<div class="d-flex align-items-center">
					<a href="#"><img src="{{ $item->attributes->image }}" width="60" alt="Canon Standard Zoom Lens" class="img-fluid rounded-1 me-3 d-none d-md-block"></a>
					<div class="flex-1">
						<h5 class="fs-0"><a class="text-900" href="#">{{ $item->name }}</a></h5>
						<div class="fs--2 fs-md--1">
							<form action="{{ route('bucket.remove') }}" method="POST">
                                  @csrf
                                  <input type="hidden" value="{{ $item->id }}" name="id">
                                  <button type="submit" class="text-danger fs--2 fs-md--1 fw-normal p-0 btn btn-link btn-sm">Remove</button>
                              </form>
							
						</div>
					</div>
				</div>
			</div>
			<div class="py-3 col-4">
				<div class="align-items-center row">
					<div class="d-flex justify-content-end justify-content-md-center col-md-8 order-md-0 order-1">
						<div>
							<div class="input-group input-group-sm">
								<button type="button"  class="px-2 border-300 btn btn-outline-secondary btn-sm minus" data-id="{{$item->id}}" data-price="{{$item->price}}">-</button>
								<input min="1" type="number" class="text-center px-2 input-spin-none form-control value" value="{{ $item->quantity}}" style="width: 50px;" readonly="">
								<button type="button"  class="px-2 border-300 btn btn-outline-secondary btn-sm plus" data-id="{{$item->id}}" data-price="{{$item->price}}">+</button>
							</div>
						</div>
					</div>
					<div class="text-end ps-0 mb-2 mb-md-0 text-600 col-md-4 order-md-1 order-0 quantity_amount">${{ $item->price *  $item->quantity}}</div>
				</div>
			</div>
		</div>
		@endforeach
		
		<div class="fw-bold gx-card mx-0 row">
			<div class="py-2 text-end text-900 col-md-8 col-9">Total</div>
			<div class="px-0 col">
				<div class="gx-card mx-0 row">
					<div class="py-2 d-none d-md-block text-center col-md-7">{{count(\Cart::getContent())}} (items)</div>
					<div class="text-end py-2 text-nowrap px-x1 col-md-5 col-12 total_cart_amount">${{ Cart::getTotal() }}</div>
				</div>
			</div>
		</div>
		@else
		<h5 class="mb-3 text-center mt-3">Your Cart is empty.</h5>
		@endif
	</div>
	<div class="bg-light d-flex justify-content-end card-footer">
		<!-- <form class="me-3">
			<div class="input-group input-group-sm">
				<input placeholder="GET50" type="text" class="form-control" value="">
				<button type="submit" class="border-300 btn btn-outline-secondary btn-sm">Apply</button>
			</div>
		</form> --><a role="button" tabindex="0" href="{{route('checkout.index')}}" class="btn btn-primary btn-sm">Checkout</a></div>
</div>
@endsection
@section('js')

<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function() {
  $('.plus').click(function() {
  	var update = $(this).prev('input');
  	var currentValue = update.val();
    currentValue++;
    update.val(currentValue);
    var price = $(this).attr('data-price');
    var id = $(this).attr('data-id');
    price =  currentValue * price;
    var parent = $(this).closest('.row').find('.quantity_amount');
    parent.html('$'+price);
    //var sum = 0;
	// $('.quantity_amount').each(function(){
	// 	var sd = $(this).text().replace(/[^0-9]/gi, ''); 
	// 	sum += parseInt(sd, 10); 
	// });
	//$('.total_cart_amount').html('$'+sum);

	$.ajax({
	   type:'POST',
	   url:"{{ route('bucket.update') }}",
	   data:{quantity:currentValue, id:id,},
	   success:function(data){
	     if (data.success) {
	     	$('.total_cart_amount').html('$'+data.total);
	     }
	   }
	});

  });
  $('.minus').click(function() {
  	var update = $(this).next('input');
  	var currentValue = update.val();
    if (currentValue > 1) {
      currentValue--;
      update.val(currentValue);
    }
    var price = $(this).attr('data-price');
    var id = $(this).attr('data-id');
    price =  currentValue * price;
    var parent = $(this).closest('.row').find('.quantity_amount');
    parent.html('$'+price);
 	//    var sum = 0;
	// $('.quantity_amount').each(function(){
	// 	var sd = $(this).text().replace(/[^0-9]/gi, ''); 
	// 	sum += parseInt(sd, 10); 
	// });
	// $('.total_cart_amount').html('$'+sum);
	$.ajax({
	   type:'POST',
	   url:"{{ route('bucket.update') }}",
	   data:{quantity:currentValue, id:id,},
	   success:function(data){
	     if (data.success) {
	     	$('.total_cart_amount').html('$'+data.total);
	     }
	   }
	});
	

  });
});
</script>
@endsection