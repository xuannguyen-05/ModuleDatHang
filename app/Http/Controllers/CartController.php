<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function add(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'variant_id' => 'required|exists:product_variants,variant_id',
            'size' => 'required|integer|min:30|max:50', 
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = Auth::user();
        $variant_id = $request->input('variant_id');
        $size = $request->input('size');
        $quantity = $request->input('quantity');

        //Tìm biến thể màu để kiểm tra tồn kho và lấy giá
        try {
            $variant = ProductVariant::findOrFail($variant_id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại!');
        }

        //Kiểm tra tồn kho
        if ($quantity > $variant->quantity) {
            return redirect()->back()->with('error', 'Số lượng sản phẩm trong kho không đủ!');
        }

        //tìm hoặc Tạo giỏ hàng status = 0 là giỏ hàng active
        //tìm Cart có user_id và status=0, nếu không có, nó sẽ tạo mới
        $cart = Cart::firstOrCreate(
            ['user_id' => $user->id, 'status' => 0]
        );

        //Kiểm tra xem sản phẩm (có đúng màu và size) đã có trong giỏ hàng chưa
        $existingDetail = $cart->details()->where('variant_id', $variant_id)->where('size', $size)->first();

        if ($existingDetail) {
            //nếu có rồi, chỉ cập nhật số lượng
            $existingDetail->quantity += $quantity;
            $existingDetail->save();
        } else {
            //nếu chưa có, tạo một chi tiết giỏ hàng mới
            $cart->details()->create([
                'variant_id' => $variant_id,
                'size' => $size,
                'quantity' => $quantity,
                'unitprice' => $variant->price, 
            ]);
        }

        // Nếu nhấn "Mua Ngay", chuyển đến trang Giỏ hàng
        if ($request->has('buy_now')) {
            return redirect()->route('cartDetail')->with('success', 'Đã thêm sản phẩm! Vui lòng thanh toán.');
        }
        
        //Chuyển hướng người dùng trở lại trang trước đó với thông báo thành công
        return redirect()->back()->with('success', 'Đã thêm sản phẩm vào giỏ hàng!');
    }

    //trang Giỏ hàng chi tiết
    public function show()
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->where('status', 0) ->with('details.variant.product') ->first();

        return view('Product.cartDetail', compact('cart')); 
    }

    //cập nhật số lượng sản phẩm
    public function update(Request $request, $cartDetailId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $newQuantity = $request->input('quantity');
        $user = Auth::user();

        //tìm chi tiết giỏ hàng để đảm bảo nó thuộc về người dùng này
        $cartDetail = CartDetail::where('cartdetail_id', $cartDetailId)
            ->whereHas('cart', function($query) use ($user) {
                $query->where('user_id', $user->id)->where('status', 0);
            })
            ->with('variant') 
            ->firstOrFail(); 

        //kiểm tra tồn kho
        if ($cartDetail->variant->quantity < $newQuantity) {
            return response()->json([
                'success' => false,
                'message' => 'Số lượng tồn kho không đủ (chỉ còn ' . $cartDetail->variant->quantity . ').'
            ], 422);
        }

        //cập nhật số lượng
        $cartDetail->quantity = $newQuantity;
        $cartDetail->save();

        //tínhlại tổng tiềncho toàn bộ giỏ hàng
        $cart = $cartDetail->cart()->with('details')->first();
        $totalPrice = $cart->details->sum(function($detail) {
            return $detail->quantity * $detail->unitprice;
        });
        $totalQuantity = $cart->details->sum('quantity');

        //trả về json thành công cho javaScript
        return response()->json([
            'success' => true,
            'message' => 'Cập nhật số lượng thành công!',
            'totalPrice' => $totalPrice,
            'totalQuantity' => $totalQuantity,
        ]);
    }

    //xóa một sản phẩm khỏi giỏ hàng 
    public function remove($cartDetailId)
    {
        $user = Auth::user();

        //tìm chi tiết giỏ hàng đảm bảo nó thuộc về người dùngnày
        $cartDetail = CartDetail::where('cartdetail_id', $cartDetailId)
            ->whereHas('cart', function($query) use ($user) {
                $query->where('user_id', $user->id)->where('status', 0);
            })
            ->firstOrFail();

        //ấy giỏ hàng trước khi xoá
        $cart = $cartDetail->cart;

        //xóa
        $cartDetail->delete();

        //tính toán lại tổng tiền sau khi xóa
        $cart->load('details'); //tải lại 'details' sau khi đã xóa
        $totalPrice = $cart->details->sum(function($detail) {
            return $detail->quantity * $detail->unitprice;
        });
        $totalQuantity = $cart->details->sum('quantity');

        //trả về JSON thành công cho JavaScript
        return response()->json([
            'success' => true,
            'message' => 'Đã xóa sản phẩm khỏi giỏ hàng.',
            'totalPrice' => $totalPrice,      
            'totalQuantity' => $totalQuantity, 
        ]);
    }
}