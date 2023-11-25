<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Paratials;
use App\Http\Controllers\Products;
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
    return view('index');
});

Route::prefix('dashboards')->group(function () {
    Route::prefix('paratials')->group(function () {
        Route::get('/dashboard',[Paratials::class, 'index'] );

        Route::get('sidebar',[Paratials::class, 'sidebar'] );

    });

    // sản phẩm
    Route::prefix('products')->group(function () {
        Route::get('home-product', [Products::class, 'index'])->name('home-product');
        
        Route::get('create-product',[Products::class,'create'])->name('create-product');

        Route::get('show-product/{id}',[Products::class,'show'])->name('show-product');

        Route::get('edit-product/{id}',[Products::class,'edit'])->name('edit-product');

        Route::post('update-product/{id}',[Products::class,'update'])->name('update-product');

        Route::post('store-product',[Products::class,'store'])->name('store-product');

        Route::get('delete-product/{id}',[Products::class,'destroy'])->name('delete-product');

    });
});
