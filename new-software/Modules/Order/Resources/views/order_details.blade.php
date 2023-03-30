@extends('site-layouts.master')

@section('content')
    <div class="mb-3 card">
	<div class="card-header">
		<div class="flex-between-center row">
			<div class="d-flex align-items-center pe-0 col-sm-auto col-4">
				<h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Order Details</h5></div>
			<div class="ms-auto text-end ps-0 col-sm-auto col-8">
				<div id="orders-actions">
					 {{-- <a href="{{route('create.shipping')}}" type="button" class="btn btn-falcon-default btn-sm">
						<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14 me-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="transform-origin: 0.4375em 0.5em;">
							<g transform="translate(224 256)">
								<g transform="translate(0, 0)  scale(0.8125, 0.8125)  rotate(0 0 0)">
									<path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" transform="translate(-224 -256)"></path>
								</g>
							</g>
						</svg><span class="d-none d-sm-inline-block ms-1">Add new</span></a> --}}
					{{--
					<button type="button" class="mx-2 btn btn-falcon-default btn-sm">
						<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="filter" class="svg-inline--fa fa-filter fa-w-16 me-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="transform-origin: 0.5em 0.5em;">
							<g transform="translate(256 256)">
								<g transform="translate(0, 0)  scale(0.8125, 0.8125)  rotate(0 0 0)">
									<path fill="currentColor" d="M487.976 0H24.028C2.71 0-8.047 25.866 7.058 40.971L192 225.941V432c0 7.831 3.821 15.17 10.237 19.662l80 55.98C298.02 518.69 320 507.493 320 487.98V225.941l184.947-184.97C520.021 25.896 509.338 0 487.976 0z" transform="translate(-256 -256)"></path>
								</g>
							</g>
						</svg><span class="d-none d-sm-inline-block ms-1">Filter</span></button>
					<button type="button" class="btn btn-falcon-default btn-sm">
						<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="external-link-alt" class="svg-inline--fa fa-external-link-alt fa-w-16 me-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="transform-origin: 0.5em 0.5em;">
							<g transform="translate(256 256)">
								<g transform="translate(0, 0)  scale(0.8125, 0.8125)  rotate(0 0 0)">
									<path fill="currentColor" d="M432,320H400a16,16,0,0,0-16,16V448H64V128H208a16,16,0,0,0,16-16V80a16,16,0,0,0-16-16H48A48,48,0,0,0,0,112V464a48,48,0,0,0,48,48H400a48,48,0,0,0,48-48V336A16,16,0,0,0,432,320ZM488,0h-128c-21.37,0-32.05,25.91-17,41l35.73,35.73L135,320.37a24,24,0,0,0,0,34L157.67,377a24,24,0,0,0,34,0L435.28,133.32,471,169c15,15,41,4.5,41-17V24A24,24,0,0,0,488,0Z" transform="translate(-256 -256)"></path>
								</g>
							</g>
						</svg><span class="d-none d-sm-inline-block ms-1">Export</span></button> --}}
				</div>
			</div>
		</div>
	</div>
	<div class="p-0 card-body">
		<div data-simplebar="init">
			<div class="simplebar-wrapper" style="margin: 0px;">
				<div class="simplebar-height-auto-observer-wrapper">
					<div class="simplebar-height-auto-observer"></div>
				</div>
				<div class="simplebar-mask">
					<div class="simplebar-offset" style="right: 0px; bottom: 0px;">
						<div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;">
							<div class="simplebar-content" style="padding: 0px;">
								<table role="table" class="fs--1 mb-0 overflow-hidden table table-sm table-striped">
									<thead class="bg-200 text-900 text-nowrap align-middle">
										<tr>
											
											<th>Order ID</th>
											<th>Product</th>
											<th>Quantity</th>
											<th>Amount</th>
											<th>Tracking Number</th>
											<th>Track order</th>
											{{-- <th>Track Order</th> --}}

											
										</tr>
									</thead>
									<tbody>
										
										@if($orders->count())
										@foreach($orders as $trx)
										
										<tr class="align-middle white-space-nowrap" role="row">
											@php
											$product = getProductById($trx->product_id)
											@endphp
											<td>#{{ $trx->order_id }}</td>
											<td>{{$product->name  }}</td>
											<td>{{ $trx->quantity }}</td>
											<td>${{ $trx->amount }}</td>
											<td>--</td>
											<td>--</td>
											
										</tr>
										@endforeach
										@else
										    <tr>
										        <td colspan="5"> No record found </td>
										    </tr>
										@endif
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="simplebar-placeholder" style="width: auto; height: 603px;"></div>
			</div>
			<div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
				<div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
			</div>
			<div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
				<div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
			</div>
		</div>
	</div>
	<div class="card-footer">
		<div class="d-flex justify-content-center align-items-center">
			
		</div>
	</div>
</div>
@endsection
