@extends('backend.user.layouts.master')


@section('page-content')

<div class="card mb-3">
            <div class="card-body">
              <div class="row flex-between-center">
                <div class="col-sm-auto mb-2 mb-sm-0">
                  <h6 class="mb-0">Showing 1-24 of {{ $products->total() }} Products</h6>
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
            <div class="card-body p-0 overflow-hidden">
              <div class="row g-0">
               
                @foreach($products as $product)
                <div class="col-12 p-x1  @if( $loop->index  % 2 != 0) bg-100 @endif ">
                  <div class="row">
                    <div class="col-sm-5 col-md-4">
                      <div class="position-relative h-sm-100"><a class="d-block h-100" href="javascript:void(0)"><img class="img-fluid fit-cover w-sm-100 h-sm-100 rounded-1 absolute-sm-centered" src="{{ $product->image }}" alt=""></a></div>
                    </div>
                    <div class="col-sm-7 col-md-8">
                      <div class="row">
                        <div class="col-lg-8">
                          <h5 class="mt-3 mt-sm-0"><a class="text-dark fs-0 fs-lg-1" href="../../../app/e-commerce/product/product-details.html">{{ $product->name }}</a></h5>
                         
                          <p>{!! $product->description !!}</p>
                        </div>
                        <div class="col-lg-4 d-flex justify-content-between flex-column">
                          <div>
                            <h4 class="fs-1 fs-md-2 text-warning mb-0">${{ $product->price }}</h4>
                           
                            <div class="d-none d-lg-block">
                             
                              <p class="fs--1 mb-1">Stock: <strong class="text-success">Available</strong></p>
                            </div>
                          </div>
                          <div class="mt-2"><a class="btn btn-sm btn-primary d-lg-block mt-lg-2" href="{{ route('add.to.cart', $product->id) }}"><svg class="svg-inline--fa fa-cart-plus fa-w-18" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="cart-plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z"></path></svg><!-- <span class="fas fa-cart-plus"> </span> Font Awesome fontawesome.com --><span class="ms-2 d-none d-md-inline-block">Add to Cart</span></a></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
            <div class="card-footer border-top d-flex justify-content-center">currentPage {{ $products->currentPage() }}</div>
          </div>
@endsection