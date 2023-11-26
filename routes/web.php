<?php

use App\Http\Controllers\ManagerOrder;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Paratials;
use App\Http\Controllers\Products;
use App\Http\Controllers\Users;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Categorys;

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
    // danh mục
    Route::prefix('categories')->group(function() {

        Route::get('home-cate',[Categorys::class,'index'])->name('home-cate');

        Route::get('create-cate', [Categorys::class, 'create'])->name('create-cate');

        Route::post('store-cate', [Categorys::class, 'store'])->name('store-cate');

        Route::get('edit-cate/{id}', [Categorys::class, 'edit'])->name('edit-cate');

        Route::post('update-cate/{id}', [Categorys::class, 'update'])->name('update-cate');

        Route::get('delete-cate/{id}', [Categorys::class, 'destroy'])->name('delete-cate');
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
    
        Route::match(['get', 'post'], '/checkout', [CartController::class,'checkout'])->name('checkout');

        Route::any('/checkout', [CartController::class,'checkout'])->name('checkout');
        
        Route::get('/getCartCount', [CartController::class,'getCartCount'])->name('getCartCount');
        
        Route::get('send-order/{id}', [CartController::class,'send_order'])->name('send-order');

        Route::prefix('orders')->group(function(){
            Route::get('order-detail/{id}', [ManagerOrder::class,'order_detail'])->name('order-detail');

            Route::get('home-manager-order',[ManagerOrder::class,'index'])->name('home-manager-order');
        });
    });
    

});
