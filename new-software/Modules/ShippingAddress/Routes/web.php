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

Route::prefix('shippingaddress')->group(function() {
    Route::get('/create', 'User\ShippingAddressController@create')->name('create.shipping');
    Route::get('/edit/{id}', 'User\ShippingAddressController@edit')->name('edit.shipping');
    Route::post('/store', 'User\ShippingAddressController@store')->name('store.shipping');
    Route::post('/update/{id}', 'User\ShippingAddressController@update')->name('update.shipping');
    Route::get('/getStates/{country_id}', 'User\ShippingAddressController@getStateByCountryId')->name('get.states');
    Route::get('/destroy/{id}', 'User\ShippingAddressController@destroy')->name('destroy.shipping');

});



Route::group([
        'namespace' => '\Modules\ShippingAddress\Http\Controllers\User',
        'prefix' => 'user/shipping-address',
        'as' => 'shipping.'
    ]
    , function () {

    Route::get('/', 'ShippingAddressController@index')->name('index');
});






