<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProducCodeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('master');
});

Route::get('/ok', function () {
    return view('shop.main');
});



//loại sản phẩm
Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    // Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    // Route::put('/softdeletes/{id}', [CategoryController::class, 'softdeletes'])->name('category.softdeletes');
    // Route::get('/trash', [CategoryController::class, 'trash'])->name('category.trash');
    // Route::put('/restoredelete/{id}', [CategoryController::class, 'restoredelete'])->name('category.restoredelete');
    Route::delete('{id}',[CategoryController::class,'destroy'])->name('category.destroy');
    Route::get('/Garbagecan',[CategoryController::class,'Garbagecan'])->name('category.Garbagecan');
    Route::get('/restore/{id}',[CategoryController::class,'restore'])->name('category.restore');
    Route::get('/deleteforever/{id}',[CategoryController::class,'deleteforever'])->name('category.deleteforever');
});
//sản phẩm
Route::group(['prefix' => 'products'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/update/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('{id}',[ProductController::class,'destroy'])->name('products.destroy');
    Route::put('/softdeletes/{id}', [ProductController::class, 'softdeletes'])->name('products.softdeletes');
    Route::get('/Garbagecan', [ProductController::class, 'Garbagecan'])->name('products.Garbagecan');
    Route::get('/restore/{id}',[ProductController::class,'restore'])->name('products.restore');
    Route::put('/restoredelete/{id}', [ProductController::class, 'restoredelete'])->name('products.restoredelete');
});

//Mã sản phẩm
Route::group(['prefix' => 'product_code'], function () {
    Route::get('/', [ProducCodeController::class, 'index'])->name('product_code.index');
    Route::get('/create', [ProducCodeController::class, 'create'])->name('product_code.create');
    Route::get('/edit/{id}', [ProducCodeController::class, 'edit'])->name('product_code.edit');
    Route::put('/update/{id}', [ProducCodeController::class, 'update'])->name('product_code.update');
    Route::delete('{id}',[ProducCodeController::class,'destroy'])->name('product_code.destroy');
    // Route::post('/store', [ProducCodeController::class, 'store'])->name('products.store');
    // Route::put('/softdeletes/{id}', [ProducCodeController::class, 'softdeletes'])->name('products.softdeletes');
    // Route::get('/Garbagecan', [ProducCodeController::class, 'Garbagecan'])->name('products.Garbagecan');
    // Route::get('/restore/{id}',[ProducCodeController::class,'restore'])->name('products.restore');
    // Route::put('/restoredelete/{id}', [ProducCodeController::class, 'restoredelete'])->name('products.restoredelete');
});




//đơn hàng
Route::prefix('order')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('order.index');
    Route::get('/detail/{id}', [OrderController::class, 'detail'])->name('order.detail');
});
//khách hàng
Route::prefix('customer')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
});

Route::get('/login', [UserController::class, 'viewLogin'])->name('login');








