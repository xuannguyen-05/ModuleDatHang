<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TonkhoTest extends TestCase
{
    use RefreshDatabase;
    //test: Không thể thêm vào giỏ hàng nếu số lượng mua hàng lớn hơn số lượng tồn kho
    
    public function test_ton_kho_khi_them_vao_gio_hang(){
        // Tạo user
        $user = User::factory()->create();
        
        // Tạo danh mục và sản phẩm
        $category = Category::create(['categoryname' => 'Test Category']);
        $product = Product::create([
            'productname' => 'Test Product',
            'category_id' => $category->category_id,
            'created_by' => $user->id,
            'update_by' => $user->id,
        ]);

        // Tạo biến thể với TỒN KHO LÀ 5
        $variant = ProductVariant::create([
            'product_id' => $product->product_id,
            'size' => 40,
            'color' => 'Red',
            'price' => 100000,
            'quantity' => 5,
        ]);

        // Đăng nhập
        $this->actingAs($user);

        //thêm 10 sản phẩm vào giỏ hàng
        $response = $this->post(route('cart.add'), [
            'variant_id' => $variant->variant_id,
            'size' => 40,
            'quantity' => 10,
        ]);

        //kiểm tra
        // Phải chuyển hướng quay lại (redirect back)
        $response->assertRedirect();
        
        // Phải có thông báo lỗi trong session (khớp với controller của bạn)
        $response->assertSessionHas('error', 'Số lượng sản phẩm trong kho không đủ!');

        //Bảng 'cart_details' có thêm bảng ghi mới không cơ sở dữ liệu phải trống
        $this->assertDatabaseCount('cart_details', 0);
    }
}

// php artisan test tests/Feature/TonkhoTest.php
