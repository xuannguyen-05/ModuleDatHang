@extends('Home.layout')
@section('title', 'Lịch sử đơn hàng')
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
            <div class="myorder_ContentNavabar">
                <ul class="myorder_ContentNavabar_list">
                    <li class="myorder_ContentNavabar_item">Tất cả</li>
                    <li class="myorder_ContentNavabar_item">Chờ xác nhận</li>
                    <li class="myorder_ContentNavabar_item">Vận chuyển</li>
                    <li class="myorder_ContentNavabar_item">Chờ giao hàng</li>
                    <li class="myorder_ContentNavabar_item">Hoàn thành</li>
                    <a href="{{route('index')}}" style="text-decoration: none;color: black"><li class="myorder_ContentNavabar_item">Home</li></a>

                </ul>
            </div>

            @if($orders->isEmpty())
                <div class="myorder_Content_product" style="text-align: center; padding: 40px; font-size: 1.1em;">
                    Bạn chưa có đơn hàng nào.
                </div>
            @else
                @foreach($orders as $order)
                    <div class="myorder_Content_product">
                            <div class="myorder_Content_productShipper">
                        <div class="myorder_Content_productShipper_status">
                            <i class="myorder_Content_productShippericon fa-solid fa-car-side"></i>
                            <span class="myorder_Content_productShipperName">
                                @if($order->status == 0)
                                    Chờ xử lý
                                @elseif($order->status == 1)
                                    Đang chuẩn bị hàng
                                @elseif($order->status == 2)
                                    Đang giao
                                @else
                                    Giao hàng thành công
                                @endif
                            </span>
                        </div>

                        <span class="myorder_Content_productShipper_Commet">ĐÁNH GIÁ</span>

                    </div>

                        @foreach($order->details as $detail)
                            {{-- Kiểm tra sản phẩm còn tồn tại không --}}
                            @if($detail->variant && $detail->variant->product)
                                @php
                                    $imgPath = $detail->variant->img_ulr;
                                    if (str_starts_with($imgPath, './')) {
                                        $imgPath = substr($imgPath, 2);
                                    } elseif (str_starts_with($imgPath, '/')) {
                                        $imgPath = substr($imgPath, 1);
                                    }
                                @endphp
                                <div class="myorder_Content_productContent">
                                    <div class="myorder_Content_productContentDecripsion">
                    
                                        <img src="{{ asset($imgPath) }}" alt="" class="myorder_Content_productContent_img">
                                        <div class="myorder_Content_productContent_decription">
                                            <span class="myorder_Content_productContent_title">{{ $detail->variant->product->productname }}</span>
                                            <span class="myorder_Content_productContent_classi">Phân Loại : {{ $detail->variant->color }}, {{ $detail->size }}</span>
                                            <span class="myorder_Content_productContent_quantity">x{{ $detail->quantity }}</span>
                                        </div>
                                    </div>

                                    <div class="myorder_Content_productContentPrice">
                                        <span class="myorder_Content_productContentPriceNew">{{ number_format($detail->unitprice * $detail->quantity) }}đ</span>
                                    </div>
                                </div>
                            @endif
                        @endforeach


                        <div class="myorder_Content_productPayBill">
                            <div class="myorder_Content_productPayBill_sum">
                                <span class="myorder_Content_productPayBill_name">Thành Tiền :</span>
                                <span class="myorder_Content_productPayBill_price">{{ number_format($order->totalamount) }}đ</span>
                            </div>

                            <div class="myorder_Content_productPayBill_btn">
                                <a href="{{ route('myOrderDetail', $order->order_id) }}"><button class="btn btn--primary myorder_Content_productPayBill_btnNew"> Xem chi tiết</button></a>
                                @if ($order->status == 3)
                                    <button class="btn btn--primary myorder_Content_productPayBill_btnNew"> Mua lại</button>
                                    <button class="btn btn--primary myorder_Content_productPayBill_btnNew"> Liên hệ người bán</button>
                                @endif
                            </div>
                        </div>

                    </div>
                @endforeach
            @endif

        </div>

       


    </div>
@endsection