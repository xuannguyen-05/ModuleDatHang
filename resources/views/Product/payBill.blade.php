@extends('Home.layout')
@section('title', 'Thanh Toán')
@section('content')

    <div class="payBill_title">
        <span class="payBill_titleName">Thanh Toán</span>
    </div>

    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf

        <div class="payBill_address">
            <div class="payBill_addressTitle">
                <i class=" payBill_addressTitle_icon fa-solid fa-location-dot"></i>
                <span class="payBill_addressTitle_name">Địa Chỉ Nhận Hàng</span>
            </div>

            <div class="payBill_address_content">
                <span class="payBill_address_contentName">{{ $user->fullname ?? $user->name }}</span>
                <span class="payBill_address_contentPhone">( {{ $user->phone ?? 'Chưa có SĐT' }} ) </span>
                <span class="payBill_address_contentAddress">{{ $user->address ?? 'Chưa có địa chỉ' }}</span>
                
                <input type="hidden" name="shipping_address" value="{{ $user->address ?? 'Chưa có địa chỉ' }}">

                <span class="payBill_address_contentbutton">Mặc Định</span>
                <a href="{{route('address.edit')}}" class="payBill_address_content_ThayDoi">Thay Đổi</a> {{-- (Bạn sẽ cần tạo trang thay đổi địa chỉ sau) --}}
            </div>
        </div>

        <div class="payBill_Product">
            <div class="cartDetailTitleName payBill_ProductTitleName">
                <div class="cartDetailProduct">
                    <span class="cartDetailProduct1">Sản Phẩm</span>
                </div>
                
                <div class="cartDetail_content">
                    <span class="cartDetail_content4"></span>
                    <span class="cartDetail_content4">Đơn Giá</span>
                    <span class="cartDetail_content4">Số Lượng </span>
                    <span class="cartDetail_content4">Thành Tiền</span>
                </div>
            </div>

            @if($cart && $cart->details->isNotEmpty())
                @foreach($cart->details as $detail)
                    @if($detail->variant && $detail->variant->product)
                        @php
                            $imgPath = $detail->variant->img_ulr;
                            if (str_starts_with($imgPath, './')) {
                                $imgPath = substr($imgPath, 2);
                            } elseif (str_starts_with($imgPath, '/')) {
                                $imgPath = substr($imgPath, 1);
                            }
                        @endphp
                        <div class="cartDetail">
                            <div class="cartDetailProduct">
                                <div class="cartDetailProduct_img" style="background-image: url({{ asset($imgPath) }});"></div>
                                <span class="cartDetailProductName">{{ $detail->variant->product->productname }}</span>
                            </div>
                            <div class="cartDetail_content">
                                <div class="cartDetail_content4 cartDetail_PhanLoai">
                                    <span class="cartDetail_PhanLoaiName">Phân Loại :</span>
                                    <span class="cartDetail_PhanLoaiMota">{{ $detail->variant->color }}, {{ $detail->size }}</span>
                                </div>
                        
                                <div class="cartDetail_content4 cartDetail_price">{{ number_format($detail->unitprice) }}đ</div>
                        
                                <div class="cartDetail_content4 cartDetail_quantity">
                                    <span class="productDeatil_QuantityInt" style="font-size: 1.4rem;">{{ $detail->quantity }}</span>
                                </div>
                        
                                <div class="cartDetail_content4 cartDetail_sumprice">{{ number_format($detail->unitprice * $detail->quantity) }}đ</div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif

            <div class="cartDetailend SumPayBill">
                <div class="cartDetailend_MuaHang">
                    <span class="cartDetailend_MuaHang_quantity">Tổng Số Tiền ({{ $cart->details->sum('quantity') }} Sản Phẩm):</span>
                    <span class="cartDetailend_MuaHangPrice">{{ number_format($total) }}đ</span>
                </div>
            </div>

        </div>

        <div class="payBill_address payBillend">
            <div class="payBillendTitle">
                <span class="payBillendTitleName">Phương Thức Thanh Toán</span>
                <div class="payBillendTitlePhuongThuc">
                    <span class="payBillendTitlePhuongThucName">Thanh toán khi nhận hàng</span>
                    <a href="#" class="payBillendTitlePhuongThuc_ThayDoi">THAY ĐỔI</a>
                </div>
            </div>
            
            @php
                $shippingFee = 40000; 
                $finalTotal = $total + $shippingFee;
            @endphp

            <input type="hidden" name="total_amount" value="{{ $finalTotal }}">

            <div class="payBillendContent">
                <div class="payBillendContent_tienhang">
                    <span class="payBillendContent_tienhang_name">Tổng tiền Hàng</span>
                    <span class="payBillendContent_tienhang_nameSum">{{ number_format($total) }}đ</span>
                </div>
            </div>

            <div class="payBillendContent">
                <div class="payBillendContent_tienhang">
                    <span class="payBillendContent_tienhang_name">Tổng phí vận chuyển</span>
                    <span class="payBillendContent_tienhang_nameSum">40,000đ</span>
                </div>
            </div>

            <div class="payBillendContent">
                <div class="payBillendContent_tienhang">
                    <span class="payBillendContent_tienhang_name">Tổng thanh toán</span>
                    <span class="payBillendContent_tienhang_nameSum colorBlue">{{ number_format($finalTotal) }}đ</span>
                </div>
            </div>

            <div class="payBillendContentDatHang">
                <span class="payBillendContentDatHangName">Nhấn "Đặt Hàng" đồng nghĩa với việc bạn đồng ý tuân theo điều khoản của shop</span>
                <button type="submit" class="payBillendContentDatHangbtn btn btn--primary">Đặt Hàng</button>
            </div>
        </div>

    </form> {{-- SỬA 10: Đóng thẻ form --}}

    <div class="sualoifooter">
        '
    </div>
@endsection