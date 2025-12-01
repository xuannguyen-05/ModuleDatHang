<div class="grid">
    <div class="grid__row app__content">

        <div class="grid__column-2">
            @if (isset($categories))
            <nav class="category">
                <h3 class="category__heading">
                    <i class="category__heading-icon fa-solid fa-list-ul"></i>
                    Danh Mục
                </h3>
                <ul class="category-list">
                    @foreach ($categories as $cat)
                    <li
                        class="category-item {{ isset($category) && $category->category_id == $cat->category_id ? 'category-item-active' : '' }}">
                        <a href="{{ route('category.show', $cat->category_id) }}" class="category-item__link">
                            {{ $cat->categoryname }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </nav>
            @endif
        </div>

        <div class="grid__column-10">

            <div class="home-filter">
                <span class="home-filter__label">Sắp xếp theo</span>
                <button class="home-filter-btn btn">Phổ biến</button>
                <button class="home-filter-btn btn btn--primary">Mới nhất</button>
                <button class="home-filter-btn btn">Bán chạy</button>

                <div class="select-input">
                    <span class="select-input__label">Giá</span>
                    <i class="select-input__icon fa-solid fa-chevron-down"></i>
                    <ul class="select-input__list">
                        <li class="select-input__item">
                            <a href="#" class="select-input__link">Giá : Thấp đến cao</a>
                        </li>
                        <li class="select-input__item">
                            <a href="#" class="select-input__link">Giá : Cao đến thấp</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="home-product">

                @if(isset($products) && $products->count() > 0)
                <div class="grid__row">
                    @foreach ($products as $product)

                    {{--ấy biến thể đại diện (rẻ nhất) để hiển thị ảnh và giá --}}
                    @php
                    $representVariant = $product->minPriceVariant;
                    @endphp

                    <div class="grid__column-2-4">
                        <a href="{{ route('productDetail', $product->product_id) }}" class="home-product-item-link">
                            <div class="home-product-item">

                               
                                <div class="home-product-item__img"
                                    style="background-image: url({{ asset($representVariant->img_ulr ?? 'assets/img/logo.png') }});">
                                </div>

                                <h4 class="home-product-item__name">{{ $product->productname }}</h4>

                                <div class="home-product-item__price">
                                    @if($representVariant)
                                    <span class="home-product-item__price-old">{{ number_format($representVariant->price
                                        * 1.2) }}đ</span>
                                    <span class="home-product-item__price-current">{{
                                        number_format($representVariant->price) }}đ</span>
                                    @else
                                    <span class="home-product-item__price-current">Liên hệ</span>
                                    @endif
                                </div>

                                <div class="home-product-item__action">
                                    <span class="home-product-item__like home-product-item__like--liked">
                                        <i class="home-product-item__like-icon-empty fa-regular fa-heart"></i>
                                        <i class="home-product-item__like-icon-fill fa-solid fa-heart"></i>
                                    </span>
                                    <div class="home-product-item__rating">
                                        <i class="home-product-item__start-gold fa-solid fa-star"></i>
                                        <i class="home-product-item__start-gold fa-solid fa-star"></i>
                                        <i class="home-product-item__start-gold fa-solid fa-star"></i>
                                        <i class="home-product-item__start-gold fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <span class="home-product-item__sold">88 đã bán</span>
                                </div>

                                <div class="home-product-item__origin">
                                    <span class="home-product-item__brand">Brand</span>
                                    <span class="home-product-item__origin-name">Việt Nam</span>
                                </div>

                                <div class="home-product-item__favourite">
                                    <i class="fa-solid fa-check"></i>
                                    <span>Yêu Thích</span>
                                </div>

                                <div class="home-product-item__sale-off">
                                    <span class="home-product-item__sale-off-percent">10%</span>
                                    <span class="home-product-item__sale-off-label">GIẢM</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>

                <ul class="panigation home-product__panigation">
                    <li class="panigation-item">
                        <a href="" class="panigation-item__link">
                            <i class="panigation-item__icon fa-solid fa-angle-left"></i>
                        </a>
                    </li>

                    <li class="panigation-item panigation-item__active">
                        <a href="" class="panigation-item__link">1</a>
                    </li>

                    <li class="panigation-item">
                        <a href="" class="panigation-item__link">2</a>
                    </li>

                    <li class="panigation-item">
                        <a href="" class="panigation-item__link">3</a>
                    </li>

                    <li class="panigation-item">
                        <a href="" class="panigation-item__link">4</a>
                    </li>

                    <li class="panigation-item">
                        <a href="" class="panigation-item__link">5</a>
                    </li>

                    <li class="panigation-item">
                        <a href="" class="panigation-item__link">...</a>
                    </li>

                    <li class="panigation-item">
                        <a href="" class="panigation-item__link">14</a>
                    </li>

                    <li class="panigation-item">
                        <a href="" class="panigation-item__link">
                            <i class="panigation-item__icon fa-solid fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                @else
                <div class="grid__row">
                    <p style="padding: 20px; font-size: 1.4rem;">Không tìm thấy sản phẩm nào.</p>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>