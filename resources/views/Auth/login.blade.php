@extends('Home.layout')
@section('title', 'Đăng Nhập')
@section('content')

    @include('Home.main')
    <div class="modal" style="display: flex;">

        <div class="modal__overlay">
               {{-- #lớP phủ màu đen trong suốt   --}}
            
        </div>
        <div class="modal__body">
             {{-- # login form   --}}
            <form action="{{ route('postLogin') }}" method="POST" class="auth-form">
                @csrf
                <div class="auth-form__container">    
                    {{-- #lớP chứa các thành phần riêng   --}}

                    <div class="auth-form__header">
                        <h3 class="auth-form__heading">Đăng Nhập</h3>
                        <a href="{{route('register')}}" style="text-decoration: none;" class="auth-form__switch-btn">Đăng Ký</a>
                    </div>

                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="email" name="email" class="auth-form__input" value="{{ old('email') }}" placeholder="Email của bạn" required>
                            @error('email')
                                <div class="text-danger">{{ $message}}</div>
                            @enderror

                        </div>
                        <div class="auth-form__group">
                            <input type="password" name="password" class="auth-form__input " placeholder="Nhập mật khẩu" required>
                             @error('password')
                                <div class="text-danger">{{ $message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="auth-form__aside">
                        <div class="auth-form__help">
                            <a href="#" class="auth-form__help-link auth-form__help-forgot">Quên Mật Khẩu</a>
                            <span class="auth-form__help-separate">
                                  {{-- tạo vavhj cách ngan   --}}
                            </span>
                            <a href="" class="auth-form__help-link ">Cần trợ giúp?</a>
                        </div>
                    </div>

                    <div class="auth-form__controls">
                        <a href="{{ route('index') }}" style="text-decoration: none;" class="btn auth-form__controls-back btn--normal">TRỞ LẠI</a>
                        <button type="submit" class="btn btn--primary ">Đăng Nhập</button>
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

        </div> 
    </div> 

@endsection