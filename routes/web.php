<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => \App\Http\Middleware\AuthMiddleware::class], function () {
    Route::get('/dashboard', \App\Http\Controllers\Admin\DashboardController::class)->name('dashboard');
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class)->except('show');
    Route::get('/products/{product}/edit/content', [\App\Http\Controllers\Admin\ProductController::class, 'editContent'])->name('products.edit-content');
    Route::put('/products/{product}/content', [\App\Http\Controllers\Admin\ProductController::class, 'updateContent'])->name('products.update-content');
    Route::get('/sales', [\App\Http\Controllers\Admin\SalesController::class, 'index'])->name('sales.index');
    Route::get('/settings', [\App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('settings.index');
    Route::put('/settings', [\App\Http\Controllers\Admin\SettingsController::class, 'update'])->name('settings.update');
    Route::get('/settings/password', [\App\Http\Controllers\Admin\SettingsController::class, 'password'])->name('settings.password');
    Route::put('/settings/password', [\App\Http\Controllers\Admin\SettingsController::class, 'updatePassword'])->name('settings.update-password');
});

Route::get('/', \App\Http\Controllers\Front\HomeController::class)->name('home');
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'authenticate'])->name('auth.authenticate');
Route::get('/signup', [\App\Http\Controllers\AuthController::class, 'signup'])->name('auth.signup');
Route::post('/signup', [\App\Http\Controllers\AuthController::class, 'register'])->name('auth.register');
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');
Route::post('/cart/add', [\App\Http\Controllers\Front\ProductController::class, 'addToCart'])->name('products.add-to-cart');
Route::get('/search', [\App\Http\Controllers\Front\ProductController::class, 'search'])->name('products.search');
Route::get('/checkout', [\App\Http\Controllers\Front\CheckoutController::class, 'index'])->name('checkout');
Route::get('/checkout/success/{order}', [\App\Http\Controllers\Front\CheckoutController::class, 'success'])->name('checkout.success');
Route::get('/{user}/{product:id}/{slug}', [\App\Http\Controllers\Front\ProductController::class, 'show'])->name('products.show');
Route::get('/{user}', \App\Http\Controllers\Front\ProfileController::class)->name('profile');
