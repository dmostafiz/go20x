<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('checkout')->group(function() {
	//Route::get('/checkout', 'BucketController@show')->name('show.bucket');
    Route::get('/index', 'User\CheckoutController@index')->name('checkout.index');
    Route::post('/get-tax-by-state', 'User\CheckoutController@get_tax_by_state')->name('get.tax.by.state');
    Route::post('stripePost', 'User\CheckoutController@stripePost')->name('stripe.post');


});
