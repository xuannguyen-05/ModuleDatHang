@extends('Home.layout')
@section('title', 'Chi Tiết Sản Phẩm')

@section('content')
    <div class="productDeatil">
        @php
            $initialImgPath = $currentVariant->img_ulr;
            if (str_starts_with($initialImgPath, './')) {
                $initialImgPath = substr($initialImgPath, 2);
            } elseif (str_starts_with($initialImgPath, '/')) {
                $initialImgPath = substr($initialImgPath, 1);
            }
        @endphp
        <img src="{{ asset($initialImgPath) }}" alt="{{ $product->productname }}" class="productDeatil_img"
            id="mainProductImage">
        <form action="{{ route('cart.add') }}" method="POST" class="productDeatil_content">
            @csrf
            <input type="hidden" name="variant_id" id="selected_variant_id" value="{{ $currentVariant->variant_id }}">
            <input type="hidden" name="size" id="selected_size" value="{{ $currentVariant->size }}">
            <b class="productDeatil_name" id="productName">{{ $product->productname }}</b>

            <div class="productDeatil_commet">
                <div class="commet_start ">
                    <span class="commet_SoLuongStar">5</span>
                    <i class="home-product-item__start-gold fa-solid fa-star"></i>
                    <i class="home-product-item__start-gold fa-solid fa-star"></i>
                    <i class="home-product-item__start-gold fa-solid fa-star"></i>
                    <i class="home-product-item__start-gold fa-solid fa-star"></i>
                    <i class="home-product-item__start-gold fa-solid fa-star"></i>
                </div>
                <div class="commet_text">
                    <div class="commet_textSoLuong">23</div>
                    <span class="commet_text-DanhGia">Đánh Giá</span>
                </div>
            </div>

            <div class="productDeatil_price">
                <div class="productDeatil_priceNew" id="priceNew">{{ number_format($currentVariant->price) }}đ</div>
                <div class="productDeatil_priceOld" id="priceOld">{{ number_format($currentVariant->price * 1.12) }}đ</div>
                <div class="productDeatil_priceDiscount" id="priceDiscount">-12%</div>
            </div>

            <div class="productDeatil_color">
                <span class="productDeatil_color_name">Màu Sắc </span>
                <div class="productDeatil_colorBtn" id="colorOptions">
                    @foreach ($uniqueColors as $color)
                        <button type="button"
                            class="home-filter-btn btn btnsize color-btn {{ $color == $currentVariant->color ? 'btn--primary' : '' }}"
                            data-color="{{ $color }}">
                            {{ $color }}
                        </button>
                    @endforeach
                </div>
            </div>

            <div class="productDeatil_size">
                <span class="productDeatil_size_name">Size</span>
                <div class="productDeatil_sizeBtn" id="sizeOptions">
                    @foreach ($availableSizes as $size)
                        <button type="button"
                            class="home-filter-btn btn btnsize size-btn {{ $size == $currentVariant->size ? 'btn--primary' : '' }}"
                            data-size="{{ $size }}">
                            {{ $size }}
                        </button>
                    @endforeach
                </div>
            </div>

            {{--
            <div class="productDeatil_Stock" style="margin-top: 15px;">
                <span class="productDeatil_StockName">Tồn kho: </span>
                <span id="stockQuantity">{{ $currentVariant->quantity }}</span>
                <span> sản phẩm</span>
            </div> --}}

            <div class="productDeatil_Quantity">
                <span class="productDeatil_QuantityName">Số Lượng</span>

                <div class="productDeatil_soluong-input" style="display: flex; align-items: center;">
                    <button type="button" class=" btn--normal" onclick="decreaseQuantity()"
                        style="width: 30px; height: 30px; padding: 0;">-</button>
                    <input class="productDeatil_QuantityInt" type="number" name="quantity" value="1" min="1"
                        id="quantityInput" style="width: 50px; text-align: center; margin: 0 5px;">
                    <button type="button" class=" btn--normal" onclick="increaseQuantity()"
                        style="width: 30px; height: 30px; padding: 0;">+</button>
                </div>
                <input type="hidden" id="selected_quantity" value="1">
            </div>

            <div class="productDeatil_by">
                <a href="{{ route('index') }}" class="home-filter-btn btn productDeatil_by_btnnew">Quay Lại</a>

                <button type="submit" class="home-filter-btn btn productDeatil_by_btncart" id="addToCartButton">
                    <i class=" fa fa-shopping-cart" aria-hidden="true"></i>
                    Thêm Vào Giỏ Hàng
                </button>
                <button type="submit" name="buy_now" value="1" class="home-filter-btn btn productDeatil_by_btnnew"
                    id="buyNowButton">Mua Ngay</button>
            </div>

            <div id="availabilityMessage" style="color: red; margin-top: 10px; font-weight: bold; display: none;">
                Màu này đã hết hàng
            </div>

        </form>

    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
           
            const allVariants = @json($allVariants);
            const assetBaseUrl = "{{ asset('') }}";

            let selectedColor = '{{ $currentVariant->color }}';
            let selectedSize = {{ $currentVariant->size }};
            let currentStock = 0;

            const elements = {
                priceNew: document.getElementById('priceNew'),
                priceOld: document.getElementById('priceOld'),
                mainImage: document.getElementById('mainProductImage'),
                stockQuantity: document.getElementById('stockQuantity'),
                hiddenVariantId: document.getElementById('selected_variant_id'),
                hiddenSize: document.getElementById('selected_size'),

                // Nút bấm
                addToCartBtn: document.getElementById('addToCartButton'),
                buyNowBtn: document.getElementById('buyNowButton'), 
                // Input số lượng
                quantityInput: document.getElementById('quantityInput'),
                hiddenQuantity: document.getElementById('selected_quantity'),

                availabilityMsg: document.getElementById('availabilityMessage'),
                colorBtns: document.querySelectorAll('.color-btn'),
                sizeBtns: document.querySelectorAll('.size-btn')
            };

            function formatPrice(number) {
                return new Intl.NumberFormat('vi-VN').format(number);
            }

            function getCleanImagePath(path) {
                if (!path) return '';
                if (path.startsWith('./')) return path.substring(2);
                if (path.startsWith('/')) return path.substring(1);
                return path;
            }

            // --- HÀM KIỂM TRA SỐ LƯỢNG NHẬP VS TỒN KHO ---
            function checkQuantityLimit() {
                let inputVal = parseInt(elements.quantityInput.value);

                if (isNaN(inputVal) || inputVal < 1) {
                    inputVal = 1;
                    elements.quantityInput.value = 1;
                    elements.hiddenQuantity.value = 1;
                }

                //So sánh với tồn kho
                if (inputVal > currentStock) {
                    // Quá số lượng -> Khóa nút + Hiện thông báo
                    toggleButtons(false, `Số lượng tồn kho không đủ (Còn lại: ${currentStock})`);
                } else {
                    // Hợp lệ -> Mở nút
                    toggleButtons(true);
                }
            }

            // Hàm bật/tắt nút mua hàng
            function toggleButtons(enable, message = '') {
                if (enable) {
                    elements.addToCartBtn.disabled = false;
                    elements.addToCartBtn.classList.remove('btn--disabled');

                    elements.buyNowBtn.disabled = false;
                    elements.buyNowBtn.classList.remove('btn--disabled');

                    elements.availabilityMsg.style.display = 'none';
                } else {
                    elements.addToCartBtn.disabled = true;
                    elements.addToCartBtn.classList.add('btn--disabled');

                    elements.buyNowBtn.disabled = true;
                    elements.buyNowBtn.classList.add('btn--disabled');

                    elements.availabilityMsg.style.display = 'block';
                    elements.availabilityMsg.textContent = message;
                }
            }

            // --- CẬP NHẬT UI KHI CHỌN SIZE/MÀU ---
            function updateUI() {
                const foundVariant = allVariants.find(v => v.color == selectedColor && v.size == selectedSize);

                if (foundVariant) {
                    // Cập nhật biến tồn kho toàn cục
                    currentStock = foundVariant.quantity;

                    // Cập nhật các thông tin cơ bản
                    elements.hiddenVariantId.value = foundVariant.variant_id;
                    elements.hiddenSize.value = foundVariant.size;
                    elements.priceNew.textContent = formatPrice(foundVariant.price) + 'đ';
                    if (elements.priceOld) elements.priceOld.textContent = formatPrice(foundVariant.price * 1.12) +
                        'đ';
                    if (elements.stockQuantity) elements.stockQuantity.textContent = foundVariant.quantity;

                    if (foundVariant.img_ulr) {
                        elements.mainImage.src = assetBaseUrl + getCleanImagePath(foundVariant.img_ulr);
                    }

                    // Kiểm tra xem biến thể này có hàng không
                    if (currentStock > 0) {
                        // Có hàng -> Tiếp tục kiểm tra xem số lượng nhập có hợp lệ không
                        checkQuantityLimit();
                    } else {
                        // Hết hàng hẳn
                        toggleButtons(false, 'Sản phẩm tạm hết hàng');
                    }

                } else {
                    // Không tồn tại biến thể
                    currentStock = 0;
                    toggleButtons(false, `Màu ${selectedColor} không có Size ${selectedSize}`);
                }
            }

            // --- SỰ KIỆN CLICK ---

            // 1. Chọn Màu
            document.getElementById('colorOptions').addEventListener('click', function(e) {
                if (e.target.classList.contains('color-btn')) {
                    elements.colorBtns.forEach(btn => btn.classList.remove('btn--primary'));
                    e.target.classList.add('btn--primary');
                    selectedColor = e.target.dataset.color;
                    updateUI();
                }
            });

            // 2. Chọn Size
            document.getElementById('sizeOptions').addEventListener('click', function(e) {
                if (e.target.classList.contains('size-btn')) {
                    elements.sizeBtns.forEach(btn => btn.classList.remove('btn--primary'));
                    e.target.classList.add('btn--primary');
                    selectedSize = e.target.dataset.size;
                    updateUI();
                }
            });

            // 3. Xử lý Input nhập tay (Khi người dùng gõ phím)
            elements.quantityInput.addEventListener('input', function() {
                elements.hiddenQuantity.value = this.value;
                checkQuantityLimit(); // Kiểm tra ngay khi gõ
            });

            // 4. Xử lý nút Tăng/Giảm (+ -)
            // Lưu ý: Tôi gán sự kiện trực tiếp vào window để hàm onclick trong HTML gọi được
            window.decreaseQuantity = function() {
                let val = parseInt(elements.quantityInput.value);
                if (val > 1) {
                    val--;
                    elements.quantityInput.value = val;
                    elements.hiddenQuantity.value = val;
                    checkQuantityLimit(); // Kiểm tra lại sau khi giảm
                }
            }

            window.increaseQuantity = function() {
                let val = parseInt(elements.quantityInput.value);
                // Cho phép tăng, nhưng hàm checkQuantityLimit sẽ chặn nếu quá stock
                val++;
                elements.quantityInput.value = val;
                elements.hiddenQuantity.value = val;
                checkQuantityLimit(); // Kiểm tra lại sau khi tăng
            }

            // Chạy lần đầu
            updateUI();
        });
    </script>
@endpush