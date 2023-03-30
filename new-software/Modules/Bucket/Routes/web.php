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

Route::prefix('bucket')->group(function() {
    Route::post('/add', 'User\BucketController@store')->name('add.to.bucket');
    Route::get('/index', 'User\BucketController@show')->name('show.bucket');
    Route::post('/remove', 'User\BucketController@remove')->name('bucket.remove');
    Route::post('/update', 'User\BucketController@update')->name('bucket.update');

    //Route::post('/', 'BucketController@store')->name('add.to.bucket');

});
