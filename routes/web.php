<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DatHangController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Faker\Guesser\Name;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [ProductController::class , 'index'])->name('index');
Route::get('/danh-muc/{id}', [ProductController::class, 'show'])->name('category.show');
Route::get('/san-pham/{id}', [ProductController::class, 'productDetail'])->name('productDetail');


Route::get('/login', [AuthController::class , 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/address/edit', [UserController::class, 'showAddressForm'])->name('address.edit');
    Route::patch('/address/update', [UserController::class, 'updateAddress'])->name('address.update');
});

Route::get('/register', [AuthController::class , 'register'])->name('register');
Route::post('/register', [AuthController::class, 'posrtRegister'])->name('posrtRegister');

// sử lí thêm vào giỏ hàng
Route::post('/cart/add', [DatHangController::class, 'add'])->name('cart.add')->middleware('auth');

// Routes cho Đặt hàng 
Route::middleware('auth')->group(function () {
    Route::get('/checkout', [DatHangController::class, 'showCheckout'])->name('checkout.show');
    Route::post('/checkout', [DatHangController::class, 'processCheckout'])->name('checkout.process');
    Route::get('/order/success', [DatHangController::class, 'showSuccess'])->name('order.success');
    Route::get('/myorder', [DatHangController::class, 'myOrder'])->name('myOrder');
    Route::get('/myorderdetail/{id}', [DatHangController::class, 'myOrderDetail'])->name('myOrderDetail');
});

//xử lí giỏ hàng
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'show'])->name('cartDetail'); 
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/update/{cartDetailId}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{cartDetailId}', [CartController::class, 'remove'])->name('cart.remove');
});

// duyệt đơn hàng
Route::middleware(['auth', 'kiemTraManager'])->prefix('manager')->name('manager.')->group(function () {
    Route::get('/orders', [ManagerController::class, 'listOrders'])->name('orders.index');
    Route::patch('/orders/{id}/update', [ManagerController::class, 'updateOrderStatus'])->name('orders.updateStatus');
});

