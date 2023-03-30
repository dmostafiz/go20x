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

.upload-resource-btn {
    background-color: #777 !important;
    border: none;
}
</style>
  <div class="card">
      <div class="card-header">
           <div style="text-align: end;margin-bottom: 10px;"> 
        <a class="btn btn-sm btn--primary box--shadow1 text--small" href="#" data-bs-toggle="modal" data-bs-target="#addResource" >Add Resource</a>


          <a class="btn btn-sm btn--primary box--shadow1 text--small" href="#" data-bs-toggle="modal" data-bs-target="#addResourceCategory" >Add Category</a>

         
    </div>
      </div>
      <div class="card-body">
        <div class="simplebar-content" style="padding: 0px;">
  <table role="table" class="fs--1 mb-0 overflow-hidden table table-striped table-bordered">
    <thead class="bg-200 text-900 text-nowrap align-middle">
      <tr>
        <th colspan="1" role="columnheader" title="Toggle SortBy" style="cursor: pointer;">File<span class="sort"></span></th>
        <th colspan="1" role="columnheader" title="Toggle SortBy" style="cursor: pointer;">Name<span class="sort"></span></th>
        <th colspan="1" role="columnheader" title="Toggle SortBy" style="cursor: pointer;">Action<span class="sort"></span></th>
      </tr>


    </thead>
    <tbody>

      @foreach($items as $item)

      <tr class="align-middle white-space-nowrap" role="row">
        <td role="cell">
           @if($item->res_type == 'image')

                      <img style="object-fit: cover; width: 50px; height: 50px;" src="{{url('public/images/resources').'/'.$item->file}} ">

                    {{--   <div class="modal fade " id="modal-resource-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> --}}
                        <div class="modal fade" id="modal-resource-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Add new resource</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <center> 
                                <img class="img-fluid" src="{{url('public/images/resources')}}/{{$item->file}}">
                                </center>   
                            </div>
                          </div>
                        </div>
                      </div>


                @elseif($item->res_type == 'pdf')
                    <img style="width: 38px;" src="{{url('/images/resources')}}/pdf-icon.png">
                    
                   {{--  <div class="modal fade " id="modal-resource-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> --}}

                    <div class="modal fade" id="modal-resource-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">


                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add new resource</h5>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body" style="min-height: 800px;">

                            <embed src="{{url('public/assets/resources')}}/{{$item->file}}" type="application/pdf" width="100%" height="800">
                             
                          </div>
                        </div>
                      </div>
                    </div>

                    

            @elseif($item->res_type == 'video')
                <a  href="{{url('public/images/resources')}}/{{$item->file}}" target="_blank"><img style="width: 50px;" src="{{url('images/resources')}}/video-cion.png"></a>

              {{--   <div class="modal fade " id="modal-resource-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> --}}

                <div class="modal fade" id="modal-resource-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add new resource</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body" style="min-height: 450px;">

                        <video width="100%" controls>
                          <source src="{{url('public/assets/resources')}}/{{$item->file}}" type="video/mp4">
                          Your browser does not support HTML video.
                        </video>
                         
                      </div>
                    </div>
                  </div>
                </div>
            @endif
        </td>
        <td role="cell"> 
       


          <a type="button" class="" data-bs-toggle="modal" data-bs-target="#modal-resource-{{$item->id}}">
          {{$item->title}}
          </a>


       </td>
        <td role="cell">
          
          <a href="{{url('admin/del/resources').'/'.$item->id }}" class="icon-btn" onclick="return confirm('Are you sure you want to delete this resource?');">
             <i class="fa fa-trash text--shadow"></i>
              </a>
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


  <!-- Add resource modal -->
    <div class="modal fade" id="addResource" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add new resource</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <label>Choose resource type</label>

            <div class="row pl-3">
                <label for="inp_image" style="margin-right: 25px;">
                    <input type="radio" class="choose-type-radio" id="inp_image" name="choose_resource_type" value="image" checked=""> IMAGE
                </label>

                <label for="inp_pdf" style="margin-right: 25px;">
                    <input type="radio" class="choose-type-radio" id="inp_pdf" name="choose_resource_type" value="pdf"> PDF
                </label>

                <label for="inp_video" >
                    <input type="radio" class="choose-type-radio" id="inp_video" name="choose_resource_type" value="video"> VIDEO
                </label>
            </div>

            <div class="form-group">
                <label>Resource Category</label>
                <select class="form-control" name="category_id" id="resource_cat_selection">
                    <option value="">None</option>
                    @if( count($parentCategories) > 0)
                        @foreach($parentCategories as $category)
                         <optgroup label="{{ $category->title }}">
                            @if(count($childCategories) > 0)
                                @foreach($childCategories as $child)
                                    @if($category->id == $child->parent_id)
                                        <option value="{{ $child->id }}">{{ $child->title }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </optgroup>
                        @endforeach
                    @endif
                </select>
            </div>

            <label>Resource Title</label>
            <input type="text" name="resource_title" class="form-control" id="resource_title" placeholder="Enter title">

            <div class="image-upload-section upload-section">
                <div class="text-center">
                <img id="image-preview" src="" alt="your image" />
                </div>
                <label class="imgInp label-upload bg--success" for="imgInp">Select Image file</label> 
                <input accept="image/*" type='file' id="imgInp" onchange="loadImg()" />
            </div>

            <div class="pdf-upload-section upload-section d-none">
                <label class="imgPdf label-upload bg--success" for="pdfInp">Select PDF file</label> 
                <input accept="application/pdf" type='file' id="pdfInp" />
            </div>

            <div class="video-upload-section upload-section d-none">
                <label class="imgVideo label-upload bg--success" for="videoInp">Select Video file</label> 
                <small>Upload mp4 file only</small>
                <input accept="video/mp4" type='file' id="videoInp" />
            </div>
            
            <div class="alert alert-danger ajax-error p-2 d-none"></div>
            <div class="alert alert-success ajax-success p-2 d-none"></div>

            <a class="btn btn-primary btn-large btn-block mt-4 text-white upload-resource-btn">
              <span id="upload_text">Upload</span>
            <div class="spinner-border d-none" role="status">
            <span class="sr-only">Loading...</span>
            </div>
            </a>

          </div>
          
        </div>
      </div>
    </div>


    <!-- Add resource Category Modal --> 
    <div class="modal fade" id="addResourceCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Resource Category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
   
            <form id="resource_category_form">
                @csrf
                <div class="form-group">
                    <label>Parent Category</label>
                    <select class="form-control" name="parent_id" id="parent_cat_selection">
                        <option value="">None</option>
                        @if( count($parentCategories) > 0)
                            @foreach($parentCategories as $category)
                             <optgroup label="{{ $category->title }}">
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @if(count($childCategories) > 0)
                                    @foreach($childCategories as $child)
                                        @if($category->id == $child->parent_id)
                                            <option value="{{ $child->id }}">{{ $child->title }}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </optgroup>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <label>Category title</label>
                    <input type="text" name="cat_title" class="form-control" id="cat_title" placeholder="Enter category title" required="">
                </div>
                         
                <div class="alert alert-danger ajax-cat-error p-2 d-none"></div>
                <div class="alert alert-success ajax-cat-success p-2 d-none"></div>

                <button type="submit" class="btn btn-primary btn-large btn-block mt-4 text-white category-resource-btn" style="background-color: #777 !important;border: none;">
                  <span class="cate-create">Create</span>

                <div class="spinner-border cate-create-spiner d-none" role="status" style="font-size: 13px;
                height: 30px;">
                <span class="sr-only">Loading...</span>
                </div>
            </button>
            </form>
          </div>
          
        </div>
      </div>
    </div>
 
@endsection



@section('js')
<script src="https://malsup.github.io/jquery.form.js"></script> 

    <script>
    
        function loadImg(){
            // $('.imgInp').html(event.target.files[0].name);
            $('#image-preview').attr('src', URL.createObjectURL(event.target.files[0]));
        }    
 
        (function($){
            "use strict";
 
            $(document).on('change','.choose-type-radio', function() {
                $('.upload-section').addClass('d-none');
                $('.ajax-success').addClass('d-none');
                $('.ajax-error').addClass('d-none');
                if($(this).val() == 'image'){
                    $('#resource_title').val('');
                    $('.image-upload-section').removeClass('d-none');
                }
                if($(this).val() == 'pdf'){
                    $('#resource_title').val('');
                    $('.pdf-upload-section').removeClass('d-none');
                }   
                if($(this).val() == 'video'){
                    $('#resource_title').val('');
                    $('.video-upload-section').removeClass('d-none');
                }
            });

            $(document).on('click','.upload-resource-btn', function(e) {
                e.preventDefault();

                if($('#resource_cat_selection').val() === ""){
                    $('.ajax-error').html('Resource category required');
                    $('.ajax-error').removeClass('d-none');
                    setTimeout(function() {
                        $('.ajax-error').addClass('d-none');
                    }, 3000);
                    return false;
                }

                if($('#resource_title').val() == ""){
                    $('.ajax-error').html('Resource title required');
                    $('.ajax-error').removeClass('d-none');
                    setTimeout(function() {
                        $('.ajax-error').addClass('d-none');
                    }, 3000);
                    return false;
                }

                $('.ajax-error').addClass('d-none');

                var resource_type = $("input[name='choose_resource_type']:checked").val();
                var category_id = $('#resource_cat_selection option:selected').val();
                if(resource_type == 'image'){
                    var file_data = $('#imgInp').prop('files')[0];   
                }
                if(resource_type == 'pdf'){
                    var file_data = $('#pdfInp').prop('files')[0];   
                }
                if(resource_type == 'video'){
                    var file_data = $('#videoInp').prop('files')[0];   
                }

                var form_data = new FormData();    
                form_data.append('file', file_data);
                form_data.append('_token', '{{ csrf_token() }}');
                form_data.append('title', $('#resource_title').val());

                form_data.append('category_id', category_id);
                form_data.append('resource_type', resource_type);

                 $('#upload_text').addClass('d-none');
                  $('.spinner-border').removeClass('d-none');
                    
                $.ajax({
                    //url: '{{-- route('admin.add.resources') --}}',
                    url: '{{ url('admin/add/resources') }}',
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,                         
                    type: 'post',
                    beforeSend: function() {
                        $('.upload-resource-btn').addClass('progress-bar-striped progress-bar-animated disabled');
                    },
                    success: function(resp) {
                         $('.upload-resource-btn').removeClass('progress-bar-striped');
                         $('.upload-resource-btn').removeClass('progress-bar-animated');
                         $('.upload-resource-btn').removeClass('disabled');

                         if(resp.success){
                            $('.ajax-success').html(resp.success);
                            $('.ajax-success').removeClass('d-none');
                            $('#upload_text').removeClass('d-none');
                            $('.spinner-border').addClass('d-none');
                            setTimeout(function() {
                                $('.ajax-success').addClass('d-none');
                            }, 2000);

                            setTimeout(function() {
                                 location.reload();
                            }, 3000);

                         }
                         if(resp.error){
                            $('.ajax-error').html(resp.error);
                            $('.ajax-error').removeClass('d-none');
                            $('#upload_text').removeClass('d-none');
                            $('.spinner-border').addClass('d-none');
                            setTimeout(function() {
                                $('.ajax-error').addClass('d-none');
                            }, 2000);
                         }
                    }, error: function (xhr, status, errorThrown) {
                         $('.upload-resource-btn').removeClass('progress-bar-striped');
                         $('.upload-resource-btn').removeClass('progress-bar-animated');
                         $('.upload-resource-btn').removeClass('disabled');
                       
                    }
                 });

            }); 


            $('#resource_category_form').on('submit', function(e) {

                    $('.cate-create').addClass('d-none');
                    $('.cate-create-spiner').removeClass('d-none'); 
                e.preventDefault(); 
                $.ajax({
                    type: "POST",
                    //url: '{{-- route('admin.save.resource.category') --}}',
                    url: '{{ url('admin/save/resource/category') }}',
                    dataType: 'json',
                    data: $(this).serialize(),
                    beforeSend: function() {
                        $('.category-resource-btn').addClass('progress-bar-striped progress-bar-animated disabled');
                    },
                    success: function(resp) {
                        $('.category-resource-btn').removeClass('progress-bar-striped');
                        $('.category-resource-btn').removeClass('progress-bar-animated');
                        $('.category-resource-btn').removeClass('disabled');

                        if(resp.success){
                            $('.cate-create').removeClass('d-none');
                            $('.cate-create-spiner').addClass('d-none');
                            $('.ajax-cat-success').html(resp.success);
                            $('.ajax-cat-success').removeClass('d-none');

                            setTimeout(function() {
                                $('.ajax-cat-success').addClass('d-none');
                            }, 2000);


                            
                            setTimeout(function() {
                               $('#addResourceCategory').toggle();
                                 location.reload();
                            }, 3000); 

                            $('#cat_title').val('');
                            $('#parent_cat_selection').html('');
                            $('#parent_cat_selection').html(''+resp.parent_cat);
                            $('#resource_cat_selection').html('');
                            $('#resource_cat_selection').html(''+resp.parent_cat);
                        }
                         if(resp.error){
                          $('.cate-create').removeClass('d-none');
                            $('.cate-create-spiner').addClass('d-none');
                            $('.ajax-cat-error').html(resp.error);
                            $('.ajax-cat-error').removeClass('d-none');
                            setTimeout(function() {
                                $('.ajax-cat-error').addClass('d-none');
                            }, 2000);
                        }
                    }
                });
            });


        })(jQuery);
         
    </script>

<script>

</script>
@endsection