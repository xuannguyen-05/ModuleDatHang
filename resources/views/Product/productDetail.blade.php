@extends('Home.layout')
@section('title','Chi Tiết Sản Phẩm')
    
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
        <img src="{{ asset($initialImgPath) }}" alt="{{ $product->productname }}" class="productDeatil_img" id="mainProductImage">
        <form action="{{route('cart.add')}}" method="POST" class="productDeatil_content">
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
                    @foreach($uniqueColors as $color)
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
                    @foreach($availableSizes as $size)
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
                <input class="productDeatil_QuantityInt" type="number" name="quantity" value="1" min="1" max="100">
            </div>

            <div class="productDeatil_by">
                <a href="{{ route('index') }}" class="home-filter-btn btn productDeatil_by_btnnew">Quay Lại</a>

                <button type="submit" class="home-filter-btn btn productDeatil_by_btncart" id="addToCartButton">
                    <i class=" fa fa-shopping-cart" aria-hidden="true"></i>
                    Thêm Vào Giỏ Hàng
                </button>
                <button type="submit" name="buy_now" value="1" class="home-filter-btn btn productDeatil_by_btnnew">Mua Ngay</button>
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
        
        // Trạng thái hiện tại
        let selectedColor = '{{ $currentVariant->color }}';
        // Mặc định chọn size đầu tiên
        let selectedSize = {{ $currentVariant->size }}; 

        const priceNewEl = document.getElementById('priceNew');
        const priceOldEl = document.getElementById('priceOld');
        const mainImageEl = document.getElementById('mainProductImage');
        
        const stockQuantityEl = document.getElementById('stockQuantity');
        const hiddenVariantIdEl = document.getElementById('selected_variant_id');
        const hiddenSizeEl = document.getElementById('selected_size');
        const addToCartButton = document.getElementById('addToCartButton');
        const availabilityMessage = document.getElementById('availabilityMessage');

        function formatPrice(number) {
            return new Intl.NumberFormat('vi-VN').format(number);
        }

        //Hàm cập nhật khi CHỌN MÀU
        function updateOnColorChange(color) {
            selectedColor = color;
            
            const foundVariant = allVariants.find(variant => variant.color === color);
            
            if (foundVariant) {
                // Cập nhật giá, ảnh, và tồn kho
                priceNewEl.textContent = formatPrice(foundVariant.price) + 'đ';
                priceOldEl.textContent = formatPrice(foundVariant.price * 1.12) + 'đ';

                if (stockQuantityEl) {
                    stockQuantityEl.textContent = foundVariant.quantity;
                }
                
                const assetBase = '{{ asset('') }}'; 
                let imgPath = foundVariant.img_ulr; 

                if (imgPath.startsWith('./')) {
                    imgPath = imgPath.substring(2);
                } else if (imgPath.startsWith('/')) {
                    imgPath = imgPath.substring(1);
                }
                
                mainImageEl.src = assetBase  + imgPath; 

                hiddenVariantIdEl.value = foundVariant.variant_id;

                // Kiểm tra tồn kho của MÀU này
                if (foundVariant.quantity > 0) {
                    addToCartButton.disabled = false;
                    availabilityMessage.style.display = 'none';
                } else {
                    addToCartButton.disabled = true;
                    availabilityMessage.style.display = 'block';
                }
            }
            // Cập nhật hidden input của size (vì size có thể chưa được chọn lại)
            updateOnSizeChange(selectedSize);
        }

        //hàm cập nhật khi CHỌN SIZE
        function updateOnSizeChange(size) {
            selectedSize = size;
            
            //Chỉ cần cập nhật hidden input
            hiddenSizeEl.value = selectedSize;
        }

        //gán sự kiện click cho các nút MÀU
        document.getElementById('colorOptions').addEventListener('click', function(e) {
            if (e.target.classList.contains('color-btn')) {
                const color = e.target.dataset.color;
                
                // Bỏ active tất cả
                document.querySelectorAll('.color-btn').forEach(btn => btn.classList.remove('btn--primary'));
                e.target.classList.add('btn--primary');
                updateOnColorChange(color);
            }
        });

        // Gán sự kiện click cho các nút SIZE
        document.getElementById('sizeOptions').addEventListener('click', function(e) {
            if (e.target.classList.contains('size-btn')) {
                const size = e.target.dataset.size;
                
                // Bỏ active tất cả
                document.querySelectorAll('.size-btn').forEach(btn => btn.classList.remove('btn--primary'));
                // Active nút được click
                e.target.classList.add('btn--primary');

                // Gọi hàm cập nhật SIZE
                updateOnSizeChange(size);
            }
        });
    }); 
</script>
@endpush