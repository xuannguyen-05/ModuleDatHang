<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductVariantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_variants')->insert([
            [
                'product_id'=>1,
                'size'=>33,
                'color'=>'Trắng cam',
                'price'=>390.000,
                'img_ulr'=>'./assets/img/bd1trangcam.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>1,
                'size'=>33,
                'color'=>'Xám hồng',
                'price'=>470.000,
                'img_ulr'=>'./assets/img/bd1xamhong.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>2,
                'size'=>33,
                'color'=>'Trắng đen',
                'price'=>147.550,
                'img_ulr'=>'./assets/img/bd2trangden.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>2,
                'size'=>33,
                'color'=>'Xanh trắng',
                'price'=>150.000,
                'img_ulr'=>'./assets/img/bd2xanhtrang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>3,
                'size'=>33,
                'color'=>'Xanh ngọc',
                'price'=>109.000,
                'img_ulr'=>'./assets/img/bd3xanhngoc.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>3,
                'size'=>33,
                'color'=>'Nhám vàng',
                'price'=>150.000,
                'img_ulr'=>'./assets/img/bd3nhamvang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>4,
                'size'=>33,
                'color'=>'Trắng đen',
                'price'=>420.000,
                'img_ulr'=>'./assets/img/bd4trangden.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>4,
                'size'=>33,
                'color'=>'Full trắng',
                'price'=>390.000,
                'img_ulr'=>'./assets/img/bd4fulltrang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>5,
                'size'=>33,
                'color'=>'Xanh ngọc',
                'price'=>316.000,
                'img_ulr'=>'./assets/img/bd5xanhngoc.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>5,
                'size'=>33,
                'color'=>'Xanh lá',
                'price'=>330.000,
                'img_ulr'=>'./assets/img/bd5xanhla.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>6,
                'size'=>33,
                'color'=>'Xanh hồng',
                'price'=>330.000,
                'img_ulr'=>'./assets/img/bd6.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>7,
                'size'=>33,
                'color'=>'Xanh Paster',
                'price'=>249.600,
                'img_ulr'=>'./assets/img/bd7xanhpaster.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>7,
                'size'=>33,
                'color'=>'Vàng',
                'price'=>300.000,
                'img_ulr'=>'./assets/img/bd7vang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>8,
                'size'=>33,
                'color'=>'Ngọc chuối',
                'price'=>135.000,
                'img_ulr'=>'./assets/img/bd8ngocchuoi.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>8,
                'size'=>33,
                'color'=>'Hồng trắng',
                'price'=>170.000,
                'img_ulr'=>'./assets/img/bd8hongtrang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>9,
                'size'=>33,
                'color'=>'Trắng',
                'price'=>153.000,
                'img_ulr'=>'./assets/img/bd9trang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>9,
                'size'=>33,
                'color'=>'Bạc',
                'price'=>142.000,
                'img_ulr'=>'./assets/img/bd9bac.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>10,
                'size'=>33,
                'color'=>'Trắng xanh',
                'price'=>137.000,
                'img_ulr'=>'./assets/img/bd10xanh.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>10,
                'size'=>33,
                'color'=>'Trắng vàng',
                'price'=>150.000,
                'img_ulr'=>'./assets/img/bd10vang.jpg',
                'quantity'=>30
            ],

            // sandal
            [
                'product_id'=>11,
                'size'=>33,
                'color'=>'Đen',
                'price'=>118.000,
                'img_ulr'=>'./assets/img/sd1den.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>11,
                'size'=>33,
                'color'=>'Đen trắng',
                'price'=>124.000,
                'img_ulr'=>'./assets/img/sd1dentrang.jpg',
                'quantity'=>30
            ],

            [
                'product_id'=>12,
                'size'=>33,
                'color'=>'Đen trắng',
                'price'=>207.000,
                'img_ulr'=>'./assets/img/sd2dentrang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>12,
                'size'=>33,
                'color'=>'Đen full',
                'price'=>220.000,
                'img_ulr'=>'./assets/img/sd2den.jpg',
                'quantity'=>30
            ],

            [
                'product_id'=>13,
                'size'=>33,
                'color'=>'Ghi xám',
                'price'=>99.000,
                'img_ulr'=>'./assets/img/sd3ghixam.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>13,
                'size'=>33,
                'color'=>'Xanh đen',
                'price'=>105.000,
                'img_ulr'=>'./assets/img/sd3xanhden.jpg',
                'quantity'=>30
            ],

            // sanhdn4 14
            [
                'product_id'=>14,
                'size'=>33,
                'color'=>'xám full',
                'price'=>115.000,
                'img_ulr'=>'./assets/img/sd4xamfull.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>14,
                'size'=>33,
                'color'=>'Xám đen',
                'price'=>135.000,
                'img_ulr'=>'./assets/img/sd4xamden.jpg',
                'quantity'=>30
            ],

            // sandanl 5 15
            [
                'product_id'=>15,
                'size'=>33,
                'color'=>'Đế đen',
                'price'=>100.000,
                'img_ulr'=>'./assets/img/sd5deden.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>15,
                'size'=>33,
                'color'=>'Đế trắng',
                'price'=>110.000,
                'img_ulr'=>'./assets/img/sd5detrang.jpg',
                'quantity'=>30
            ],

            // sanhdan6 16
            [
                'product_id'=>16,
                'size'=>33,
                'color'=>'Xanh',
                'price'=>138.000,
                'img_ulr'=>'./assets/img/sd6xanh.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>16,
                'size'=>33,
                'color'=>'Kem',
                'price'=>147.000,
                'img_ulr'=>'./assets/img/sd6kem.jpg',
                'quantity'=>30
            ],

            // sanhdan7 17
            [
                'product_id'=>17,
                'size'=>33,
                'color'=>'Nâu',
                'price'=>222.000,
                'img_ulr'=>'./assets/img/sd7nau.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>17,
                'size'=>33,
                'color'=>'Xanh navy',
                'price'=>235.000,
                'img_ulr'=>'./assets/img/sd7navy.jpg',
                'quantity'=>30
            ],

            // sanhdan8 18
            [
                'product_id'=>18,
                'size'=>33,
                'color'=>'Be',
                'price'=>105.000,
                'img_ulr'=>'./assets/img/sd8be.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>18,
                'size'=>33,
                'color'=>'Đen',
                'price'=>110.000,
                'img_ulr'=>'./assets/img/sd8den.jpg',
                'quantity'=>30
            ],

            // dép nam 1 19
            [
                'product_id'=>19,
                'size'=>33,
                'color'=>'Đen',
                'price'=>79.000,
                'img_ulr'=>'./assets/img/dn1den.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>19,
                'size'=>33,
                'color'=>'grey',
                'price'=>99.000,
                'img_ulr'=>'./assets/img/dn1grey.jpg',
                'quantity'=>30
            ],

            // dép nam 2 20
            [
                'product_id'=>20,
                'size'=>33,
                'color'=>'Xám',
                'price'=>259.000,
                'img_ulr'=>'./assets/img/dn2xam.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>20,
                'size'=>33,
                'color'=>'Xanh mit',
                'price'=>240.000,
                'img_ulr'=>'./assets/img/dn2xanh.jpg',
                'quantity'=>30
            ],

            // dép nam 3 21
            [
                'product_id'=>21,
                'size'=>33,
                'color'=>'Đen',
                'price'=>175.000,
                'img_ulr'=>'./assets/img/dn3den.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>21,
                'size'=>33,
                'color'=>'Trắng',
                'price'=>186.000,
                'img_ulr'=>'./assets/img/dn3trang.jpg',
                'quantity'=>30
            ],

            // dép nam 4 22
            [
                'product_id'=>22,
                'size'=>33,
                'color'=>'Kem',
                'price'=>199.000,
                'img_ulr'=>'./assets/img/dn4kem.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>22,
                'size'=>33,
                'color'=>'Nâu',
                'price'=>205.000,
                'img_ulr'=>'./assets/img/dn4nau.jpg',
                'quantity'=>30
            ],

             // dép nam 5 23
            [
                'product_id'=>23,
                'size'=>33,
                'color'=>'Đế đen',
                'price'=>168.000,
                'img_ulr'=>'./assets/img/dn5den.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>23,
                'size'=>33,
                'color'=>'Đế Trắng',
                'price'=>178.000,
                'img_ulr'=>'./assets/img/dn5trang.jpg',
                'quantity'=>30
            ],
            
        ]);
    }
}
