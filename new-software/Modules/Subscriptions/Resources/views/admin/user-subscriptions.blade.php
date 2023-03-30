@extends('site-layouts.master')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/datepicker.min.css') }}">
<style>

 .datepicker{
        z-index: 9999 !important;
    }

  #image-preview {
    margin: auto;
    text-align: center;
    object-fit: cover;
    width: 30%;
    margin-top: 20px;
    margin-bottom: 20px;
}
.label-upload {
    cursor: pointer;
    text-align: center;
    line-height: 45px;
    font-size: 18px;
    cursor: pointer;
    padding: 2px 25px;
    width: 100%;
    border-radius: 5px;
    transition: all 0.3s;
    margin-top: 10px;
    margin-bottom: 10px;
}    
#imgInp,
#pdfInp,
#videoInp {
   opacity: 0;
   position: absolute;
   z-index: -1;
}
img[src=""] {
    display: none;
}
.bg--success {
    background-color: #28c76f !important;
}
.label-upload {
    cursor: pointer;
    text-align: center;
    line-height: 45px;
    font-size: 18px;
    cursor: pointer;
    padding: 2px 25px;
    width: 100%;
    border-radius: 5px;
    transition: all 0.3s;
    margin-top: 10px;
    margin-bottom: 10px;
}

.create {
    background-color: #777 !important;
    border: none;
}
.icon-btn{
     
    background-color: #777 !important;
    color: white;
    font-size: 13px;
    padding: 4.5px 2px;
    border-radius: 3px;
}

.badge--danger {
    background-color: rgba(234, 84, 85, 0.1);
    border: 1px solid #ea5455;
    color: #ea5455;
}

