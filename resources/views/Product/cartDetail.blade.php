@extends('Home.layout')
@section('title', 'Chi tiết giỏ Hàng')
@section('content')
    <div class="cartDetailTitle">
        <i class="cartDetailTitleIcon fa fa-shopping-cart" aria-hidden="true"></i>
        <span class="cartDetailName">Giỏ Hàng Của Bạn </span>
    </div>

    @if($cart && $cart->details->isNotEmpty())
        
        <div class="cartDetailTitleName">
            <div class="cartDetailProduct">
                <span class="cartDetailProduct1">Sản Phẩm</span>
            </div>
            
            <div class="cartDetail_content">
                <span class="cartDetail_content5"></span>
                <span class="cartDetail_content5">Đơn Giá</span>
                <span class="cartDetail_content5">Số Lượng </span>
                <span class="cartDetail_content5">Số Tiền</span>
                <span class="cartDetail_content5">Thao Tác</span>
            </div>
        </div>

        @php
            $totalAmount = 0; //khởi tạo biến tổng tiền
        @endphp

        <div id="cart-item-list">
            @foreach($cart->details as $detail)
                {{--chỉ hiển thị nếu sản phẩm còn tồn tại --}}
                @if($detail->variant && $detail->variant->product)
                    
                    @php
                        $itemTotal = $detail->unitprice * $detail->quantity;
                        $totalAmount += $itemTotal;
                        $imgPath = $detail->variant->img_ulr;
                        if (str_starts_with($imgPath, './')) {
                            $imgPath = substr($imgPath, 2);
                        } elseif (str_starts_with($imgPath, '/')) {
                            $imgPath = substr($imgPath, 1);
                        }
                    @endphp

                    <div class="cartDetail" id="cart-item-{{ $detail->cartdetail_id }}">
                        <div class="cartDetailProduct">
                            <div class="cartDetailProduct_img" style="background-image: url({{ asset($imgPath) }});"></div>
                            <span class="cartDetailProductName">{{ $detail->variant->product->productname }}</span>
                        </div>
                        <div class="cartDetail_content">
                            <div class="cartDetail_content5 cartDetail_PhanLoai">
                                <span class="cartDetail_PhanLoaiName">Phân Loại :</span>
                                <span class="cartDetail_PhanLoaiMota">{{ $detail->variant->color }}, {{ $detail->size }}</span>
                            </div>
                    
                            <div class="cartDetail_content5 cartDetail_price" data-price="{{ $detail->unitprice }}">{{ number_format($detail->unitprice) }}đ</div>
                    
                            <div class="cartDetail_content5 cartDetail_quantity">
                                <input class="productDeatil_QuantityInt quantity-input" 
                                       type="number" 
                                       value="{{ $detail->quantity }}" 
                                       min="1" 
                                       max="{{ $detail->variant->quantity }}" 
                                       data-id="{{ $detail->cartdetail_id }}">
                            </div>
                    
                            <div class="cartDetail_content5 cartDetail_sumprice" id="item-subtotal-{{ $detail->cartdetail_id }}">{{ number_format($itemTotal) }}đ</div>
                    
                            <div class="cartDetail_content5 cartDetaiProductDelete">
                                <button style="background-color: #d5d5d5;" type="button" class="cartDetaiProductDelete_btn delete-item-btn" data-id="{{ $detail->cartdetail_id }}">Xoá</button>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="cartDetailend">
            <div class="cartDetailend_MuaHang">
                <span class="cartDetailend_MuaHang_quantity" id="grand-total-quantity">Tổng Cộng ({{ $cart->details->sum('quantity') }} Sản Phẩm):</span>
                <span class="cartDetailend_MuaHangPrice" id="grand-total-price">{{ number_format($totalAmount) }}đ</span>
                <a href="{{ route('checkout.show') }}" class="home-filter-btn btn cartDetailend_MuaHangBtn">Mua Hàng</a>
            </div>
        </div>

    @else
        {{--hiển thị nếu giỏ hàng trống --}}
        <div class="cartDetail" style="text-align: center;padding: 50px;height: 100%;display: block;">
            <img src="{{ asset('assets/img/no_cart.png') }}" alt="Giỏ hàng rỗng" style="width: 291px;height: 150px;">
            <p style="margin-top: 20px; font-size: 1.2em;">Giỏ hàng của bạn đang trống</p>
            <a href="{{ route('index') }}" class="home-filter-btn btn btn--primary" style="margin-top: 20px;">Quay lại Trang chủ</a>
        </div>
    @endif

@endsection


