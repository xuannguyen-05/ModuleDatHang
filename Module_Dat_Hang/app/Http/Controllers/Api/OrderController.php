<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // <-- Thêm DB để dùng Transaction
use App\Models\Cart;
use App\Models\Order;
use App\Models\ProductVariant;
use Exception; // Thêm Exception

class OrderController extends Controller
{
    /**
     * Xử lý quá trình Checkout (Đặt hàng)
     */
    public function checkout(Request $request)
    {
        // 1. Kiểm tra dữ liệu vào
        $request->validate([
            'shippingAddress' => 'required|string|max:255',
        ]);

        // 2. Lấy user và giỏ hàng 'Active' của họ
        $user = Auth::user();
        $cart = Cart::where('UserID', $user->UserID)
                    ->where('Status', 'Active')
                    ->with('details.productVariant') // Lấy luôn chi tiết và thông tin sản phẩm
                    ->first();

        // 3. Kiểm tra xem giỏ hàng có tồn tại hoặc có rỗng không
        if (!$cart || $cart->details->isEmpty()) {
            return response()->json(['message' => 'Giỏ hàng của bạn đang rỗng.'], 400);
        }

        // 4. Bắt đầu một Transaction (Giao dịch CSDL)
        // Đây là bước "Tất cả hoặc không có gì"
        // Nếu 1 bước trong này lỗi, tất cả sẽ bị hủy (rollback)
        try {
            DB::beginTransaction();

            $totalAmount = 0; // Khởi tạo tổng tiền

            // 5. Lặp qua từng món hàng trong giỏ để kiểm tra kho và tính tiền
            foreach ($cart->details as $detail) {
                $variant = $detail->productVariant; // Đây là biến thể sản phẩm

                // 5a. Kiểm tra tồn kho
                if ($variant->Quantity < $detail->Quantity) {
                    // Nếu hết hàng, hủy Transaction và báo lỗi
                    DB::rollBack();
                    return response()->json([
                        'message' => 'Sản phẩm "' . $variant->product->ProductName . '" (Size ' . $variant->Size . ') không đủ tồn kho.'
                    ], 400);
                }

                // 5b. Tính tổng tiền
                $totalAmount += $detail->UnitPrice * $detail->Quantity;
            }

            // 6. TẠO ĐƠN HÀNG (Bảng Orders)
            // (Tất cả hàng đều còn)
            $order = Order::create([
                'UserID' => $user->UserID,
                'ShippingAddress' => $request->shippingAddress,
                'TotalAmount' => $totalAmount,
                'Status' => 'Pending' // Trạng thái ban đầu
            ]);

            // 7. SAO CHÉP từ CartDetails sang OrderDetails
            foreach ($cart->details as $detail) {
                // 7a. Tạo OrderDetail
                $order->details()->create([
                    'VariantID' => $detail->VariantID,
                    'Quantity' => $detail->Quantity,
                    'UnitPrice' => $detail->UnitPrice,
                ]);

                // 7b. TRỪ KHO (Rất quan trọng)
                $variant = $detail->productVariant;
                $variant->Quantity -= $detail->Quantity; // Trừ số lượng
                $variant->save(); // Lưu lại
            }

            // 8. CẬP NHẬT GIỎ HÀNG
            // Chuyển giỏ hàng 'Active' thành 'Completed'
            $cart->Status = 'Completed';
            $cart->save();

            // 9. Nếu mọi thứ thành công, LƯU VĨNH VIỄN
            DB::commit();

            // 10. Trả về thông báo thành công
            return response()->json([
                'message' => 'Đặt hàng thành công!',
                'orderId' => $order->OrderID
            ], 201);

        } catch (Exception $e) {
            // 11. Nếu có bất kỳ lỗi nào khác, HỦY BỎ
            DB::rollBack();
            
            // Báo lỗi (cho dev)
            // return response()->json(['message' => 'Đã xảy ra lỗi, vui lòng thử lại.', 'error' => $e->getMessage()], 500);
            
            // Báo lỗi (cho user)
             return response()->json(['message' => 'Đã xảy ra lỗi, vui lòng thử lại.'], 500);
        }
    }

    public function getMyOrders(Request $request)
    {
        $user = Auth::user();
        
        // Lấy tất cả đơn hàng của user này, sắp xếp mới nhất lên đầu
        $orders = Order::where('UserID', $user->UserID)
                        ->orderBy('created_at', 'DESC')
                        ->get();

        // Bạn có thể chỉ trả về các thông tin tóm tắt
        $ordersSummary = $orders->map(function($order) {
            return [
                'orderId' => $order->OrderID,
                'orderDate' => $order->OrderDate,
                'status' => $order->Status,
                'totalAmount' => $order->TotalAmount
            ];
        });

        return response()->json($ordersSummary, 200);
    }

    // === HÀM LẤY CHI TIẾT 1 ĐƠN HÀNG ===
    public function getOrderDetail(Request $request, $id)
    {
        $user = Auth::user();
        $order = Order::with('details.productVariant.product') // Lấy tất cả chi tiết
                        ->where('OrderID', $id)
                        ->where('UserID', $user->UserID) // Quan trọng: Đảm bảo đơn này là CỦA TÔI
                        ->first();

        if (!$order) {
            return response()->json(['message' => 'Không tìm thấy đơn hàng'], 404);
        }

        // (Bạn có thể format lại data trả về cho đẹp giống hàm getCart ở trên)
        return response()->json($order, 200);
    }
}