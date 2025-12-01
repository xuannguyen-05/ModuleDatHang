<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function listOrders()
    {
        $orders = Order::with('user')->orderBy('status', 'asc') ->orderBy('created_at', 'desc')->paginate(20);

        return view('Manager.duyetDon', compact('orders'));
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|integer|in:0,1,2,3',
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->input('status');
        $order->save();

        return redirect()->route('manager.orders.index')->with('success', 'Đã cập nhật trạng thái đơn hàng.');
    }
}