<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Import tất cả Controller
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\OrderController; // Controller của Customer
use App\Http\Controllers\Api\Admin\OrderController as AdminOrderController; // Controller của Admin

// === API CÔNG KHAI (Không cần Token) ===
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);


// === API CẦN BẢO VỆ (Phải gửi Token) ===

// ----- NHÓM 1: DÀNH CHO KHÁCH HÀNG (CUSTOMER) -----
// Bất cứ ai đã đăng nhập đều có thể dùng
Route::middleware(['auth:sanctum'])->group(function () {
    
    // API Lấy thông tin user
    Route::get('/auth/me', [AuthController::class, 'me']);
    
    // === Module Giỏ hàng ===
    Route::get('/cart', [CartController::class, 'getCart']); 
    Route::post('/cart/add', [CartController::class, 'add']);
    Route::put('/cart/update', [CartController::class, 'update']);
    Route::delete('/cart/remove/{cartDetailId}', [CartController::class, 'remove']);

    // === Module Đặt hàng (của Khách hàng) ===
    Route::post('/orders/checkout', [OrderController::class, 'checkout']); 
    Route::get('/orders/my', [OrderController::class, 'getMyOrders']);
    Route::get('/orders/{id}', [OrderController::class, 'getOrderDetail']);
});


// ----- NHÓM 2: DÀNH CHO QUẢN TRỊ (ADMIN / STAFF) -----
// Chỉ Admin/Staff mới được vào
// Thêm prefix('admin') để tất cả URL bắt đầu bằng /api/admin/...
Route::middleware(['auth:sanctum'])->prefix('admin')->group(function () {
    
    // API Lấy TẤT CẢ đơn hàng
    Route::get('/orders', [AdminOrderController::class, 'getAllOrders']);
    
    // API Cập nhật trạng thái
    Route::put('/orders/{id}/status', [AdminOrderController::class, 'updateStatus']);
    
    // (Sau này bạn sẽ thêm API quản lý sản phẩm vào đây)
    // Route::post('/products', [AdminProductController::class, 'create']);
});