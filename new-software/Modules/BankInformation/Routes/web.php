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
        'namespace' => '\Modules\BankInformation\Http\Controllers\User',
        'prefix' => 'user/bank-information',
        'as' => 'user.'
    ]
    , function () {

    Route::get('/', 'BankInformationController@index')->name('index');
});


Route::prefix('bankinformation')->group(function() {
	Route::get('/create', 'User\BankInformationController@create')->name('create.bankinfo');
	Route::post('/store', 'User\BankInformationController@store')->name('store.bankinfo');
    Route::get('/', 'BankInformationController@index');
});
