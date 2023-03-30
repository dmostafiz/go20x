{{-- @extends('backend.admin.layouts.master') --}}
@extends('site-layouts.master')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
  .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #7367f0 !important;
    border-color: #7367f0 !important;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #e4e4e4;
    border: 1px solid #aaa;
    border-radius: 4px;
    display: inline-block;
    margin-left: 5px;
    margin-top: 5px;
    padding: 0;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice__display {
  color: white !important;
  margin-left: 15px !important;
  }

  .select2-selection__choice__remove{
    font-size: 17px !important;
    color: white !important;
  }
</style>
@endsection
@section('content')

<div class="card mb-3">
            <div class="card-body">
              <div class="row flex-between-center">
                <div class="col-sm-auto mb-2 mb-sm-0">
                  {{-- <h6 class="mb-0">Showing 1-24 of {{ $products->total() }} Products</h6> --}}
                </div>
                <div class="col-sm-auto">
                  <div class="row gx-2 align-items-center">
                    <div class="col-auto">
                      <form class="row gx-2">
                        <div class="col-auto"><small>Sort by: </small></div>
                        <div class="col-auto"><select class="form-select form-select-sm" aria-label="Bulk actions">
                            <option selected="">Best Match</option>
                            <option value="Refund">Newest</option>
                            <option value="Delete">Price</option>
                          </select></div>
                      </form>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header">
           <div style="margin-bottom: 10px;"> 
           
            <h6>Add Product</h6>
   
          </div>
            </div>
            <div class="  bg-light card-body">
              <div class="row g-0">
                  
              <div role="tabpanel" id="react-aria3808690743-49-tabpane-preview" aria-labelledby="react-aria3808690743-49-tab-preview" class="fade tab-pane active show">
              <div>
                 <form action="{{ url('admin/storeproduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                <div class="mb-3">
                <label class="form-label" for="exampleForm.ControlInput1">Title</label>
                <input placeholder="title" type="text" placeholder="Title" name="title" class="form-control @error('title') is-invalid @enderror">
                @if ($errors->has('title'))
                <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('title') }}</strong>
                </span>
                @endif
                </div>

                <div class="mb-3">
                <label class="form-label" for="price">Price</label>
                <input placeholder="price" name="price" type="text" id="price" class="form-control  @error('price') is-invalid @enderror" onkeypress="return onlyNumberKey(event)">
                @if ($errors->has('price'))
                <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('price') }}</strong>
                </span>
                @endif

                </div>

                <div class="mb-3">
                <label class="form-label" for="length">Length</label>
                <input placeholder="length" type="text" id="length" name="length" class="form-control  @error('length') is-invalid @enderror">
                @if ($errors->has('length'))
                <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('length') }}</strong>
                </span>
                @endif

                </div>

                <div class="mb-3">
                <label class="form-label" for="width">Width</label>
                <input placeholder="Width" type="text" id="width" name="width" class="form-control @error('width') is-invalid @enderror">
                 @if ($errors->has('width'))
                <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('width') }}</strong>
                </span>
                @endif
                
                </div>

                 <div class="mb-3">
                <label class="form-label" for="cv">Cv</label>
                <input placeholder="cv" type="text" id="cv" name="cv" class="form-control @error('width') is-invalid @enderror">
                 @if ($errors->has('cv'))
                <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('cv') }}</strong>
                </span>
                @endif
                
                </div>

                <div class="mb-3">
                <label class="form-label" for="height">Height</label>
                <input placeholder="Height" name="height" type="text" id="height" class="form-control @error('height') is-invalid @enderror">
                 @if ($errors->has('height'))
                <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('height') }}</strong>
                </span>
                @endif
                
                </div>

                <div class="mb-3">
                <label class="form-label" for="distance_unit">Distance Unit</label>
                <input placeholder="Distance Unit" type="text" name="distance_unit" id="distance_unit" class="form-control @error('distance_unit') is-invalid @enderror">
                 @if ($errors->has('distance_unit'))
                <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('distance_unit') }}</strong>
                </span>
                @endif
                
                </div>

                <div class="mb-3">
                <label class="form-label" for="weight">Weight</label>
                <input placeholder="Weight" type="text" name="weight" id="weight" class="form-control @error('weight') is-invalid @enderror">
                 @if ($errors->has('weight'))
                <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('weight') }}</strong>
                </span>
                @endif
                
                </div>

                <div class="mb-3">
                <label class="form-label" for="mass_unit">Mass Unit</label>
                <input placeholder="Mass Unit" name="mass_unit" type="text" id="mass_unit" class="form-control @error('mass_unit') is-invalid @enderror">
                 @if ($errors->has('mass_unit'))
                <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('mass_unit') }}</strong>
                </span>
                @endif
                
                </div>

                <div class="mb-3">
                <label class="form-label" for="country">Country</label>
                <select id="search" class="form-control @error('country') is-invalid @enderror" name="country[]" multiple="multiple">
                  @foreach ($countries as $country)
                      <option value="{{ $country->id }}">{{ $country->name }}</option>
                  @endforeach
                  </select>
                   @if ($errors->has('country'))
                <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('country') }}</strong>
                </span>
                @endif
                
                </div>

                <div class="mb-3">
                <label class="form-label" for="image">Image</label>
                <input   type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror">
                 @if ($errors->has('image'))
                <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('image') }}</strong>
                </span>
                @endif
                
                </div>

                <div class="mb-3">
                  <label class="form-label " for="description">Description</label>
                  <textarea rows="3" id="description" class="form-control nicEdit @error('description') is-invalid @enderror" name="description"></textarea>
                   @if ($errors->has('description'))
                <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('description') }}</strong>
                </span>
                @endif
                
                </div>

                 <div class="mb-3">
                   
                   <input type="submit" class="btn  btn-primary" name="submit">
                </div>
              </form>
              </div>
              </div>
                              
              </div>
            </div>
            <div class="card-footer border-top d-flex justify-content-center">
              {{-- currentPage {{ $products->currentPage() }} --}}
            </div>
          </div>
@endsection

  
@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 
<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
<script>

  CKEDITOR.replace('description');


  function onlyNumberKey(evt) {
        
      // Only ASCII character in that range allowed
      var ASCIICode = (evt.which) ? evt.which : evt.keyCode
      if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
          return false;
      return true;
  }


$("#search").select2({
  placeholder: "Search Country",    
});
</script> 

@endsection