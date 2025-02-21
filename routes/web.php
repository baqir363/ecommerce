<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EasypaisaController;


Route::get('/', 'App\Http\Controllers\HomeController@index')->name('welcome');
Route::get('products', 'App\Http\Controllers\ProductController@list')->name('product.list');
Route::get('products/{product}', 'App\Http\Controllers\ProductController@view')->name('product.view');

Route::get('cart', 'App\Http\Controllers\CartController@index')->name('cart');
Route::get('checkout', 'App\Http\Controllers\CartController@checkout')->middleware(['auth', 'verified'])->name('checkout');

Route::post('placeorder', 'App\Http\Controllers\OrderController@store')->middleware(['auth', 'verified'])->name('order.store');
Route::get('orders', 'App\Http\Controllers\OrderController@list')->middleware(['auth', 'verified'])->name('orders');

Route::get('payment/{order}', 'App\Http\Controllers\PaymentController@payment')->middleware(['auth', 'verified'])->name('payment.pay');
Route::post('verify', 'App\Http\Controllers\PaymentController@verify')->middleware(['auth', 'verified'])->name('payment.verify');

Route::get('payment/{order}', 'App\Http\Controllers\EasypaisaController@showPaymentPage')->middleware(['auth', 'verified'])->name('payment.view');
Route::post('success', 'App\Http\Controllers\EasypaisaController@success')->middleware(['auth', 'verified'])->name('payment.success');
// Route::get('payment', [EasypaisaController::class, 'showPaymentPage']);
// Route::post('/easypaisa/initiate-payment', [EasypaisaController::class, 'initiatePayment']);
// Route::get('/easypaisa/payment-response', [EasypaisaController::class, 'paymentResponse']);


Route::get('dashboard', 'App\Http\Controllers\HomeController@dashboard')->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* Route::get('/check-user-role', function () {
    $user = Auth::user();
    return response()->json([
        'user' => $user,
        'roles' => $user ? $user->roles->pluck('name') : null,
        'permissions' => $user ? $user->permissions() : null
    ]);
}); */

require __DIR__.'/auth.php';

Route::prefix('admin')->middleware(['auth','can:admin-login'])->group(function () {
    Route::view('/', 'admin.dashboard')->name('admin.dashboard');
    Route::resource('page', 'App\Http\Controllers\PageController');
    Route::resource('category', 'App\Http\Controllers\CategoryController');
    Route::resource('product', 'App\Http\Controllers\ProductController');
    Route::resource('order', 'App\Http\Controllers\OrderController');
    Route::view('banners', 'admin.banners')->name('banners');
});
