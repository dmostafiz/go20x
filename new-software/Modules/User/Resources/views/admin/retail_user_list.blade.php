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

.icon-email {
    background-color: #777 !important;
    color: white;
    font-size: 13px;
    padding: 3.5px 6px;
    border-radius: 3px;
}

</style>

@endsection

@section('content')

 
  <div class="row justify-content-center">
            
  <div class="col-md-12 mt-3">
 
        <div class="card b-radius--10">
            
            <div class="card-body p-0">
                <div class="card">
                    <div class="card-header">
                        <h4>Retail Users</h4>
                        <div style="text-align: end;margin-bottom: 10px;"> 
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive--sm table-responsive">
                    <table role="table" class="fs--1 mb-0 overflow-hidden table table-striped table-bordered">
                            <thead class="bg-200 text-900 text-nowrap align-middle">
                                <tr>
                                    <th>#ID</th>
                                    <th class="text-left">Name</th>
                                    <th class="text-left">Email</th>
                                    <th>Register Date</th>
                                    <th>Mail</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>

                                @if(isset($all_users) && count($all_users) > 0)

                                  @foreach($all_users as $user)
                                  
                                    
                                    
                                  <tr>
                                      <td>#{{ $user->id }}</td>
                                      <td class="text-left">
                                        {{ $user->name }}
                                      </td>
                                      <td class="text-left" >{{ $user->email }}</td>
                                      <td class="text-left" >{{ $user->created_at }}</td>

                                       <td class="text-center">
                                        <a href="{{ url('admin/user/send-email').'/'.$user->id }}" class="icon-email mr-2 text-center" data-toggle="tooltip" title="" data-original-title="Send Mail">
                                        <i class="fa fa-envelope text--shadow"></i>
                                        </a>
                                      </td>
                                       
                                       
                                      <td class="text-left">
                                             
                                          <a href="{{ url('admin/userDetail').'/'.$user->id }}"  class="icon-btn bg-info ml-1" data-toggle="tooltip" title="" data-original-title="View Detail" style="margin-left:3px;">
                                            <i class="fa fa-eye"></i>
                                            </a>

                                              <a href="{{ url('admin/users/delete/').'/'.$user->id  }}" style="margin-left: 8px;padding: 4px;" class="icon-btn mr-2" data-toggle="tooltip" title="" data-original-title="Delete" onclick="return confirm('Are you sure you want to delete this user?');">
                                            <i class="fa fa-trash text-shadow"></i>
                                            </a>
                                      </td>
                                  </tr>

                                  @endforeach

                                  @else
                                 {{--  <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                  </tr> --}}
                                @endif
                                
                              </tbody>
                        </table>

                        <div class="d-flex justify-content-center align-items-center">
                                 @if(isset($subscriptions) && count($subscriptions) > 0)
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

<script src="https://malsup.github.io/jquery.form.js"></script> 

 
  <script src="{{ asset('/assets/js/datepicker.min.js') }}"></script>
  <script src="{{ asset('/assets/js/datepicker.en.js') }}"></script>
    <script src="https://malsup.github.io/jquery.form.js"></script> 

    <script>
         (function($){
        "use strict";
        if(!$('.datepicker-here').val()){
            $('.datepicker-here').datepicker();
            }
        })(jQuery); 
    </script>


@endsection