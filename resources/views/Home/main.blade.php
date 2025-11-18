<!-- thết kế phần container theo chuẩn 12 colums -->
    <div class="grid">
        <div class="grid__row app__content">
            <div class="grid__column-2">
                @if(isset($categories))
                    <nav class="category">
                        <h3 class="category__heading">
                            <i class="category__heading-icon fa-solid fa-list-ul"></i>
                            Danh Mục
                        </h3>
                        <ul class="category-list">
                            @foreach ( $categories as $cat)
                                <li class="category-item {{ isset($category) && $category->category_id == $cat->category_id ? 'category-item-active' : '' }}">
                                    <a href="{{ route('category.show', $cat->category_id ) }}" class="category-item__link">
                                        {{ $cat->categoryname }}
                                    </a>
                                </li>
                            @endforeach
                            {{-- <li class="category-item category-item-active">
                                <a href="" class="category-item__link">Giày thể thao</a>
                            </li>
                            <li class="category-item">
                                <a href="" class="category-item__link">Giày Sandal</a>
                            </li>
                            <li class="category-item">
                                <a href="" class="category-item__link">Dép nam</a>
                            </li> --}}
                        </ul>
                    </nav>
                @endif
            </div>

            @if(isset($variants))
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


                        <div class="home-filter__page">
                            <span class="home-filter__page-num">
                                <span class="home-filter__page-current">1</span>/14
                            </span>

                            <div class="home-filter__page-control">
                                <a href="" class="home-filter__page-btn">
                                    <i class="home-filter__page-icon fa-solid fa-chevron-left"></i>
                                </a>

                                <a href="" class="home-filter__page-btn">
                                    <i class="home-filter__page-icon fa-solid fa-chevron-right"></i>
                                </a>
                            </div>

                        </div>

                    </div>

                    <div class="home-product ">
                        <!-- grid->grown->colum -->
                        <!-- Mỗi sản phẩm tương ứng với 2 cột nên dùng .grid__column-2
                                    mà muốn dùng nó phải để nó trong trình tự thẻ grid->grown->colum -->
                        <div class="grid__row">
                            @foreach ($variants as $variant)
                                <div class="grid__column-2-4">
                                    <!-- product item -->
                                    <a href="{{ route('productDetail', $variant->variant_id) }}" class="home-product-item-link">
                                        <div class="home-product-item">
                                            <!-- dùng thẻ dĩ để chứa hình ảnh khi sử dụng background image tì phải dùng ulr
                                                        sau này bacnkend sẽ đổ giá trị lấy hình ảnh sane phẩm vào style inline để hiển thị hình ảnh sản phẩm
                                                        và dễ dàng chỉnh kích thước ảnh dù ảnh có lớn hay nhỏ -->
                                            <div class="home-product-item__img"
                                                style="background-image: url({{asset($variant->img_ulr)}});"></div>
                                            <h4 class="home-product-item__name">{{ $variant->product->productname }}
                                            </h4>

                                            <div class="home-product-item__price">
                                                <span class="home-product-item__price-old">{{ number_format($variant->price * 1.12) }}đ</span>
                                                <span class="home-product-item__price-current">{{ number_format($variant->price) }}đ</span>
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
                                                <span class="home-product-item__sold">112 đã bán</span>

                                            </div>

                                            <div class="home-product-item__origin">
                                                <span class="home-product-item__brand">CR7</span>
                                                <span class="home-product-item__origin-name">Trung Quốc</span>
                                            </div>

                                            <div class="home-product-item__favourite">
                                                <i class="fa-solid fa-check"></i>
                                                <span>Yêu Thích</span>
                                            </div>

                                            <div class="home-product-item__sale-off">
                                                <span class="home-product-item__sale-off-percent">12%</span>
                                                <span class="home-product-item__sale-off-label">GIẢM</span>

                                            </div>

                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            

                        </div>
                    </div>

                    <!-- làm phần phân trang -->
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
                </div>
            @endif

        </div>
    </div>