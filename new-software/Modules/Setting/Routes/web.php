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
        'namespace' => '\Modules\Setting\Http\Controllers\User',
        'prefix' => 'setting/profile',
        'as' => 'setting.'
    ]
    , function () {

    Route::get('/', 'SettingController@index')->name('setting.index');

});



Route::prefix('setting')->group(function() {
    //Route::get('/profile', 'User\SettingController@index')->name('setting.index');
    Route::post('change-password', 'User\ProfileController@submitPassword')->name('change.password');

    Route::post('updateProfile', 'User\ProfileController@submitProfile')->name('update.profile');

});
