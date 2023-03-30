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
Route::group([
        'namespace' => '\Modules\Order\Http\Controllers\User',
        'prefix' => 'user/orders',
        'as' => 'order'
    ]
    , function () {

    Route::get('/', 'OrderController@index')->name('index');
});


Route::prefix('order')->group(function() {
    Route::get('/', 'User\OrderController@index')->name('index');
    Route::get('/details/{id}', 'User\OrderController@order_detail')->name('detail'); 
});
