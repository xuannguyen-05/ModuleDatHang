<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\OrderDetail;
use App\Models\ProductVariant;

class DatHangController extends Controller
{
    public function myOrder()
    {
        $user = Auth::user();
        $orders = $user->orders()->with('details.variant.product')->orderBy('created_at', 'desc')->get();
        return view('Product.myOrder', compact('orders'));
    }

    public function myOrderDetail(string $id)
    {
        $user = Auth::user();
        
        //lấy chi tiết đơn hàng Order
        //tìm theo 'order_id'
        //đảm bảo nó thuộc về 'user_id'
        $order = Order::where('order_id', $id)->where('user_id', $user->id)->with('details.variant.product')->firstOrFail();

        return view('Product.myOrderDetail', compact('order'));
    }

    //lấy dữ liệu từ giỏ hàng cart của người dùng.
    public function showCheckout()
    {
        $user = Auth::user();
        $cart = $user->cart()->with('details.variant.product')->first();

        if (!$cart || $cart->details->isEmpty()) {
            return redirect()->route('homepage')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        //tính toán tổng tiền
        $total = $cart->details->sum(function($detail) {
            return $detail->quantity * $detail->unitprice;
        });

        return view('Product.payBill', compact('cart', 'total', 'user'));
    }

    //xử lí khi nhấn nút đặt hàng
    public function processCheckout(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'shipping_address' => 'required|string|max:500',
            'total_amount' => 'required|numeric|min:0',
        ]);

        //lấy giỏ hàng
        $cart = $user->cart()->where('status', 0)->with('details.variant.product')->first();

        if (!$cart || $cart->details->isEmpty()) {
            return redirect()->route('index')->with('error', 'Không thể đặt hàng. Giỏ hàng trống.');
        }

        //kiểm tra tồn kho
        foreach ($cart->details as $detail) {
            if (!$detail->variant || $detail->variant->quantity < $detail->quantity) {
                //quay lại trang thanh toán (payBill) với thông báo lỗi
                return redirect()->back()->with('error', 'Sản phẩm "' . ($detail->variant->product->productname ?? 'Không rõ') . '" không đủ tồn kho.');
            }
        }

        try {
            DB::beginTransaction();

            //tạo Đơn hàng
            $order = Order::create([
                'user_id' => $user->id,
                'orderdate' => Carbon::now(),
                'status' => 0,
                'shippingaddress' => $request->shipping_address,
                'totalamount' => $request->total_amount,
                'update_by' => $user->id,
            ]);

            //chuyển các mục từ CartDetail -> OrderDetail
            foreach ($cart->details as $detail) {
                $order->details()->create([
                    'variant_id' => $detail->variant_id,
                    'size' => $detail->size,
                    'quantity' => $detail->quantity,
                    'unitprice' => $detail->unitprice,
                ]);

                //trừ tồn kho
                $detail->variant->decrement('quantity', $detail->quantity);
            }

            //dánh dấu giỏ hàng là đã hoàn thành
            $cart->status = 1;
            $cart->save();

            //nếu thành công
            DB::commit();
            return redirect()->route('order.success')->with('success', 'Đặt hàng thành công!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Đã xảy ra lỗi. Vui lòng thử lại. Lỗi: ' . $e->getMessage());
        }
    }

    public function showSuccess()
    {
        return view('Product.orderSuccessfully');
    }
}