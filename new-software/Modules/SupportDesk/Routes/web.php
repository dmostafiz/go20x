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

Route::prefix('supportdesk')->group(function() {
    Route::get('/', 'SupportDeskController@index');
});


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
*/
Route::group([

        'namespace' => '\Modules\SupportDesk\Http\Controllers\User',
        'prefix' => 'user/supportdesk',
        'as' => 'user.'
    ]
    , function () { 

        Route::get('/', 'SupportDeskController@index');
        Route::get('/create', 'SupportDeskController@index');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/

Route::group([
    
        'namespace' => '\Modules\SupportDesk\Http\Controllers\Admin',
        'prefix' => 'admin/supportdesk',
        'as' => 'admin.'
    ]
    , function () {

        Route::get('/', 'SupportDeskController@index');
        Route::get('/create', 'SupportDeskController@index');
        
});