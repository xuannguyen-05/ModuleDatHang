<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>@yield('title', 'Shop Giày Dép')</title>
</head>
<body>
    <div class="app">
        <header class="header">
            <div class="grid">
                <nav class="header__navbar">
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item header__navbar-item--has-qr header__navbar-item--separete">
                            Liên hệ với đội ngũ của chúng Tôi
                            <div class="header__qr">
                                <img src="{{ asset('assets/img/maqr.png') }}" alt="QR code" class="header__qr-img">
                                <div class="header__qr-apps">
                                    <a href="#" class="header__qr-link">
                                        <img src="{{ asset('assets/img/apstore.png') }}" alt="Google Play" class="header__qr-download-img">
                                    </a>

                                    <a href="#" class="header__qr-link">
                                        <img src="{{ asset('assets/img/google.png') }}" alt="App Store" class="header__qr-download-img">
                                    </a>

                                </div>

                            </div>
                        </li>
                        <li class="header__navbar-item">
                            <span class="header__navbar-title--no-pointer">Kết nối</span>
                            <a href="" class="header__navbar-icon-link">
                                <i class=" Header__navbar-icon fa-brands fa-facebook"></i>
                            </a>

                            <a href="" class="header__navbar-icon-link">
                                <i class=" Header__navbar-icon fa-brands fa-instagram"></i>
                            </a>
                    
                        </li>
                    </ul>
    
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item header__navbar-item--has-notify">
                            <!-- vì khi trỏ vào thông báo sẽ xuất hiện link nên đưa vào thẻ a -->
                            <a href="" class="header__navbar-item-link">
                                <i class=" Header__navbar-icon far fa-bell"></i>
                                Thông báo
                            </a>
                            <div class="header__notify ">
                                <header class="header__notify--header">
                                    <h3>Thông Báo Mới Nhận</h3>
                                </header>
                                <ul class="header__notify--list">
                                    <li class="header__notify--item">
                                        <a href="#" class="header__notify--link">
                                            <img src="{{ asset('assets/img/sandan1.jpg') }}" alt="" class="header__notify--img">
                                            <div class="header__notify--info">
                                                <span class="header__notify--name">Sandal Nữ Thể Thao Tiện Lợi AG0329 </span>
                                                <span class="header__notify--descriotion">Với chất liệu da cao cấp, siêu êm mềm</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="header__notify--item">
                                        <a href="" class="header__notify--link">
                                            <img src="{{ asset('assets/img/sandanNui.jpg') }}" alt="" class="header__notify--img">
                                            <div class="header__notify--info">
                                                <span class="header__notify--name">Sale Giày Sandal lội suối đi dã ngoại Humtto Da SALE OFF 70% </span>
                                                <span class="header__notify--descriotion">Giá chỉ còn 375.000 (giá gốc: 1.250.000vnd). </span>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="header__notify--item">
                                        <a href="" class="header__notify--link header__notify--link--viewed">
                                            <img src="{{ asset('assets/img/giaythethao1.jpg') }}" alt="" class="header__notify--img">
                                            <div class="header__notify--info">
                                                <span class="header__notify--name">RUNF chính thức ra mắt dòng sản phẩm Giày thể thao siêu nhẹ RUNF </span>
                                                <span class="header__notify--descriotion"> Fabric kết hợp da cao cấp bền bỉ chắc chắn, đế cao su nguyên khối, gờ nổi tăng ma sát, chống trơn trượt, giày đi bộ thoải mái</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <footer class="header__notify-footer"> <!-- thẻ cuối cùng trong phầN thông báo -->
                                    <a href="" class="header__notify-footer--btn">Xem tất cả</a>

                                </footer>

                            </div>
                        </li>
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-item-link">
                                <i class=" Header__navbar-icon fa-solid fa-handshake-angle"></i>
                                Trợ giúp
                            </a>
                        </li>
                        @guest
                            <a style="text-decoration: none;" href="{{ route('register')}}"><li class="header__navbar-item header__navbar-item-bold header__navbar-item--separete">Đăng kí</li></a>
                            <a style="text-decoration: none;" href="{{ route('login')}}"><li class="header__navbar-item header__navbar-item-bold">Đăng nhập</li></a>
                        @endguest
                       
                        @auth

                            <li class="header__navbar-item header__navbar-user">
                                <img src="{{ asset('assets/img/avata.jpg') }}" alt="" class="header__navbar-user-img">
                                <span class="header__navbar-user-name">{{ auth()->User()->name}}</span>

                                <ul class="header__navbar-user-menu">
                                    <li class="header__navbar-user-menu-item">
                                        <a href="#">Tài khoản của tôi</a>
                                    </li>
                                    <li class="header__navbar-user-menu-item">
                                        <a href="#">Địa chỉ của tôi</a>
                                    </li>
                                    <li class="header__navbar-user-menu-item">
                                        <a href="{{route('myOrder')}}">Đơn mua</a>
                                    </li>
                                    <li class="header__navbar-user-menu-item header__navbar-user-menu-item--separate">
                                        <a href="{{ route('logout')}}">Đăng xuất</a>
                                    </li>
                                </ul>
                            </li>
                            
                        @endauth
                        


                    </ul>
                </nav>

                <!-- header with search -->
                <div class="header-with-search">
                    <div class="header__logo">
                        <a href="/" class="header__logo-link"><!-- href="/" tự trở về trang chủ -->
                            <!-- logo shoppe là dạng svg ảnh svg là ảnh theo dạng vector khi phóng to thu nhỏ không bị nhoè -->
                            <img src="/assets/img/logo-removebg-preview.png" alt="" class="logo_ShopGiay">
                        </a>
                    </div>

                    <div class="header__search">
                        <div class="header__search-input-wrap">
                            <input type="text" class="header__search-input" placeholder="Nhập để Tìm kiếm Sản Phẩm">
                            <!-- tạo lịch sử tìm kiếm thu nhỏ theo giao diên web -->
                            <div class="header__search-history">
                                <h3 class="header__search-history-heading">Lịch Sử Tìm Kiếm</h3>
                                <ul class="header__search-history-list">
                                    <li class="header__search-history-item">
                                        <a href="">Giày thể thao nam</a>
                                    </li>
                                    <li class="header__search-history-item">
                                        <a href="">Giày Sneaker</a>
                                    </li>
                                    <li class="header__search-history-item">
                                        <a href="">Dép sandnds nam nữ</a>
                                    </li>
                                </ul>

                            </div>

                        </div>
                        <div class="header__search-select">
                            <span class="header__search-select-lable">Trong shop</span>
                            <i class="header__search-select-icon fa-solid fa-chevron-down"></i>

                            <ul class="header__search-option">
                                <li class="header__search-option-item header__search-option-item--active">
                                    <span>Trong Shop</span>
                                    <i class="fa-solid fa-check"></i>
                                </li>

                                <li class="header__search-option-item">
                                    <span>Ngoài Shop</span>
                                   <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                </li>
                            </ul>
                        </div>
                        <button class="header__search-btn">
                            <i class=" header__search-btn-icon fa-solid fa-magnifying-glass"></i>
                        </button>

                    </div>

                   {{-- phần giỏ hàng --}}
                    <div class="header__cart">
                        <div class="header__cart-warp">
                            <i class="header__cart-icon fa fa-shopping-cart" aria-hidden="true"></i>
                            
                            <span class="header__cart-notice">{{ $global_cart_count ?? 0 }}</span>
    
                            <div class="header__cart-list {{ ($global_cart_count ?? 0) == 0 ? 'header__cart-list--no-cart' : '' }}">
                                

                                @if(($global_cart_count ?? 0) == 0)
                                    {{--hiển thị khi giỏ hàng trống --}}
                                    <img src="{{ asset('assets/img/no_cart.png') }}" alt="" class="header__cart-no-cart-img">
                                    <span class="header__cart-list--no-cart-msg">Chưa có sản phẩm</span>
                                @else
                                    {{--iển thị khi giỏ hàng có sản phẩm --}}
                                    <h4 class="header__cart-heading">Sản Phẩm Đã Thêm</h4> 
                                    <ul class="header__cart-list-item" id="mini-cart-list">
                                        
                                        {{-- Chỉ lặp khi $global_cart tồn tại và có chi tiết --}}
                                        @if($global_cart && $global_cart->details->isNotEmpty())
                                            @foreach($global_cart->details as $detail)
                                                
                                                @if($detail->variant && $detail->variant->product)
                                                    
                                                    @php
                                                        $imgPath = $detail->variant->img_ulr;
                                                        if (str_starts_with($imgPath, './')) {
                                                            $imgPath = substr($imgPath, 2);
                                                        } elseif (str_starts_with($imgPath, '/')) {
                                                            $imgPath = substr($imgPath, 1);
                                                        }
                                                    @endphp

                                                    <li class="header__cart-item" id="mini-cart-item-{{ $detail->cartdetail_id }}">
                                                        <img src="{{ asset($imgPath) }}" alt="{{ $detail->variant->product->productname }}" class="header__cart-img">
                                                        <div class="header__cart-item-info">
                                                            <div class="header__cart-item-head">
                                                                <h5 class="header__cart-item-name">{{ $detail->variant->product->productname }}</h5>
                                                                <div class="header__cart-item-price-wrap">
                                                                    <span class="header__cart-item-price">{{ number_format($detail->unitprice) }}đ</span>
                                                                    <span class="header__cart-item-toantu">x</span>
                                                                    <span class="header__cart-item-soluong">{{ $detail->quantity }}</span>
                                                                </div>
                                                            </div>

                                                            <div class="header__cart-item-body">
                                                                <span class="header__cart-item-decriptions">Phân loại : {{ $detail->size }}, {{ $detail->variant->color }}</span>
                                                                <a href="#" style="text-decoration: none;" class="header__cart-item-remove mini-cart-delete-btn" data-id="{{ $detail->cartdetail_id }}">Xoá</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endif
                                                
                                            @endforeach
                                        @endif

                                    </ul>

                                    <a href="{{ route('cartDetail') }}" class="header__cart-view-cart btn btn--primary">Xem giỏ hàng</a>
                                @endif
                            

                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </header>

        

        <div class="app__container">
            @yield('content')
        </div>

        <footer class="footer">
            <div class="grid">
                <div class="grid__row">
                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">Chăm sóc khách hàng</h3>
                        <ul class="footer__list">
                            <li class="footer__list-item">
                                <a href="" class="footer__list-item-link">Trung tâm trợ giúp</a>
                            </li>
                            <li class="footer__list-item">
                                <a href="" class="footer__list-item-link">Hướng dẫn mua hàng</a>
                            </li>
                            <li class="footer__list-item">
                                <a href="" class="footer__list-item-link">Chính sách bảo mật</a>
                            </li>
                        </ul>
                    </div>
                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">Giới thiệu</h3>
                        <ul class="footer__list">
                            <li class="footer__list-item">
                                <a href="" class="footer__list-item-link">Tuyển dụng</a>
                            </li>
                            <li class="footer__list-item">
                                <a href="" class="footer__list-item-link">Liên hệ với chúng tôi</a>
                            </li>
                            <li class="footer__list-item">
                                <a href="" class="footer__list-item-link">Tiếp thị liên kết</a>
                            </li>
                        </ul>
                    </div>
                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">Danh mục</h3>
                        <ul class="footer__list">
                            <li class="footer__list-item">
                                <a href="" class="footer__list-item-link">Sneaker nam</a>
                            </li>
                            <li class="footer__list-item">
                                <a href="" class="footer__list-item-link">Dép nam</a>
                            </li>
                            <li class="footer__list-item">
                                <a href="" class="footer__list-item-link">Giày da</a>
                            </li>
                            <li class="footer__list-item">
                                <a href="" class="footer__list-item-link">Sandal nữ</a>
                            </li>
                        </ul>
                    </div>
                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">Theo dõi</h3>
                        <ul class="footer__list">
                            <li class="footer__list-item">
                                <a href="" class="footer__list-item-link">
                                    <i class=" footer__list-item-icon fa-brands fa-facebook"></i>
                                    <span class="footer__list-item-link-name">Facebook</span>
                                </a>
                            </li>
                            <li class="footer__list-item">
                                <a href="" class="footer__list-item-link">
                                    <i class=" footer__list-item-icon fa-brands fa-instagram"></i>
                                    <span class="footer__list-item-link-name">Instagram</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">Vào cửa hàng trên ứng dụng</h3>
                        <div class="footer__down">
                            <img src="{{ asset('assets/img/maqr.png') }}" alt="" class="footer__down-qr">
                            <div class="footer__down-apps">
                                <a href="#" class="footer__down-apps-link">
                                    <img src="{{ asset('assets/img/google.png') }}" alt="" class="footer__down-apps-img">
                                </a>
                                <a href="#" class="footer__down-apps-link">
                                    <img src="{{ asset('assets/img/apstore.png') }}" alt="" class="footer__down-apps-img">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="footer__bottom">
                <div class="grid">
                    <div class="footer_text">© 2015 - Bản quyền thuộc về Sneaker Store</div>
                </div>
            </div>

        </footer>
    </div>

     <!-- modal layout  -->
    


    @stack('scripts')

    <script>
        // Chỉ chạy script này khi người dùng đã đăng nhập
        @auth
        document.addEventListener('DOMContentLoaded', function() {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
            // Lắng nghe sự kiện click trên TOÀN BỘ danh sách giỏ hàng
            const miniCartList = document.getElementById('mini-cart-list');
            if (miniCartList) {
                miniCartList.addEventListener('click', function(e) {
                    // Chỉ chạy nếu nhấn vào nút có class 'mini-cart-delete-btn'
                    if (e.target.classList.contains('mini-cart-delete-btn')) {
                        e.preventDefault();
                        
                        const button = e.target;
                        const cartDetailId = button.dataset.id;
                        
                        if (!confirm('Bạn có chắc muốn xóa sản phẩm này?')) {
                            return;
                        }

                        deleteMiniCartItem(cartDetailId, button);
                    }
                });
            }

            async function deleteMiniCartItem(cartDetailId, button) {
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
                        //Xóa hàng (li) khỏi giao diện
                        button.closest('.header__cart-item').remove();
                        
                        //Cập nhật số lượng trên icon
                        const cartNotice = document.querySelector('.header__cart-notice');
                        if (cartNotice) {
                            cartNotice.textContent = result.totalQuantity;
                        }

                        //Nếu giỏ hàng rỗng, thêm class no-cart
                        if (result.totalQuantity == 0) {
                            document.querySelector('.header__cart-list').classList.add('header__cart-list--no-cart');
                        }

                    } else {
                        alert(result.message || 'Lỗi xóa sản phẩm');
                    }

                } catch (error) {
                    console.error('Error deleting mini-cart item:', error);
                    alert('Không thể kết nối đến máy chủ.');
                }
            }
        });
        @endauth
    </script>
</body>

</html>