<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Paratials;
use App\Http\Controllers\Products;
use App\Http\Controllers\Users;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

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

Route::get('/', [Paratials::class, 'show_new_pro'])->name('home-page');

Route::prefix('dashboards')->group(function () {

    // sản phẩm
    Route::prefix('products')->group(function () {
        Route::get('home-product', [Products::class, 'index'])->name('home-product');

        Route::get('create-product', [Products::class, 'create'])->name('create-product');

        Route::get('show-product/{id}', [Products::class, 'show'])->name('show-product');

        Route::get('edit-product/{id}', [Products::class, 'edit'])->name('edit-product');

        Route::post('update-product/{id}', [Products::class, 'update'])->name('update-product');

        Route::post('store-product', [Products::class, 'store'])->name('store-product');

        Route::get('delete-product/{id}', [Products::class, 'destroy'])->name('delete-product');

    });


});

Route::prefix('pages')->group(function () {

    Route::prefix('paratials')->group(function () {

        Route::get('/dashboard', [Paratials::class, 'index']);

        Route::get('sidebar', [Paratials::class, 'sidebar']);

        Route::get('shop', [Paratials::class, 'shop'])->name('shop');

        Route::get('product_detail/{id}', [Paratials::class, 'product_detail'])->name('product_detail');


    });

    Route::prefix('user')->group(function () {
        Route::get('view_login', [Users::class, 'view_login'])->name('view_login');

        Route::post('login', [Users::class, 'login'])->name('login');

        Route::get('logout', [Users::class, 'logout'])->name('logout');


    });

    Route::prefix('cart')->group(function () {
        Route::get('/cart', [CartController::class, 'showCart'])->name('showCart');

        Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('addToCart');

        Route::get('/show_cart', [CartController::class, 'show_cart'])->name('show_cart');

        Route::post('/remove-from-cart', [CartController::class, 'removeFromCart'])->name('removeFromCart');
    });
    Route::match(['get', 'post'], '/checkout', [CartController::class,'checkout'])->name('checkout');

    Route::any('/checkout', [CartController::class,'checkout'])->name('checkout');

});
