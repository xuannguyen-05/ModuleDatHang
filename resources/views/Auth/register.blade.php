@extends('Home.layout')
@section('title', 'Đăng ký')
@section('content')

    @include('Home.main')
    <div class="modal" style="display: flex;">

        <div class="modal__overlay">
               {{-- #lớP phủ màu đen trong suốt   --}}
            
        </div>
        <div class="modal__body" >
             {{-- # authen form  --}}
            @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <form action="{{ route('posrtRegister')}}" method="POST" class="auth-form" novalidate>
                @csrf
                <div class="auth-form__container"> 
                      {{-- #lớP chứa các thành phần riêng  --}}

                    <div class="auth-form__header">
                        <h3 class="auth-form__hea--ding">Đăng Kí</h3>
                        <a href="{{route('login')}}" style="text-decoration: none;" class="auth-form__switch-btn">Đăng Nhập</a>
                    </div>
                    
                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="text" name="name" class="auth-form__input" value="{{ old('name') }}" placeholder="UserName" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="auth-form__group">
                            <input type="email" name="email" class="auth-form__input" value="{{ old('email') }}" placeholder="Email của bạn" required>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="auth-form__group">
                            <input type="password" name="password" class="auth-form__input " placeholder="Nhập mật khẩu" required>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="auth-form__group">
                            <input type="password" name="password_confirmation" class="auth-form__input " placeholder="Nhập lại mật khẩu" required>
                            @error('password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="auth-form__aside">
                        <p class="auth-form__policy-text">
                            Bằng việc đăng ký bạn đã đồng ý với shop về
                            <a href="#" class="auth-form__text-link">Điều khoản dịch vụ </a> &
                            <a href="#" class="auth-form__text-link">Chính sách bảo mật</a>
                        </p>
                    </div>

                    <div class="auth-form__controls">
                        <a href="{{ route('index') }}" style="text-decoration: none;" class="btn auth-form__controls-back btn--normal">TRỞ LẠI</a>
                        <button type="submit" class="btn btn--primary ">ĐĂNG KÍ</button>
                    </div>

                </div>

                <div class="auth-form__social">
                    <a href="" class="  btn btn--size-s btn--with-icon auth-form__social-facebook">
                        <i class="auth-form__social-icon fa-brands fa-square-facebook"></i>
                        <span class="auth-form__social-title">
                            Kết nối với Facebook
                        </span>
                    </a>

                    <a href="" class="btn btn--size-s btn--with-icon auth-form__social-google">
                        <i class="auth-form__social-icon fa-brands fa-google"></i>
                        <span class="auth-form__social-title">
                            Kết nối với Google
                        </span>
                        
                    </a>
                </div>

            </form> 

             # login form  

            {{-- <div class="auth-form">
                <div class="auth-form__container">    #lớP chứa các thành phần riêng  

                    <div class="auth-form__header">
                        <h3 class="auth-form__heading">Đăng Nhập</h3>
                        <span class="auth-form__switch-btn">Đăng Ký</span>
                    </div>

                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="text" class="auth-form__input" placeholder="Email của bạn">
                              #placeholder tạo ra chữ chò ở thẻ input  
                        </div>
                        <div class="auth-form__group">
                            <input type="text" class="auth-form__input " placeholder="Nhập mật khẩu">
                        </div>
                    </div>

                    <div class="auth-form__aside">
                        <div class="auth-form__help">
                            <a href="" class="auth-form__help-link auth-form__help-forgot">Quên Mật Khẩu</a>
                            <span class="auth-form__help-separate">
                                  tạo vavhj cách ngan  
                            </span>
                            <a href="" class="auth-form__help-link ">Cần trợ giúp?</a>
                        </div>
                    </div>

                    <div class="auth-form__controls">
                        <button class="btn auth-form__controls-back btn--normal">TRỞ LẠI</button>
                        <button class="btn btn--primary ">ĐĂNG Nhập</button>
                    </div>

                </div>

                <div class="auth-form__social">
                    <a href="" class="  btn btn--size-s btn--with-icon auth-form__social-facebook">
                        <i class="auth-form__social-icon fa-brands fa-square-facebook"></i>
                        <span class="auth-form__social-title">
                            Kết nối với Facebook
                        </span>
                    </a>

                    <a href="" class="btn btn--size-s btn--with-icon auth-form__social-google">
                        <i class="auth-form__social-icon fa-brands fa-google"></i>
                        <span class="auth-form__social-title">
                            Kết nối với Google
                        </span>
                        
                    </a>
                </div>

            </div>  --}}

        </div> 
    </div> 

@endsection