@extends('Home.layout')
@section('title', 'Chi tiết đơn hàng')
@section('content')
    <div class="contrains myorder">
        <div class="myorder_Auth">
            <div class="myorder_Auth_title">
                <img src="{{ asset('assets/img/avata.jpg') }}" alt="" class="myorder_AuthImg"> 
                <span class="myorder_AuthName">{{ Auth::user()->name }}</span>
            </div>

            <div class="myorder_Auth_Content">
                <div class="myorder_Auth_ContentLabel">
                    <i class="myorder_Auth_ContentLabel_icon fa-regular fa-bell"></i>
                    <span class="myorder_Auth_ContentLabel_name">Thông Báo</span>
                </div>

                <div class="myorder_Auth_ContentLabel">
                    <i class="myorder_Auth_ContentLabel_icon fa-regular fa-user"></i>
                    <span class="myorder_Auth_ContentLabel_name">Tài khoản của tôi</span>
                </div>

                <div class="myorder_Auth_ContentLabel">
                    <i class="myorder_Auth_ContentLabel_icon fa-regular fa-note-sticky"></i>
                    <span class="myorder_Auth_ContentLabel_name" style="color: #598bbb">Đơn Hàng</span>
                </div>

            </div>
        </div>
       
        <div class="myorder_Content">
             {{-- đơn hàng cụ thể --}}
            <div class="myorder_Content_product">
                <div class="myorder_Content_productShipper myorderdetail_prevtitle">
                    <div class="myorderdetail_prev">
                        <i class="myorderdetail_previcon fa-solid fa-arrow-left"></i>
                        <a href="{{ route('myOrder') }}" class="myorderdetail_prevName" style="text-decoration: none">TRỞ LẠI</a>
                    </div>
                    <div class="myorder_Content_productShipper_status">
                        <span class="myorder_Content_productShipperName">MÃ ĐƠN HÀNG : {{ $order->order_id }}</span>
                        <span class="myorder_Content_productShipper_Commet" style="font-weight: 500; padding-left: 10px">
                            @if($order->status == 0)
                                ĐƠN HÀNG ĐANG CHỜ XỬ LÍ
                            @elseif($order->status == 1)
                                ĐƠN HÀNG ĐANG ĐƯỢC CHUẨN BỊ
                            @elseif($order->status == 2)
                                ĐƠN HÀNG ĐANG GIAO
                            @else
                                ĐƠN HÀNG ĐÃ HOÀNG THÀNH 
                            @endif
                        </span>
                    </div>
                </div>

                @php
                    $subtotal = 0;
                @endphp

                @foreach($order->details as $detail)
                    @if($detail->variant && $detail->variant->product)
                        @php
                            $itemTotal = $detail->unitprice * $detail->quantity;
                            $subtotal += $itemTotal; 

                            $imgPath = $detail->variant->img_ulr;
                            if (str_starts_with($imgPath, './')) {
                                $imgPath = substr($imgPath, 2);
                            } elseif (str_starts_with($imgPath, '/')) {
                                $imgPath = substr($imgPath, 1);
                            }
                        @endphp
                        <div class="myorder_Content_productContent">
                            <div class="myorder_Content_productContentDecripsion">
                                <img src="{{ asset($imgPath) }}" alt="{{ $detail->variant->product->productname }}" class="myorder_Content_productContent_img">
                                <div class="myorder_Content_productContent_decription">
                                    <span class="myorder_Content_productContent_title">{{ $detail->variant->product->productname }}</span>
                                    <span class="myorder_Content_productContent_classi">Phân Loại : {{ $detail->variant->color }}, {{ $detail->size }}</span>
                                    <span class="myorder_Content_productContent_quantity">x{{ $detail->quantity }}</span>
                                </div>
                            </div>

                            <div class="myorder_Content_productContentPrice">
                                <span class="myorder_Content_productContentPriceNew">{{ number_format($itemTotal) }}đ</span>
                            </div>
                        </div>
                    @endif
                @endforeach


                <div class="myorder_Content_productPayBill">
                    <div class="payBill_addressTitle">
                        <i class=" payBill_addressTitle_icon fa-solid fa-location-dot"></i>
                        <span class="payBill_addressTitle_name">Địa Chỉ Nhận Hàng</span>
                    </div>

                    <div class="payBill_address_content">
                
                        {{--Do'orders' chỉ lưu 'shippingaddress',chúng ta lấy Tên và SĐT từ thông tin tài khoản hiện tại) --}}
                        <span class="payBill_address_contentName">{{ Auth::user()->fullname ?? Auth::user()->name }}</span>
                        <span class="payBill_address_contentPhone">( {{ Auth::user()->phone ?? 'N/A' }} ) </span>
                        <span class="payBill_address_contentAddress">{{ $order->shippingaddress }}</span>
                    </div>
                </div>

                <div class="myorder_Content_productPayBill">
                    
                    @php
                        $shippingFee = $order->totalamount - $subtotal;
                    @endphp

                    <div class="payBillendContent">
                        <div class="payBillendContent_tienhang">
                            <span class="payBillendContent_tienhang_name">Tổng tiền Hàng</span>
                            <span class="payBillendContent_tienhang_nameSum">{{ number_format($subtotal) }}đ</span>
                        </div>
                    </div>

                    <div class="payBillendContent">
                        <div class="payBillendContent_tienhang">
                            <span class="payBillendContent_tienhang_name">Tổng phí vận chuyển</span>
                            <span class="payBillendContent_tienhang_nameSum">{{ number_format($shippingFee) }}đ</span>
                        </div>
                        
                    </div>

                    <div class="payBillendContent">
                        <div class="payBillendContent_tienhang">
                            <span class="payBillendContent_tienhang_name">Tổng thanh toán</span>
                            <span class="payBillendContent_tienhang_nameSum colorBlue">{{ number_format($order->totalamount) }}đ</span>
                        </div>

                    </div>

                    <div class="payBillendContent">
                        <div class="payBillendContent_tienhang">
                            <span class="payBillendContent_tienhang_name">Loại thanh toán</span>
                            <span class="payBillendContent_tienhang_nameSum ">Tiền mặt</span>
                        </div>

                    </div>

                </div>

            </div>
            {{-- kết thúc đơn hàng cụ thể  --}}
        </div>

    </div>
@endsection