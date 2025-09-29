<?php


use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

use App\http\Controllers\HomeController;
use App\http\Controllers\ProductController;
use App\http\Controllers\wishlistController;
use App\http\Controllers\PlaceOrderController;
use App\http\Controllers\LoginController;

Route::get('/', function () {
    return ('hello');
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'] );




Route::controller(ProductController::class)->group(function () {
    Route::get('/shop', 'index');
    Route::get('/product/create', 'create');
    Route::post('/product', 'store');
    Route::get('/product/{id}', 'show');
    Route::get('/product/{id}/edit', 'edit');
    Route::put('/product/{id}', 'update');
    Route::delete('/product/{id}', 'destroy');
    
});

Route::controller(wishlistController::class)->group(function () {
    Route::get('/wishlist', 'index');
    Route::get('/wishlist/create', 'create');
    Route::post('/wishlist', 'store');
    Route::get('/wishlist/{id}', 'show');
    Route::get('/wishlist/{id}/edit', 'edit');
    Route::put('/wishlist/{id}', 'update');
    Route::delete('/wishlist/{id}', 'destroy');
    
});


Route::controller(PlaceOrderController::class)->group(function () {
    Route::get('/place-order', 'index');
    Route::get('/placeOrder/create', 'create');
    Route::post('/placeOrder', 'store');
    Route::get('/placeOrder/{id}', 'show');
    Route::get('/placeOrder/{id}/edit', 'edit');
    Route::put('/placeOrder/{id}', 'update');
    Route::delete('/placeOrder/{id}', 'destroy');
    
});


Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index');
    Route::get('/login/create', 'create');
    Route::post('/login', 'store');
    Route::get('/login/{id}', 'show');
    Route::get('/login/{id}/edit', 'edit');
    Route::put('/login/{id}', 'update');
    Route::delete('/login/{id}', 'destroy');
    
});


Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard.index');
    Route::get('/dashboard/create', 'create');
    Route::post('/dashboard', 'store');
    Route::get('/dashboard/{id}', 'show');
    Route::get('/dashboard/{id}/edit', 'edit');
    Route::put('/dashboard/{id}', 'update');
    Route::delete('/dashboard/{id}', 'destroy');

    Route::get('/layout', 'layout');
    
    
});



Route::controller(AdminProductController::class)->group(function () {
    Route::get('/admin-product', 'index')->name('admin-product.index');
    Route::get('/admin-product/create', 'create')->name('admin-product.create');
    Route::post('/admin-product', 'store')->name('admin-product.store');
    Route::get('/admin-product/{id}', 'show')->name('admin-product.show');
    Route::get('/admin-product/{id}/edit', 'edit')->name('admin-product.edit');
    Route::put('/admin-product/{id}', 'update')->name('admin-product.update');
    Route::delete('/admin-product/{id}', 'destroy')->name('admin-product.destroy');
});


// Route::controller(AdminCategoryController::class)->group(function () {
//     Route::get('/admin-category', 'index')->name('admin-category.index');
//     Route::get('/admin-category/create', 'create')->name('admin-category.create');
//     Route::post('/admin-category', 'store')->name('admin-category.store');
//     Route::get('/admin-category/{id}', 'show')->name('admin-category.show');
//     Route::get('/admin-category/{id}/edit', 'edit')->name('admin-category.edit');
//     Route::put('/admin-category/{id}', 'update')->name('admin-category.update');
//     Route::delete('/admin-category/{id}', 'destroy')->name('admin-category.destroy');


// });


Route::controller(AdminCategoryController::class)->group(function () {
    Route::get('/admin-category', 'index')->name('admin-category.index');
    Route::post('/admin-category', 'store')->name('admin-category.store');
    Route::put('/admin-category/{id}', 'update')->name('admin-category.update');
    Route::delete('/admin-category/{id}', 'destroy')->name('admin-category.destroy');
});



Route::get('/auth', function(){ return view('auth'); });
Route::post('/ajax-login', [AuthController::class, 'login'])->name('ajax.login');
Route::post('/ajax-register', [AuthController::class, 'register'])->name('ajax.register');
Route::post('/ajax-logout', [AuthController::class, 'logout'])->name('ajax.logout');























