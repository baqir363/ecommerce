<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;


Route::get('/', 'App\Http\Controllers\HomeController@index')->name('welcome');
Route::get('products', 'App\Http\Controllers\ProductController@list')->name('product.list');
Route::get('products/{product}', 'App\Http\Controllers\ProductController@view')->name('product.view');

Route::get('cart', 'App\Http\Controllers\CartController@index')->name('cart');
Route::get('checkout', 'App\Http\Controllers\CartController@checkout')->name('checkout');


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

Route::prefix('admin')->middleware('can:admin-login')->group(function () {
    Route::resource('page', 'App\Http\Controllers\PageController');
    Route::resource('category', 'App\Http\Controllers\CategoryController');
    Route::resource('product', 'App\Http\Controllers\ProductController');
});
