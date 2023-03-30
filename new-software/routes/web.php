<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\ProductController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Spatie\Permission\Models\Role; 

Route::get('/create-role', function(){

    $role = Role::create(['name' => 'admin']);
    $role = Role::create(['name' => 'user']);
});

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route::group(['middleware' => ['role:user']], function () {
//     //

//     Route::get('/user/products', [ProductController::class, 'index']);  
//     Route::get('/user/shopping-cart', [ProductController::class, 'cart'])->name('cart');
//     Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
//     Route::patch('update-cart', [ProductController::class, 'update'])->name('update.cart');
//     Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');


//     Route::get('/user/checkout', [ProductController::class, 'checkout']);  
//     Route::post('/user/checkout/order-placed', [ProductController::class, 'order_placed']);  

//     Route::get('/subscribe', 'SubscriptionController@showSubscription');
//     Route::post('/subscribe', 'SubscriptionController@processSubscription');
//     // welcome page only for subscribed users
//     Route::get('/welcome', 'SubscriptionController@showWelcome')->middleware('subscribed');

// });




require __DIR__.'/auth.php';
