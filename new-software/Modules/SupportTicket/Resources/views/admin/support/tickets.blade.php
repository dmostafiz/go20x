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
.order_no_ref,
.copy_icon_fa {
    cursor: pointer;
}

.order_no_ref, .copy_icon_fa {
    cursor: pointer;
}
.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}
</style>
 
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
                                    <th style="width: 30px;">Ticket Number</th>
                                    <th class="text-left">Subject</th>
                                    <th class="text-left">Submitted By</th>
                                    <th>Status</th>
                                    <th>Priority</th>
                                    <th>Last Reply</th>
                                    <th>Action</th>
                                     
                                </tr>
                            </thead>
                            <tbody>

                            @if(isset($items) && count($items) > 0)
                            @foreach($items as $item)
                             
                                <tr>
                                    <td data-label="@lang('Subject')" class="order_no_ref">
                                {{ $item->ticket }}  
                               
                                <i class="fa fa-copy fa-lg copy_icon_fa" data-ref="{{ $item->ticket }} " style="margin-left: 7px;"></i> 

                                 <div class="copied copied-success" style="display: none;"><span>Copied!</span></div>
 
                            </td>
                                    <td data-label="@lang('Subject')">
                                        <a href="{{ url('admin.ticket.view', $item->id) }}" class="font-weight-bold"> [@lang('Ticket')#{{ $item->ticket }}] {{ $item->subject }} </a>
                                    </td>

                                    <td data-label="@lang('Submitted By')">

                                        @if($item->user_id)
                                        <a href="{{ url('admin.users.detail', $item->user_id)}}"> {{$item->name}}</a>
                                        @else
                                            <p class="font-weight-bold"> {{$item->name}}</p>
                                        @endif
                                    </td>
                                    <td data-label="@lang('Status')">
                                        @if($item->status == 0)
                                            <span class="badge badge--success">@lang('Open')</span>
                                        @elseif($item->status == 1)
                                            <span class="badge  badge--primary">@lang('Answered')</span>
                                        @elseif($item->status == 2)
                                            <span class="badge badge--warning">@lang('Customer Reply')</span>
                                        @elseif($item->status == 3)
                                            <span class="badge badge--dark">@lang('Closed')</span>
                                        @endif
                                    </td>
                                    <td data-label="@lang('Priority')">
                                        @if($item->priority == 1)
                                            <span class="badge badge--dark">@lang('Low')</span>
                                        @elseif($item->priority == 2)
                                            <span class="badge  badge--warning">@lang('Medium')</span>
                                        @elseif($item->priority == 3)
                                            <span class="badge badge--danger">@lang('High')</span>
                                        @endif
                                    </td>

                                    <td data-label="@lang('Last Reply')">
                                        {{ diffForHumans($item->last_reply) }}
                                    </td>

                                    <td data-label="@lang('Action')">
                                        <a href="{{ url('admin.ticket.view', $item->id) }}" class="icon-btn  ml-1" data-toggle="tooltip" title="" data-original-title="@lang('Details')">
                                            <i class="fa fa-desktop"></i>
                                        </a>
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
                                 @if(count($items) > 0)
                                    {{ $items->links('pagination::bootstrap-4') }}  
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
  
<script>
    $(document).on('click','.copy_icon_fa',function(){
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(this).attr('data-ref')).select();
        document.execCommand("copy");
        $temp.remove();
        console.log($(this).parent());
        $(this).parent().find('.copied-success').fadeIn(100);
        $(this).parent().find('.copied-success').fadeOut(700);  
    });
 </script>
 
@endsection