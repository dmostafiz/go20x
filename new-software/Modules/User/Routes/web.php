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

Route::prefix('admin')->group(function() {
    Route::get('/users', 'Admin\UserController@index');
    Route::get('/userDetail/{id}', 'Admin\UserController@userDetail');
    Route::get('/user/order-detail/{id}', 'Admin\UserController@order_detail');
    Route::get('/users/retail', 'Admin\UserController@retailUser');
    Route::get('/users/delete/{id}', 'Admin\UserController@delete_user');
    Route::get('/user/send-email/{id}', 'Admin\UserController@showEmailSingleForm');
    Route::post('user/email/singleSend/{id}','Admin\UserController@sendEmailSingle');
    Route::get('/users/send-email', 'Admin\UserController@showEmailAllForm');
     Route::post('/user/email/allSend','Admin\UserController@sendEmailAll');
  

    
});



Route::group([

        'namespace' => '\Modules\Purchase\Http\Controllers\User',
        'prefix' => 'user/purchase',
        'as' => 'user.'
    ]
    , function () {

        Route::get('/', 'User/PurchaseController@index');
});
