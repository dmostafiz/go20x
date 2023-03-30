@extends('site-layouts.master')


@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/datepicker.min.css') }}">
<style>

.datepicker{
    z-index: 9999 !important;
}

.accordion .card .card-head{
    padding: 6px 6px 6px 23px;
    background-color: #7367f0;
}
.accordion .card {
  border: none;
  margin-bottom: 20px;
}
.accordion .card h6 {
  background: url({{url('/images/down.png')}}) no-repeat calc(100% - 10px) center;
  background-size: 20px;
  cursor: pointer;
  font-size: 14px;
}
.accordion .card h6.collapsed {
  background-image: url({{url('/images/up.png')}});
}
.card{
       width: 99%;
}
 .datepicker{
        z-index: 9999 !important;
    }

  #image-preview{
    margin: auto;
    text-align: center;
    object-fit: cover;
    width: 30%;
    margin-top: 20px;
    margin-bottom: 20px;
}
.label-upload{
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
img[src=""]{
    display: none;
}
.bg--success{
    background-color: #28c76f !important;
}

.label-upload{
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

.icon-email{
     
    background-color: #777 !important;
    color: white;
    font-size: 13px;
    padding: 3.5px 6px;
    border-radius: 3px;
}

.badge--danger{
    background-color: rgba(234, 84, 85, 0.1);
    border: 1px solid #ea5455;
    color: #ea5455;
}

.badge--success {
    background-color: rgba(40, 199, 111, 0.1);
    border: 1px solid #28c76f;
    color: #28c76f;
}

 
.accordion .card .card-head{
    padding: 6px 6px 6px 23px;
    background-color: #7367f0;
}
.accordion .card {
  border: none;
  margin-bottom: 20px;
}
.accordion .card h6 {
  background: url({{url('/images/down.png')}}) no-repeat calc(100% - 10px) center;
  background-size: 20px;
  cursor: pointer;
  font-size: 14px;
}
.accordion .card h6.collapsed {
  background-image: url({{url('/images/up.png')}});
}
.card{
       width: 99%;
}

/*.nicEdit-button{
    background-image: none !important;
}
*/
</style>

@endsection

@section('content')

 
  <div class="row justify-content-center">
            
  <div class="col-md-12 mt-3">

    
         
        <div class="card b-radius--10"> 
             
            
            <div class="card-body p-0">

                <h5 class="mt-4 mb-4 ml-3" style="margin-left: 2%;"> {{ $pageTitle }}</h5>

                 <form action="{{ url('admin/user/email/allSend')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="font-weight-bold">@lang('Subject') <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="@lang('Email subject')" name="subject"  required/>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="font-weight-bold">@lang('Message') <span class="text-danger">*</span></label>
                                <textarea name="message" rows="10" id="nicEdit" class="form-control nicEdit"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="form-row">
                            <div class="form-group col-md-12 text-center" style="background-color: #777 !important;">
                                <button type="submit" class="btn btn-block   mr-2" style="width: 100%;color: white;">@lang('Send Email')</button>

                            </div>
                        </div>
                    </div>
                </form>
                
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
 
 
  <script src="{{ asset('/assets/js/nicEdit.js') }}"></script>
  
   <script>
       
          "use strict";
    bkLib.onDomLoaded(function() {
        $( ".nicEdit" ).each(function( index ) {
            $(this).attr("id","nicEditor"+index);
            new nicEditor({fullPanel : true}).panelInstance('nicEditor'+index,{hasPanel : true});
        });
    });
    (function($){
        $( document ).on('mouseover ', '.nicEdit-main,.nicEdit-panelContain',function(){
            $('.nicEdit-main').focus();
        });
    })(jQuery);

   </script>

@endsection