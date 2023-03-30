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
    Route::get('/messages', 'Admin\NotificationController@index');
    Route::post('/add-message', 'Admin\NotificationController@store');
    Route::get('/del/message/{id}', 'Admin\NotificationController@destroy');
});  


Route::group([

        'namespace' => '\Modules\Notification\Http\Controllers\User',
        'prefix' => 'user/notification',
        'as' => 'user.'
    ]
    , function () {

        Route::get('/', 'NotificationController@index');
});

