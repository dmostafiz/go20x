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

Route::prefix('admin/')->group(function() {
    Route::get('resources', 'Admin\ResourcesController@index');
    Route::get('del/resources/{id}', 'Admin\ResourcesController@delete');
    Route::post('add/resources', 'Admin\ResourcesController@add_resources');
    Route::post('save/resource/category', 'Admin\ResourcesController@save_resource_category');
});

 

Route::group([

        'namespace' => '\Modules\Resources\Http\Controllers\User',
        'prefix' => 'user/product',
        'as' => 'user.'
    ]
    , function () {

        Route::get('/', 'ResourcesController@index');
});
