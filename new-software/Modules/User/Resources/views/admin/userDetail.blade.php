@extends('site-layouts.master')

@section('content')

@section('css')
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

.badge--success {
    background-color: rgba(40, 199, 111, 0.1);
    border: 1px solid #28c76f;
    color: #28c76f;
    padding: 4px;
    border-radius: 7px;
}
</style>
 @endsection
  <div class="row justify-content-center">
            
  <div class="col-md-12">
         
        <div class="card b-radius--10">
            
            <div class="card-body p-0">
                <div class="card">
                    <div class="card-header">
                        <h4>Orders</h4>
                         
                    </div>
                    <div class="card-body">
                        <div class="table-responsive--sm table-responsive">
                    <table role="table" class="fs--1 mb-0 overflow-hidden table table-striped table-bordered">
                            <thead class="bg-200 text-900 text-nowrap align-middle">
                                <tr>
                                    <th>ID</th>
                                    <th class="text-left">Name</th>
                                    <th class="text-left">city</th>
                                    <th class="text-left">state</th>
                                    <th class="text-left">zipcode</th>
                                    <th class="text-left">phone</th>
                                    <th class="text-left">shipping_charges</th>
                                    <th class="text-left">vat_tax</th>
                                    <th class="text-left">order_total</th>
                                    <th class="text-left">status</th>
                                    <th class="text-left">Action</th>
                               
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>



                                @if(isset($users_detail))

                                    @php
                                        $get_orders  = get_orders($users_detail->id);
                                        
                                    @endphp
                                    @if(isset($get_orders) && count($get_orders) > 0)
                                    @foreach($get_orders as $get_orders_single)
                                  <tr>
                                      <td>{{ $get_orders_single->id }}</td>
                                      <td>{{ $get_orders_single->name }}</td>
                                      
                                      <td class="text-left" >{{ $get_orders_single->city }}</td>
                                      <td class="text-left" >{{ $get_orders_single->state }}</td>
                                      <td class="text-left" >{{ $get_orders_single->zipcode }}</td>
                                      <td class="text-left" >{{ $get_orders_single->phone }}</td>
                                      <td class="text-left" >{{ $get_orders_single->shipping_charges }}</td>
                                      <td class="text-left" >${{ $get_orders_single->vat_tax }}</td>
                                      <td class="text-left" >${{ $get_orders_single->order_total }}</td>
                                      <td class="text-center" >
                                        <span class="badge--success">${{ $get_orders_single->status }}</span>
                                    </td>
                                       
                                    <td>
                                        <a href="{{ url('admin/user/order-detail').'/'.$get_orders_single->id }}" class="icon-btn mr-2" data-toggle="tooltip" title="" data-original-title="Details">
                                        <i class="fa fa-desktop text--shadow"></i>
                                    </a>
                                    </td>
                                       
                                      
                                  </tr>

                                   @endforeach
                                   @endif
                                  @else
                                 {{--  <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                  </tr> --}}
                                @endif
                                
                              </tbody>
                        </table>

                        
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