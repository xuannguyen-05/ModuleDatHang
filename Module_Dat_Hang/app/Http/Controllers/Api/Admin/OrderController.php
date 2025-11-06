<?php
namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Lấy TẤT CẢ đơn hàng (dành cho Admin/Staff)
     */
    public function getAllOrders(Request $request)
    {
        $user = Auth::user();

        // 1. KIỂM TRA QUYỀN (Đây chính là Phân Quyền)
        // (Chúng ta cần thêm hàm 'hasRole' vào Model User)
        // Giả sử tạm là RoleID 1, 2, 3 là Admin/Manager/Staff
        $userRoleIds = $user->roles()->pluck('Roles.RoleID')->toArray();
        if ( !in_array(1, $userRoleIds) && !in_array(2, $userRoleIds) && !in_array(3, $userRoleIds) ) {
            return response()->json(['message' => 'Bạn không có quyền truy cập!'], 403); // 403 = Forbidden
        }

        // 2. Nếu đúng quyền, lấy tất cả đơn hàng
        $orders = Order::with('user') // Lấy luôn thông tin người đặt
                       ->orderBy('created_at', 'DESC')
                       ->get();

        return response()->json($orders, 200);
    }

    /**
     * Cập nhật trạng thái đơn hàng (Accept, Ship...)
     */
    public function updateStatus(Request $request, $id)
    {
        $user = Auth::user();
        
        // 1. KIỂM TRA QUYỀN (y hệt như trên)
        $userRoleIds = $user->roles()->pluck('Roles.RoleID')->toArray();
        if ( !in_array(1, $userRoleIds) && !in_array(2, $userRoleIds) && !in_array(3, $userRoleIds) ) {
            return response()->json(['message' => 'Bạn không có quyền truy cập!'], 403);
        }
        
        // 2. Kiểm tra dữ liệu vào (ví dụ: status mới là gì?)
        $request->validate([
            'status' => 'required|string|in:Accepted,Processing,Shipped,Completed,Cancelled',
        ]);

        $order = Order::find($id);
        if (!$order) {
            return response()->json(['message' => 'Không tìm thấy đơn hàng'], 404);
        }

        // 3. Cập nhật trạng thái
        $order->Status = $request->status;
        $order->updated_by = $user->UserID; // Lưu lại ID của nhân viên đã xử lý đơn này
        $order->save();

        return response()->json(['message' => 'Cập nhật trạng thái đơn hàng thành công', 'order' => $order], 200);
    }
}