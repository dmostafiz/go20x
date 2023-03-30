@extends('site-layouts.master')

@section('content')
<style>
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
    margin-left: 8px;
    background-color: #777 !important;
    color: white;
    font-size: 13px;
    padding: 2.5px 7px;
    border-radius: 3px;
}
</style>
  <div class="card">
      <div class="card-header">
        <h4>Zoom</h4>
        <div style="text-align: end;margin-bottom: 10px;"> 
  
        <a class="btn btn-sm btn--primary box--shadow1 text--small" href="#" data-bs-toggle="modal" data-bs-target="#addMessage" >Add Zoom</a>

         
    </div>
      </div>
      <div class="card-body">
        <div class="simplebar-content" style="padding: 0px;">
  <table role="table" class="fs--1 mb-0 overflow-hidden table table-striped table-bordered">
    <thead class="bg-200 text-900 text-nowrap align-middle">
      <tr>
        <th colspan="1" role="columnheader" title="Toggle SortBy" style="cursor: pointer;">ID<span class="sort"></span></th>
        <th colspan="1" role="columnheader" title="Toggle SortBy" style="cursor: pointer;">Title<span class="sort"></span></th>
        <th colspan="1" role="columnheader" title="Toggle SortBy" style="cursor: pointer;">Link1<span class="sort"></span></th>
        <th colspan="1" role="columnheader" title="Toggle SortBy" style="cursor: pointer;">Link2<span class="sort"></span></th>
        <th colspan="1" role="columnheader" title="Toggle SortBy" style="cursor: pointer;">Code<span class="sort"></span></th>
        <th colspan="1" role="columnheader" title="Toggle SortBy" style="cursor: pointer;">Action<span class="sort"></span></th>
      </tr>


    </thead>
    <tbody>

      @foreach($items as $item)

      <tr class="align-middle white-space-nowrap" role="row">
        <td role="cell">
            {{$item->id}}
        </td>
        <td role="cell"> 
        {{$item->title}}
       </td>
        <td role="cell">
         <a target="_blank" href="{{$item->url1}}">Link1</a>
        </td>
        <td>
            <a target="_blank" href="{{$item->url2}}">Link2</a>
        </td>
        <td>
            {{$item->code}}
        </td>
        <td>
               
                                    <a href="{{ url('admin/del/zoom').'/'.$item->id }}" class="icon-btn mr-2" onclick="return confirm('Are you sure you want to delete this Zoom?');">
                                        <i class="fa fa-trash text--shadow"></i>
                                    </a>

                                    {{--   <a href="{{route('admin.del.zoom',$item->id) }}" class="icon-btn mr-2" onclick="return confirm('Are you sure you want to delete this Zoom?');">
                                        <i class="las la-trash text--shadow"></i>
                                    </a> --}}

                                    <a href="#" class="icon-btn" data-bs-toggle="modal" data-bs-target="#editMessage{{$item->id}}">
                                        <i class="fa fa-pen text--shadow" ></i>
                                    </a>

                                    <div class="modal fade" id="editMessage{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Zoom</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <div class="modal-body" style="text-align: initial;">

                                                <form action="{{url('admin/add-zoom')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$item->id}}">
                                                    <div class="form-group">
                                                        <label>Title</label>
                                                        <input type="text" name="title" class="form-control"  placeholder="Title" required="" value="{{$item->title}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Url-1</label>
                                                        <input type="text" name="url1" class="form-control"  placeholder="Url" required="" value="{{$item->url1}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Url-2</label>
                                                        <input type="text" name="url2" class="form-control"  placeholder="Url" required="" value="{{$item->url2}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Code</label>
                                                        <input type="text" name="code" class="form-control"  placeholder="Code" required="" value="{{$item->code}}">
                                                    </div>
                                                            
                                                    <button type="submit" class="create  btn btn-primary btn-large btn-block mt-4 text-white category-resource-btn">Update</button>
                                                </form>
                                              </div>
                                              
                                            </div>
                                          </div>
                                        </div>
                                     
        </td>
         
      </tr>
      <tr class="align-middle white-space-nowrap" role="row">
      
      @endforeach
      
      
    </tbody>
  </table>


</div>
      </div>
      <div class="card-footer">
    <div class="d-flex justify-content-center align-items-center">
          @if(count($items) > 0)

          {{ $items->links('pagination::bootstrap-4') }}
          @endif
    </div>
 
  </div>
  </div>


    
    <!-- Add resource Category Modal -->
    
 

       <div class="modal fade" id="addMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Zoom</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
   
           <form action="{{url('admin/add-zoom')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control"  placeholder="Title" required="">
                </div>
                <div class="form-group">
                    <label>Url-1</label>
                    <input type="text" name="url1" class="form-control"  placeholder="Url" required="">
                </div>
                <div class="form-group">
                    <label>Url-2</label>
                    <input type="text" name="url2" class="form-control"  placeholder="Url" required="">
                </div>
                <div class="form-group">
                    <label>Code</label>
                    <input type="text" name="code" class="form-control"  placeholder="Code" required="">
                </div>
                
                <button type="submit" class="create btn btn-primary btn-large btn-block mt-4 text-white category-resource-btn">Create</button>
            </form>
          </div>
          
        </div>
      </div>
    </div>
 
@endsection



@section('js')
<script src="https://malsup.github.io/jquery.form.js"></script> 

 
  <script src="{{ asset('assets/admin/js/vendor/datepicker.min.js') }}"></script>
  <script src="{{ asset('assets/admin/js/vendor/datepicker.en.js') }}"></script>
 
 
    
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