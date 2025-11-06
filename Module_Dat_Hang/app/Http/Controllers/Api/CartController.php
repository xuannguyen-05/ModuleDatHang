<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart; // Thêm model
use App\Models\CartDetail; // Thêm model
use App\Models\ProductVariant; // Thêm model
use Illuminate\Support\Facades\Auth; // Thêm Auth

class CartController extends Controller
{
    // === HÀM THÊM VÀO GIỎ ===
    public function add(Request $request)
    {
        // 1. Kiểm tra dữ liệu (yêu cầu phải có VariantID và Quantity)
        // **SỬA LỖI VALIDATION:** Dùng đúng tên bảng VIẾT HOA
        $request->validate([
            'variantId' => 'required|integer|exists:ProductsVariants,VariantID',
            'quantity' => 'required|integer|min:1',
        ]);

        // 2. Lấy thông tin user đã đăng nhập
        $user = Auth::user();
        
        // 3. Tìm xem user này có giỏ hàng nào 'Active' không
        // (Khớp với khóa chính UserID)
        $cart = Cart::where('UserID', $user->UserID) 
                    ->where('Status', 'Active')
                    ->first();

        // 4. Nếu CHƯA có giỏ 'Active', tạo giỏ mới
        if (! $cart) {
            $cart = new Cart();
            $cart->UserID = $user->UserID;
            $cart->Status = 'Active';
            $cart->save(); // Lưu giỏ hàng mới để lấy CartID
        }

        // 5. Kiểm tra tồn kho
        // (Khớp với khóa chính VariantID)
        $variant = ProductVariant::find($request->variantId); 
        if ($variant->Quantity < $request->quantity) {
            return response()->json(['message' => 'Số lượng tồn kho không đủ'], 400);
        }

        // 6. Thêm sản phẩm vào CartDetails
        // (Code này chưa kiểm tra nếu sản phẩm đã có trong giỏ,
        // nó sẽ thêm 1 dòng mới. Ta sẽ sửa logic này sau)
        $cartDetail = new CartDetail();
        $cartDetail->CartID = $cart->CartID; // Lấy CartID từ giỏ hàng
        $cartDetail->VariantID = $request->variantId;
        $cartDetail->Quantity = $request->quantity;
        $cartDetail->UnitPrice = $variant->Price; // Lấy giá từ biến thể
        $cartDetail->save();

        // 7. Trả về thành công
        return response()->json(['message' => 'Thêm vào giỏ thành công'], 201);
    }

    public function getCart(Request $request)
    {
        $user = Auth::user();

        // Tìm giỏ hàng 'Active', đồng thời lấy 'details' và 'productVariant' của từng detail
        $cart = Cart::where('UserID', $user->UserID)
                    ->where('Status', 'Active')
                    ->with('details.productVariant.product') // Lấy chi tiết -> biến thể -> sản phẩm
                    ->first();

        if (!$cart) {
            return response()->json(['message' => 'Giỏ hàng rỗng'], 200);
        }

        // Định dạng lại dữ liệu trả về cho đẹp
        $totalAmount = 0;
        $items = [];

        foreach ($cart->details as $detail) {
            $totalAmount += $detail->UnitPrice * $detail->Quantity;
            $items[] = [
                'cartDetailId' => $detail->CartDetailID,
                'variantId' => $detail->VariantID,
                'productName' => $detail->productVariant->product->ProductName, // Lấy tên sản phẩm
                'size' => $detail->productVariant->Size,
                'color' => $detail->productVariant->Color,
                'image_url' => $detail->productVariant->Image_url,
                'quantity' => $detail->Quantity,
                'unitPrice' => $detail->UnitPrice
            ];
        }

        return response()->json([
            'cartId' => $cart->CartID,
            'items' => $items,
            'totalAmount' => $totalAmount
        ], 200);
    }

    // === HÀM CẬP NHẬT SỐ LƯỢNG ===
    public function update(Request $request)
    {
        $request->validate([
            'cartDetailId' => 'required|integer|exists:CartDetails,CartDetailID',
            'newQuantity' => 'required|integer|min:1',
        ]);
        
        $user = Auth::user();
        $cartDetail = CartDetail::find($request->cartDetailId);

        // Kiểm tra xem món hàng này có đúng là của user đang đăng nhập không
        $cart = $cartDetail->cart; // Lấy giỏ hàng cha
        if ($cart->UserID != $user->UserID || $cart->Status != 'Active') {
            return response()->json(['message' => 'Không có quyền truy cập'], 403);
        }

        // Kiểm tra tồn kho mới
        $variant = ProductVariant::find($cartDetail->VariantID);
        if ($variant->Quantity < $request->newQuantity) {
            return response()->json(['message' => 'Số lượng tồn kho không đủ'], 400);
        }

        // Cập nhật số lượng
        $cartDetail->Quantity = $request->newQuantity;
        $cartDetail->save();

        return response()->json(['message' => 'Cập nhật giỏ hàng thành công'], 200);
    }

    // === HÀM XÓA SẢN PHẨM KHỎI GIỎ ===
    public function remove(Request $request, $cartDetailId)
    {
        $user = Auth::user();
        $cartDetail = CartDetail::find($cartDetailId);

        if (!$cartDetail) {
             return response()->json(['message' => 'Sản phẩm không có trong giỏ'], 404);
        }

        // Kiểm tra xem món hàng này có đúng là của user đang đăng nhập không
        $cart = $cartDetail->cart;
        if ($cart->UserID != $user->UserID || $cart->Status != 'Active') {
            return response()->json(['message' => 'Không có quyền truy cập'], 403);
        }

        // Xóa món hàng
        $cartDetail->delete();

        return response()->json(['message' => 'Xóa sản phẩm thành công'], 200);
    }
}