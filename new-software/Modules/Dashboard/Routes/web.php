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

Route::prefix('dashboard')->group(function() {
    Route::get('/', 'User\DashboardController@index');
});


Route::group([

        'namespace' => '\Modules\Dashboard\Http\Controllers\User',
        'prefix' => 'user/dashboard',
        'as' => 'user.'
    ]
    , function () {

        Route::get('/', 'DashboardController@index');
});


Route::group([
    
        'namespace' => '\Modules\Dashboard\Http\Controllers\Admin',
        'prefix' => 'admin\dashboard',
        'as' => 'admin.'
    ]
    , function () {
        
        Route::get('/', 'DashboardController@index');
});