@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        //Lấy token CSRF từ thẻ meta (nếu có) hoặc tự thêm vào
        const csrfToken = '{{ csrf_token() }}';

        function formatPrice(number) {
            return new Intl.NumberFormat('vi-VN').format(number);
        }

        //hàm Debounce Chờ người dùng gõ xong rồi mới gửi request
        function debounce(func, delay) {
            let timeout;
            return function(...args) {
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(this, args), delay);
            };
        }

        //tính toán lại tổng tiền toàn bộ giỏ hàng
        function recalculateGrandTotal() {
            let totalQuantity = 0;
            let totalPrice = 0;

            document.querySelectorAll('#cart-item-list .cartDetail').forEach(itemRow => {
                const quantityInput = itemRow.querySelector('.quantity-input');
                const priceEl = itemRow.querySelector('.cartDetail_price');
                
                if (quantityInput && priceEl) {
                    const quantity = parseInt(quantityInput.value, 10);
                    const price = parseFloat(priceEl.dataset.price);
                    
                    totalQuantity += quantity;
                    totalPrice += (quantity * price);
                }
            });

            //Cập nhật giao diện tổng tiền
            const grandTotalQtyEl = document.getElementById('grand-total-quantity');
            const grandTotalPriceEl = document.getElementById('grand-total-price');
            
            if (grandTotalQtyEl) {
                grandTotalQtyEl.textContent = `Tổng Cộng (${totalQuantity} Sản Phẩm):`;
            }
            if (grandTotalPriceEl) {
                grandTotalPriceEl.textContent = formatPrice(totalPrice) + 'đ';
            }


            //nếu giỏ hàng rỗng, hiển thị thông báo
            if (totalQuantity === 0) {
                document.getElementById('cart-item-list').innerHTML = `
                    <div class="cartDetail" style="text-align: center; padding: 50px;">
                        <img src="{{ asset('assets/img/no_cart.png') }}" alt="Giỏ hàng rỗng" style="width: 150px; opacity: 0.7;">
                        <p style="margin-top: 20px; font-size: 1.2em;">Giỏ hàng của bạn đang trống</p>
                        <a href="#" class="home-filter-btn btn btn--primary" style="margin-top: 20px;">Quay lại Trang chủ</a>
                    </div>
                `;
                //Ẩn tiêu đề và thanh toán
                const cartEndEl = document.querySelector('.cartDetailend');
                const cartTitleNameEl = document.querySelector('.cartDetailTitleName');
                if (cartEndEl) cartEndEl.style.display = 'none';
                if (cartTitleNameEl) cartTitleNameEl.style.display = 'none';
            }
        }

        //Hàm gửi request cập nhật số lượng
        async function updateCartQuantity(cartDetailId, newQuantity) {
            try {
                const response = await fetch(`/cart/update/${cartDetailId}`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        quantity: newQuantity
                    })
                });

                const result = await response.json();

                if (response.ok && result.success) {
                    //Cập nhật lại tổng tiền (do server trả về)
                    document.getElementById('grand-total-quantity').textContent = `Tổng Cộng (${result.totalQuantity} Sản Phẩm):`;
                    document.getElementById('grand-total-price').textContent = formatPrice(result.totalPrice) + 'đ';
                    
                    //cập nhật lại số lượng trên header (Nếu có)
                    const cartNotice = document.querySelector('.header__cart-notice');
                    if(cartNotice) {
                        cartNotice.textContent = result.totalQuantity;
                    }

                } else {
                    alert(result.message || 'Lỗi cập nhật giỏ hàng');
                }

            } catch (error) {
                console.error('Error updating cart:', error);
                alert('Không thể kết nối đến máy chủ.');
            }
        }
        
        //hàm gửi request xóa sản phẩm
        async function deleteCartItem(cartDetailId) {
            if (!confirm('Bạn có chắc muốn xóa sản phẩm này?')) {
                return;
            }

            try {
                const response = await fetch(`/cart/remove/${cartDetailId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    }
                });

                const result = await response.json();

                if (response.ok && result.success) {
                    //xóa hàng đó khỏi giao diện
                    document.getElementById(`cart-item-${cartDetailId}`).remove();
                    //tính toán lại tổng tiền
                    recalculateGrandTotal(); 

                    const totalQuantity = Array.from(document.querySelectorAll('.quantity-input')).reduce((sum, input) => sum + parseInt(input.value, 10), 0);
                    const cartNotice = document.querySelector('.header__cart-notice');
                    if(cartNotice) {
                        cartNotice.textContent = totalQuantity;
                    }

                } else {
                    alert(result.message || 'Lỗi xóa sản phẩm');
                }

            } catch (error) {
                console.error('Error deleting item:', error);
                alert('Không thể kết nối đến máy chủ.');
            }
        }

        const debouncedUpdate = debounce(updateCartQuantity, 500); 

        //gán sự kiện cho các ô input số lượng
        document.querySelectorAll('.quantity-input').forEach(input => {
            input.addEventListener('input', function() {
                const id = this.dataset.id;
                let newQuantity = parseInt(this.value, 10);
                const maxQuantity = parseInt(this.max, 10);

                if (newQuantity > maxQuantity) {
                    alert(`Số lượng tồn kho không đủ (chỉ còn ${maxQuantity})`);
                    this.value = maxQuantity;
                    newQuantity = maxQuantity;
                }
                
                if (newQuantity < 1) {
                    this.value = 1;
                    newQuantity = 1;
                }

                // Cập nhật tổng tiền của HÀNG này tạm thời
                const price = parseFloat(this.closest('.cartDetail_content').querySelector('.cartDetail_price').dataset.price);
                const subtotalEl = document.getElementById(`item-subtotal-${id}`);
                subtotalEl.textContent = formatPrice(newQuantity * price) + 'đ';

                //tính toán lại tổng tiền tạm thời
                recalculateGrandTotal();

                //gửi request đến server
                debouncedUpdate(id, newQuantity);
            });
        });

        //gán sự kiện cho các nút Xóa
        document.querySelectorAll('.delete-item-btn').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
                deleteCartItem(id);
            });
        });

    });
</script>
@endpush