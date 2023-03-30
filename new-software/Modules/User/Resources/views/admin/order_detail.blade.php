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

.border-top {
    border-top: var(--falcon-border-width) var(--falcon-border-style) var(--falcon-border-color)!important;
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

.status{
        color: var(--falcon-badge-soft-success-color);
    background-color: var(--falcon-badge-soft-success-background-color);
    padding: 5px 9px;
    border-radius: 13px;
        font-size: .6944444444rem!important;
}

</style>
 @endsection
  <div class="row justify-content-center">
            
  <div class="col-md-12">
         
        <div class="card b-radius--10">

        <div class="card-header">

            <h5>Order Detail #{{ $order->id }}</h5>
            <p style="font-size: .8333333333rem!important;"> {{  date('M ,d ,Y  h:i A', strtotime($order->created_at)) }}</p>

                <div>
                       <strong class="me-2">Status: </strong> <span class="status">{{ $order->status }} <i class="fa fa-check" aria-hidden="true"></i></span>
                </div>
                       
        </div>
     </div>
            

                 
    </div>   


     <div class="col-md-12 mt-4">

         <div class="card">

            <div class="card-header">
                <div class="row">
                <div class="col-md-4">
                    <h5>Shipping Address</h5>
                    <p class="mt-2" style="font-size: .8333333333rem!important;">{{ $order->street1 }}</p>
                </div>

                <div class="col-md-4">
                    <h5>Payment Method</h5>
                    <p class="mt-2" style="font-size: .8333333333rem!important;">Stripe</p>
                </div>
                </div>
                   
            </div>

            
    </div> 

</div>



 <div class="col-md-12 mt-4">

         <div class="card">

            <div class="card-header">

        <table role="table" class="fs--1 mb-0 overflow-hidden table table-striped table-bordered">
        <thead class="bg-200 text-900 text-nowrap align-middle">
        <tr>
        <th colspan="1" role="columnheader" title="Toggle SortBy" style="cursor: pointer;">Products<span class="sort"></span></th>
        <th colspan="1" role="columnheader" title="Toggle SortBy" style="cursor: pointer;">Quantity<span class="sort"></span></th>
        
        <th colspan="1" role="columnheader" title="Toggle SortBy" style="cursor: pointer;">Amount<span class="sort"></span></th>
        </tr>


        </thead>
        <tbody>

        @if(isset($order_detail))

        @foreach($order_detail as $item)


        @php
   
           $product = get_product_single($item->product_id);
            
        @endphp

        <tr class="align-middle white-space-nowrap" role="row">
        <td role="cell"> {{ $product->product_name }} </td>
        <td> {{ $item->quantity }} </td>

        <td>{{ $item->amount }}</td>
            
        </tr>
        <tr class="align-middle white-space-nowrap" role="row">

        @endforeach
        @endif

        </tbody>
        </table>
                   
            </div>
 
            
             <div class="card-footer">
                    @php
                    $total_aamount =  $order->order_total;
                    $vat_tax =  $order->vat_tax;
                    $shipping_charges =  $order->shipping_charges;
                    $subtotal =  $total_aamount - $vat_tax - $shipping_charges;

                    @endphp
                     <div style="text-align: end;margin-bottom: 10px;"> 
                            <p>Subtotal:  ${{ $subtotal  }}</p>
                            <p>Vat tax:  ${{ $vat_tax  }}</p>
                            <p>Shipping Charges:  ${{ $shipping_charges  }}</p>
                            <p class="border-top">Total:  ${{ $total_aamount  }} </p>
                     </div>
             </div>
         

            
    </div> 

</div>
    
    
 
@endsection



@section('js')
 
 
@endsection