.badge--success {
    background-color: rgba(40, 199, 111, 0.1);
    border: 1px solid #28c76f;
    color: #28c76f;
}
</style>
{{-- <style type="text/css">
.accordion .card .card-head{
    padding: 6px 6px 6px 23px;
    background-color: #7367f0;
}
.accordion .card {
  border: none;
  margin-bottom: 20px;
}
.accordion .card h6 {
  background: url({{asset('assets/admin/images/down.png')}}) no-repeat calc(100% - 10px) center;
  background-size: 20px;
  cursor: pointer;
  font-size: 14px;
}
.accordion .card h6.collapsed {
  background-image: url({{asset('assets/admin/images/up.png')}});
}
.card{
       width: 99%;
}
 
</style> --}}
  <div class="row justify-content-center">
            
  <div class="col-md-12">
         
        <div class="card b-radius--10">
            
            <div class="card-body p-0">
                <div class="card">
                    <div class="card-header">
                        <h4>Notification</h4>
                        <div style="text-align: end;margin-bottom: 10px;"> 
                        <a class="btn btn-sm btn--primary box--shadow1 text--small" href="#" data-bs-toggle="modal" data-bs-target="#addMessage" >Add Notification</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive--sm table-responsive">
                    <table role="table" class="fs--1 mb-0 overflow-hidden table table-striped table-bordered">
                            <thead class="bg-200 text-900 text-nowrap align-middle">
                                <tr>
                                    <th>Sr No</th>
                                    <th class="text-left">User</th>
                                    <th class="text-left">Product</th>
                                    <th>Start Date</th>
                                    <th>Next Delivery Date</th>
                                    <th>Payment Method</th>
                                    <th>Subscription ID</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if( count($subscriptions) > 0)
                                  @foreach($subscriptions as $key => $subcrp)
                                  
                                    @php 
                                        $orderDetails = getProductBySubscription($subcrp->stripe_subscription_id);
                                        $prod_names = '';
                                        if(count($orderDetails)>0){
                                            foreach ($orderDetails as $details) {

                                                $product = getProductById($details->product_id);
                                                if(!is_null($product)){
                                                    $prod_names .= $product->landmark_description.'<br>';
                                                }
                                                
                                            }
                                        }
                                    @endphp
                                    
                                  <tr>
                                      <td>#{{ $key+1 }}</td>
                                      <td class="text-left">

                                        @php 
                                          $user = getUserById($subcrp->user_id);
                                        @endphp

                                        @if(!is_null($user))
                                            <span class="font-weight-bold">{{$user->fullname}}</span>
                                            <br>
                                            <span class="small">
                                            <a href="{{-- route('admin.users.detail', $user->id) --}}"><span>@</span>{{ $user->username }}</a>
                                            </span>
                                        @endif
                                      </td>
                                      <td class="text-left" >{!! $prod_names !!}</td>
                                      <td>{{ \Carbon\Carbon::parse($subcrp->plan_period_start)->format('d M Y') }}</td>
                                      <td>{{ \Carbon\Carbon::parse($subcrp->plan_period_end)->format('d M Y') }}</td>
                                      <td>
                                        {{ ucfirst($subcrp->payment_method) }}
                                      </td>
                                      <td>
                                       <a href="https://dashboard.stripe.com/subscriptions/{{ $subcrp->stripe_subscription_id }}">
                                            {{ $subcrp->stripe_subscription_id }} 
                                        </a>
                                      </td>
                                      <td>
                                        <span class="badge @if($subcrp->status == 'active') badge--success @else badge--danger @endif ">{{ ucfirst($subcrp->status) }}</span>
                                      </td>
                                       <td>
                                          ${{ $subcrp->plan_amount }} USD every {{ $subcrp->plan_interval_count }} days
                                      </td>
                                      <td>
                                          @if($subcrp->status != 'cancelled' && $subcrp->status != 'canceled')

                                              @if($subcrp->payment_method == 'stripe')
                                                  <a href="{{-- route('admin.cancel.subscription',$subcrp->stripe_subscription_id) --}}" onclick="return confirm('Are you sure you want to cancel this subscription?\nThis will also cancel subscription from stripe.');" class="icon-btn bg-danger ml-1" data-toggle="tooltip" title="" data-original-title="Cancel">
                                                  <i class="fa fa-trash"></i>
                                                  </a>
                                                  <a href="{{-- route('admin.subscription.single.detail',$subcrp->id) --}}"  class="icon-btn bg-info ml-1" data-toggle="tooltip" title="" data-original-title="View Detail" style="margin-left:3px;">
                                                    <i class="fa fa-eye"></i>
                                                    </a>
                                              @else
                                                 <a href="{{-- route('admin.cancel.subscription.wallet',$subcrp->id) --}}" onclick="return confirm('Are you sure you want to cancel this subscription?');" class="icon-btn bg-danger ml-1" data-toggle="tooltip" title="" data-original-title="Cancel">
                                                  <i class="la la-trash"></i>
                                                  </a>
                                                  
                                              @endif
                                          
                                          @endif
                                      </td>
                                  </tr>

                                  @endforeach

                                  @else
                                  <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                  </tr>
                                @endif
                                
                              </tbody>
                        </table>

                        <div class="d-flex justify-content-center align-items-center">
                                 @if(count($subscriptions) > 0)
                                    {{ $subscriptions->links('pagination::bootstrap-4') }}  
                                @endif
                            </div>
                    </div>


                    </div>
                    {{-- <div class="card-footer">
                            
                        </div> --}}
                    </div>
                </div>
                
                    <br><br>

                    <div class="card-footer py-4">
                   {{--    {{ paginateLinks($subscriptions) }} --}}
                  </div>

                </div>   
            </div>
            
        </div>
    </div>
    
 
@endsection



@section('js')

<script src="{{ asset('assets/admin/js/vendor/datepicker.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/vendor/datepicker.en.js') }}"></script>


<script>
    (function($){
        'use strict';
        if(!$('.datepicker-here').val()){
            $('.datepicker-here').datepicker();
        }
    })(jQuery);

    function toggle(source) {
      checkboxes = jQuery('.check-single');
      for(var i=0, n=checkboxes.length;i<n;i++) {
        checkboxes[i].checked = source.checked;
      }
      if(jQuery('.check-single:checked').length > 0){
           jQuery('.aprov-select-btn').removeClass('d-none');
      }
    }

    $(document).on('change','.check-single',function(){
        if(jQuery('.check-single:checked').length > 0){
           jQuery('.aprov-select-btn').removeClass('d-none');
        }
    }); 
  
    $(document).on('click','.aprov-select-btn',function(){
        var data = new Array();
        $(".check-single:checked").each(function(i) {
            data.push($(this).val());
        });

        $.ajax({
            type:'get',
            url:'{{-- route('admin.payout.bulk.approve.payout') --}}',
            data: { ids:data },
            success: function(data){
                location.reload();
            }
        });
       
    }); 

</script>
 
@endsection