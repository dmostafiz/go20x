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

Route::prefix('admin/product')->group(function() {
    Route::get('/', 'User\ProductController@index');
});


Route::group([

        'namespace' => '\Modules\Product\Http\Controllers\User',
        'prefix' => 'user/products',
        'as' => 'user.'
    ]
    , function () {

        Route::get('/', 'ProductController@index');
});


Route::group([
    
        'namespace' => '\Modules\Product\Http\Controllers\Admin',
        'prefix' => 'admin/product',
        'as' => 'admin.'
    ]
    , function () {

        Route::get('/', 'ProductController@index');
});