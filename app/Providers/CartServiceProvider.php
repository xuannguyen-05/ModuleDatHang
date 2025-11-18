<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // <-- Thêm View
use Illuminate\Support\Facades\Auth; // <-- Thêm Auth
use App\Models\Cart; // <-- Thêm Model Cart

class CartServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        //sử dụng View::composer để chia sẻ biến với 1 view cụ thể
        //chia sẻ nó với 'Home.layout'
        View::composer('Home.layout', function ($view) {
            
            $global_cart = null;
            $cart_count = 0;

            //Chỉ lấy giỏ hàng nếu người dùng đã đăng nhập
            if (Auth::check()) {
                $user = Auth::user();
                
                // Lấy giỏ hàngvà tất cả chi tiết
                $global_cart = $user->cart()->with('details.variant.product')->first(); // Chỉ lấy 1 giỏ hàng

                if ($global_cart) {
                    $cart_count = $global_cart->details->sum('quantity');
                }
            }

            //chia sẻ 2 biến này cho 'Home.layout.blade.php'
            $view->with('global_cart', $global_cart);
            $view->with('global_cart_count', $cart_count);
        });
    }
}