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
            // biến thể sản phẩnm 1
            [
                'product_id'=>1,
                'size'=>38,
                'color'=>'Trắng cam',
                'price'=>390000,
                'img_ulr'=>'./assets/img/bd1trangcam.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>1,
                'size'=>39,
                'color'=>'Trắng cam',
                'price'=>390000,
                'img_ulr'=>'./assets/img/bd1trangcam.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>1,
                'size'=>40,
                'color'=>'Trắng cam',
                'price'=>390000,
                'img_ulr'=>'./assets/img/bd1trangcam.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>1,
                'size'=>41,
                'color'=>'Trắng cam',
                'price'=>390000,
                'img_ulr'=>'./assets/img/bd1trangcam.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>1,
                'size'=>42,
                'color'=>'Trắng cam',
                'price'=>390000,
                'img_ulr'=>'./assets/img/bd1trangcam.jpg',
                'quantity'=>30
            ],[
                'product_id'=>1,
                'size'=>43,
                'color'=>'Trắng cam',
                'price'=>390000,
                'img_ulr'=>'./assets/img/bd1trangcam.jpg',
                'quantity'=>30
            ],
            // sp1.2
            [
                'product_id'=>1,
                'size'=>38,
                'color'=>'Xám hồng',
                'price'=>470000,
                'img_ulr'=>'./assets/img/bd1xamhong.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>1,
                'size'=>39,
                'color'=>'Xám hồng',
                'price'=>470000,
                'img_ulr'=>'./assets/img/bd1xamhong.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>1,
                'size'=>40,
                'color'=>'Xám hồng',
                'price'=>470000,
                'img_ulr'=>'./assets/img/bd1xamhong.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>1,
                'size'=>41,
                'color'=>'Xám hồng',
                'price'=>470000,
                'img_ulr'=>'./assets/img/bd1xamhong.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>1,
                'size'=>42,
                'color'=>'Xám hồng',
                'price'=>470000,
                'img_ulr'=>'./assets/img/bd1xamhong.jpg',
                'quantity'=>30
            ],

            // biến thẻ sản phẩm 2
            [
                'product_id'=>2,
                'size'=>38,
                'color'=>'Trắng đen',
                'price'=>147550,
                'img_ulr'=>'./assets/img/bd2trangden.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>2,
                'size'=>39,
                'color'=>'Trắng đen',
                'price'=>147550,
                'img_ulr'=>'./assets/img/bd2trangden.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>2,
                'size'=>40,
                'color'=>'Trắng đen',
                'price'=>147550,
                'img_ulr'=>'./assets/img/bd2trangden.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>2,
                'size'=>41,
                'color'=>'Trắng đen',
                'price'=>147550,
                'img_ulr'=>'./assets/img/bd2trangden.jpg',
                'quantity'=>30
            ],

            //sp2.2
            [
                'product_id'=>2,
                'size'=>38,
                'color'=>'Xanh trắng',
                'price'=>150000,
                'img_ulr'=>'./assets/img/bd2xanhtrang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>2,
                'size'=>39,
                'color'=>'Xanh trắng',
                'price'=>150000,
                'img_ulr'=>'./assets/img/bd2xanhtrang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>2,
                'size'=>40,
                'color'=>'Xanh trắng',
                'price'=>150000,
                'img_ulr'=>'./assets/img/bd2xanhtrang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>2,
                'size'=>41,
                'color'=>'Xanh trắng',
                'price'=>150000,
                'img_ulr'=>'./assets/img/bd2xanhtrang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>2,
                'size'=>42,
                'color'=>'Xanh trắng',
                'price'=>150000,
                'img_ulr'=>'./assets/img/bd2xanhtrang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>2,
                'size'=>43,
                'color'=>'Xanh trắng',
                'price'=>150000,
                'img_ulr'=>'./assets/img/bd2xanhtrang.jpg',
                'quantity'=>30
            ],


            // sp3
            [
                'product_id'=>3,
                'size'=>38,
                'color'=>'Xanh ngọc',
                'price'=>109000,
                'img_ulr'=>'./assets/img/bd3xanhngoc.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>3,
                'size'=>39,
                'color'=>'Xanh ngọc',
                'price'=>109000,
                'img_ulr'=>'./assets/img/bd3xanhngoc.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>3,
                'size'=>40,
                'color'=>'Xanh ngọc',
                'price'=>109000,
                'img_ulr'=>'./assets/img/bd3xanhngoc.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>3,
                'size'=>41,
                'color'=>'Xanh ngọc',
                'price'=>109000,
                'img_ulr'=>'./assets/img/bd3xanhngoc.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>3,
                'size'=>42,
                'color'=>'Xanh ngọc',
                'price'=>109000,
                'img_ulr'=>'./assets/img/bd3xanhngoc.jpg',
                'quantity'=>30
            ],

            //sp3.2
            [
                'product_id'=>3,
                'size'=>38,
                'color'=>'Nhám vàng',
                'price'=>150000,
                'img_ulr'=>'./assets/img/bd3nhamvang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>3,
                'size'=>39,
                'color'=>'Nhám vàng',
                'price'=>150000,
                'img_ulr'=>'./assets/img/bd3nhamvang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>3,
                'size'=>40,
                'color'=>'Nhám vàng',
                'price'=>150000,
                'img_ulr'=>'./assets/img/bd3nhamvang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>3,
                'size'=>41,
                'color'=>'Nhám vàng',
                'price'=>150000,
                'img_ulr'=>'./assets/img/bd3nhamvang.jpg',
                'quantity'=>30
            ],


            //sp4.1
            [
                'product_id'=>4,
                'size'=>38,
                'color'=>'Trắng đen',
                'price'=>420000,
                'img_ulr'=>'./assets/img/bd4trangden.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>4,
                'size'=>34,
                'color'=>'Trắng đen',
                'price'=>420000,
                'img_ulr'=>'./assets/img/bd4trangden.jpg',
                'quantity'=>30
            ],[
                'product_id'=>4,
                'size'=>40,
                'color'=>'Trắng đen',
                'price'=>420000,
                'img_ulr'=>'./assets/img/bd4trangden.jpg',
                'quantity'=>30
            ],[
                'product_id'=>4,
                'size'=>41,
                'color'=>'Trắng đen',
                'price'=>420000,
                'img_ulr'=>'./assets/img/bd4trangden.jpg',
                'quantity'=>30
            ],

            // sp4.2
            [
                'product_id'=>4,
                'size'=>38,
                'color'=>'Full trắng',
                'price'=>390000,
                'img_ulr'=>'./assets/img/bd4fulltrang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>4,
                'size'=>39,
                'color'=>'Full trắng',
                'price'=>390000,
                'img_ulr'=>'./assets/img/bd4fulltrang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>4,
                'size'=>40,
                'color'=>'Full trắng',
                'price'=>390000,
                'img_ulr'=>'./assets/img/bd4fulltrang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>4,
                'size'=>41,
                'color'=>'Full trắng',
                'price'=>390000,
                'img_ulr'=>'./assets/img/bd4fulltrang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>4,
                'size'=>42,
                'color'=>'Full trắng',
                'price'=>390000,
                'img_ulr'=>'./assets/img/bd4fulltrang.jpg',
                'quantity'=>30
            ],

            //sp5.1
            [
                'product_id'=>5,
                'size'=>38,
                'color'=>'Xanh ngọc',
                'price'=>316000,
                'img_ulr'=>'./assets/img/bd5xanhngoc.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>5,
                'size'=>39,
                'color'=>'Xanh ngọc',
                'price'=>316000,
                'img_ulr'=>'./assets/img/bd5xanhngoc.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>5,
                'size'=>40,
                'color'=>'Xanh ngọc',
                'price'=>316000,
                'img_ulr'=>'./assets/img/bd5xanhngoc.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>5,
                'size'=>41,
                'color'=>'Xanh ngọc',
                'price'=>316000,
                'img_ulr'=>'./assets/img/bd5xanhngoc.jpg',
                'quantity'=>30
            ],

            //sp5.2
            [
                'product_id'=>5,
                'size'=>38,
                'color'=>'Xanh lá',
                'price'=>330000,
                'img_ulr'=>'./assets/img/bd5xanhla.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>5,
                'size'=>39,
                'color'=>'Xanh lá',
                'price'=>330000,
                'img_ulr'=>'./assets/img/bd5xanhla.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>5,
                'size'=>40,
                'color'=>'Xanh lá',
                'price'=>330000,
                'img_ulr'=>'./assets/img/bd5xanhla.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>5,
                'size'=>41,
                'color'=>'Xanh lá',
                'price'=>330000,
                'img_ulr'=>'./assets/img/bd5xanhla.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>5,
                'size'=>42,
                'color'=>'Xanh lá',
                'price'=>330000,
                'img_ulr'=>'./assets/img/bd5xanhla.jpg',
                'quantity'=>30
            ],
            //sp6
            [
                'product_id'=>6,
                'size'=>38,
                'color'=>'Xanh hồng',
                'price'=>330000,
                'img_ulr'=>'./assets/img/bd6.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>6,
                'size'=>39,
                'color'=>'Xanh hồng',
                'price'=>330000,
                'img_ulr'=>'./assets/img/bd6.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>6,
                'size'=>40,
                'color'=>'Xanh hồng',
                'price'=>330000,
                'img_ulr'=>'./assets/img/bd6.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>6,
                'size'=>41,
                'color'=>'Xanh hồng',
                'price'=>330000,
                'img_ulr'=>'./assets/img/bd6.jpg',
                'quantity'=>30
            ],

            //sp7
            [
                'product_id'=>7,
                'size'=>38,
                'color'=>'Xanh Paster',
                'price'=>249600,
                'img_ulr'=>'./assets/img/bd7xanhpaster.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>7,
                'size'=>39,
                'color'=>'Xanh Paster',
                'price'=>249600,
                'img_ulr'=>'./assets/img/bd7xanhpaster.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>7,
                'size'=>40,
                'color'=>'Xanh Paster',
                'price'=>249600,
                'img_ulr'=>'./assets/img/bd7xanhpaster.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>7,
                'size'=>41,
                'color'=>'Xanh Paster',
                'price'=>249600,
                'img_ulr'=>'./assets/img/bd7xanhpaster.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>7,
                'size'=>42,
                'color'=>'Xanh Paster',
                'price'=>249600,
                'img_ulr'=>'./assets/img/bd7xanhpaster.jpg',
                'quantity'=>30
            ],

            //sp7.2
            [
                'product_id'=>7,
                'size'=>38,
                'color'=>'Vàng',
                'price'=>300000,
                'img_ulr'=>'./assets/img/bd7vang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>7,
                'size'=>39,
                'color'=>'Vàng',
                'price'=>300000,
                'img_ulr'=>'./assets/img/bd7vang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>7,
                'size'=>40,
                'color'=>'Vàng',
                'price'=>300000,
                'img_ulr'=>'./assets/img/bd7vang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>7,
                'size'=>41,
                'color'=>'Vàng',
                'price'=>300000,
                'img_ulr'=>'./assets/img/bd7vang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>7,
                'size'=>42,
                'color'=>'Vàng',
                'price'=>300000,
                'img_ulr'=>'./assets/img/bd7vang.jpg',
                'quantity'=>30
            ],

            //sp8.1
            [
                'product_id'=>8,
                'size'=>38,
                'color'=>'Ngọc chuối',
                'price'=>135000,
                'img_ulr'=>'./assets/img/bd8ngocchuoi.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>8,
                'size'=>39,
                'color'=>'Ngọc chuối',
                'price'=>135000,
                'img_ulr'=>'./assets/img/bd8ngocchuoi.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>8,
                'size'=>40,
                'color'=>'Ngọc chuối',
                'price'=>135000,
                'img_ulr'=>'./assets/img/bd8ngocchuoi.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>8,
                'size'=>41,
                'color'=>'Ngọc chuối',
                'price'=>135000,
                'img_ulr'=>'./assets/img/bd8ngocchuoi.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>8,
                'size'=>42,
                'color'=>'Ngọc chuối',
                'price'=>135000,
                'img_ulr'=>'./assets/img/bd8ngocchuoi.jpg',
                'quantity'=>30
            ],

            //sp8.2
            [
                'product_id'=>8,
                'size'=>38,
                'color'=>'Hồng trắng',
                'price'=>170000,
                'img_ulr'=>'./assets/img/bd8hongtrang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>8,
                'size'=>39,
                'color'=>'Hồng trắng',
                'price'=>170000,
                'img_ulr'=>'./assets/img/bd8hongtrang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>8,
                'size'=>40,
                'color'=>'Hồng trắng',
                'price'=>170000,
                'img_ulr'=>'./assets/img/bd8hongtrang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>8,
                'size'=>41,
                'color'=>'Hồng trắng',
                'price'=>170000,
                'img_ulr'=>'./assets/img/bd8hongtrang.jpg',
                'quantity'=>30
            ],

            //sp9.1
            [
                'product_id'=>9,
                'size'=>38,
                'color'=>'Trắng',
                'price'=>153000,
                'img_ulr'=>'./assets/img/bd9trang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>9,
                'size'=>39,
                'color'=>'Trắng',
                'price'=>153000,
                'img_ulr'=>'./assets/img/bd9trang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>9,
                'size'=>40,
                'color'=>'Trắng',
                'price'=>153000,
                'img_ulr'=>'./assets/img/bd9trang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>9,
                'size'=>41,
                'color'=>'Trắng',
                'price'=>153000,
                'img_ulr'=>'./assets/img/bd9trang.jpg',
                'quantity'=>30
            ],
            // sp9.2
            [
                'product_id'=>9,
                'size'=>38,
                'color'=>'Bạc',
                'price'=>142000,
                'img_ulr'=>'./assets/img/bd9bac.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>9,
                'size'=>39,
                'color'=>'Bạc',
                'price'=>142000,
                'img_ulr'=>'./assets/img/bd9bac.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>9,
                'size'=>40,
                'color'=>'Bạc',
                'price'=>142000,
                'img_ulr'=>'./assets/img/bd9bac.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>9,
                'size'=>41,
                'color'=>'Bạc',
                'price'=>142000,
                'img_ulr'=>'./assets/img/bd9bac.jpg',
                'quantity'=>30
            ],

            //sp 10.1
            [
                'product_id'=>10,
                'size'=>38,
                'color'=>'Trắng xanh',
                'price'=>137000,
                'img_ulr'=>'./assets/img/bd10xanh.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>10,
                'size'=>39,
                'color'=>'Trắng xanh',
                'price'=>137000,
                'img_ulr'=>'./assets/img/bd10xanh.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>10,
                'size'=>40,
                'color'=>'Trắng xanh',
                'price'=>137000,
                'img_ulr'=>'./assets/img/bd10xanh.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>10,
                'size'=>41,
                'color'=>'Trắng xanh',
                'price'=>137000,
                'img_ulr'=>'./assets/img/bd10xanh.jpg',
                'quantity'=>30
            ],
            //sp10.2
            [
                'product_id'=>10,
                'size'=>38,
                'color'=>'Trắng vàng',
                'price'=>150000,
                'img_ulr'=>'./assets/img/bd10vang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>10,
                'size'=>39,
                'color'=>'Trắng vàng',
                'price'=>150000,
                'img_ulr'=>'./assets/img/bd10vang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>10,
                'size'=>40,
                'color'=>'Trắng vàng',
                'price'=>150000,
                'img_ulr'=>'./assets/img/bd10vang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>10,
                'size'=>41,
                'color'=>'Trắng vàng',
                'price'=>150000,
                'img_ulr'=>'./assets/img/bd10vang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>10,
                'size'=>42,
                'color'=>'Trắng vàng',
                'price'=>150000,
                'img_ulr'=>'./assets/img/bd10vang.jpg',
                'quantity'=>30
            ],



            // sandal

            //sp11.1
            [
                'product_id'=>11,
                'size'=>38,
                'color'=>'Đen',
                'price'=>118000,
                'img_ulr'=>'./assets/img/sd1den.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>11,
                'size'=>39,
                'color'=>'Đen',
                'price'=>118000,
                'img_ulr'=>'./assets/img/sd1den.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>11,
                'size'=>40,
                'color'=>'Đen',
                'price'=>118000,
                'img_ulr'=>'./assets/img/sd1den.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>11,
                'size'=>41,
                'color'=>'Đen',
                'price'=>118000,
                'img_ulr'=>'./assets/img/sd1den.jpg',
                'quantity'=>30
            ],
            //sp11.2
            [
                'product_id'=>11,
                'size'=>38,
                'color'=>'Đen trắng',
                'price'=>124000,
                'img_ulr'=>'./assets/img/sd1dentrang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>11,
                'size'=>39,
                'color'=>'Đen trắng',
                'price'=>124000,
                'img_ulr'=>'./assets/img/sd1dentrang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>11,
                'size'=>40,
                'color'=>'Đen trắng',
                'price'=>124000,
                'img_ulr'=>'./assets/img/sd1dentrang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>11,
                'size'=>41,
                'color'=>'Đen trắng',
                'price'=>124000,
                'img_ulr'=>'./assets/img/sd1dentrang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>11,
                'size'=>42,
                'color'=>'Đen trắng',
                'price'=>124000,
                'img_ulr'=>'./assets/img/sd1dentrang.jpg',
                'quantity'=>30
            ],

            //sp12.1
            [
                'product_id'=>12,
                'size'=>38,
                'color'=>'Đen trắng',
                'price'=>207000,
                'img_ulr'=>'./assets/img/sd2dentrang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>12,
                'size'=>39,
                'color'=>'Đen trắng',
                'price'=>207000,
                'img_ulr'=>'./assets/img/sd2dentrang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>12,
                'size'=>40,
                'color'=>'Đen trắng',
                'price'=>207000,
                'img_ulr'=>'./assets/img/sd2dentrang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>12,
                'size'=>41,
                'color'=>'Đen trắng',
                'price'=>207000,
                'img_ulr'=>'./assets/img/sd2dentrang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>12,
                'size'=>42,
                'color'=>'Đen trắng',
                'price'=>207000,
                'img_ulr'=>'./assets/img/sd2dentrang.jpg',
                'quantity'=>30
            ],

            //sp12.2
            [
                'product_id'=>12,
                'size'=>38,
                'color'=>'Đen full',
                'price'=>220000,
                'img_ulr'=>'./assets/img/sd2den.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>12,
                'size'=>39,
                'color'=>'Đen full',
                'price'=>220000,
                'img_ulr'=>'./assets/img/sd2den.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>12,
                'size'=>40,
                'color'=>'Đen full',
                'price'=>220000,
                'img_ulr'=>'./assets/img/sd2den.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>12,
                'size'=>41,
                'color'=>'Đen full',
                'price'=>220000,
                'img_ulr'=>'./assets/img/sd2den.jpg',
                'quantity'=>30
            ],

            //sp13.1
            [
                'product_id'=>13,
                'size'=>38,
                'color'=>'Ghi xám',
                'price'=>99000,
                'img_ulr'=>'./assets/img/sd3ghixam.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>13,
                'size'=>39,
                'color'=>'Ghi xám',
                'price'=>99000,
                'img_ulr'=>'./assets/img/sd3ghixam.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>13,
                'size'=>40,
                'color'=>'Ghi xám',
                'price'=>99000,
                'img_ulr'=>'./assets/img/sd3ghixam.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>13,
                'size'=>41,
                'color'=>'Ghi xám',
                'price'=>99000,
                'img_ulr'=>'./assets/img/sd3ghixam.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>13,
                'size'=>42,
                'color'=>'Ghi xám',
                'price'=>99000,
                'img_ulr'=>'./assets/img/sd3ghixam.jpg',
                'quantity'=>30
            ],
            //sp13.2
            [
                'product_id'=>13,
                'size'=>38,
                'color'=>'Xanh đen',
                'price'=>105000,
                'img_ulr'=>'./assets/img/sd3xanhden.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>13,
                'size'=>39,
                'color'=>'Xanh đen',
                'price'=>105000,
                'img_ulr'=>'./assets/img/sd3xanhden.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>13,
                'size'=>40,
                'color'=>'Xanh đen',
                'price'=>105000,
                'img_ulr'=>'./assets/img/sd3xanhden.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>13,
                'size'=>41,
                'color'=>'Xanh đen',
                'price'=>105000,
                'img_ulr'=>'./assets/img/sd3xanhden.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>13,
                'size'=>42,
                'color'=>'Xanh đen',
                'price'=>105000,
                'img_ulr'=>'./assets/img/sd3xanhden.jpg',
                'quantity'=>30
            ],

            // sanhdn4 14
            //sp14.1
            [
                'product_id'=>14,
                'size'=>38,
                'color'=>'xám full',
                'price'=>115000,
                'img_ulr'=>'./assets/img/sd4xamfull.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>14,
                'size'=>39,
                'color'=>'xám full',
                'price'=>115000,
                'img_ulr'=>'./assets/img/sd4xamfull.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>14,
                'size'=>40,
                'color'=>'xám full',
                'price'=>115000,
                'img_ulr'=>'./assets/img/sd4xamfull.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>14,
                'size'=>41,
                'color'=>'xám full',
                'price'=>115000,
                'img_ulr'=>'./assets/img/sd4xamfull.jpg',
                'quantity'=>30
            ],

            //sp 14.2
            [
                'product_id'=>14,
                'size'=>38,
                'color'=>'Xám đen',
                'price'=>135000,
                'img_ulr'=>'./assets/img/sd4xamden.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>14,
                'size'=>39,
                'color'=>'Xám đen',
                'price'=>135000,
                'img_ulr'=>'./assets/img/sd4xamden.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>14,
                'size'=>40,
                'color'=>'Xám đen',
                'price'=>135000,
                'img_ulr'=>'./assets/img/sd4xamden.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>14,
                'size'=>41,
                'color'=>'Xám đen',
                'price'=>135000,
                'img_ulr'=>'./assets/img/sd4xamden.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>14,
                'size'=>42,
                'color'=>'Xám đen',
                'price'=>135000,
                'img_ulr'=>'./assets/img/sd4xamden.jpg',
                'quantity'=>30
            ],

            // sandanl 5 15
            // sp15.1
            [
                'product_id'=>15,
                'size'=>38,
                'color'=>'Đế đen',
                'price'=>100000,
                'img_ulr'=>'./assets/img/sd5deden.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>15,
                'size'=>39,
                'color'=>'Đế đen',
                'price'=>100000,
                'img_ulr'=>'./assets/img/sd5deden.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>15,
                'size'=>40,
                'color'=>'Đế đen',
                'price'=>100000,
                'img_ulr'=>'./assets/img/sd5deden.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>15,
                'size'=>41,
                'color'=>'Đế đen',
                'price'=>100000,
                'img_ulr'=>'./assets/img/sd5deden.jpg',
                'quantity'=>30
            ],
            //sp 15.2
            [
                'product_id'=>15,
                'size'=>38,
                'color'=>'Đế trắng',
                'price'=>110000,
                'img_ulr'=>'./assets/img/sd5detrang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>15,
                'size'=>39,
                'color'=>'Đế trắng',
                'price'=>110000,
                'img_ulr'=>'./assets/img/sd5detrang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>15,
                'size'=>40,
                'color'=>'Đế trắng',
                'price'=>110000,
                'img_ulr'=>'./assets/img/sd5detrang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>15,
                'size'=>41,
                'color'=>'Đế trắng',
                'price'=>110000,
                'img_ulr'=>'./assets/img/sd5detrang.jpg',
                'quantity'=>30
            ],

            // sanhdan6 16
            //sp16.1
            [
                'product_id'=>16,
                'size'=>38,
                'color'=>'Xanh',
                'price'=>138000,
                'img_ulr'=>'./assets/img/sd6xanh.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>16,
                'size'=>39,
                'color'=>'Xanh',
                'price'=>138000,
                'img_ulr'=>'./assets/img/sd6xanh.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>16,
                'size'=>40,
                'color'=>'Xanh',
                'price'=>138000,
                'img_ulr'=>'./assets/img/sd6xanh.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>16,
                'size'=>41,
                'color'=>'Xanh',
                'price'=>138000,
                'img_ulr'=>'./assets/img/sd6xanh.jpg',
                'quantity'=>30
            ],
            //sp 16.2
            [
                'product_id'=>16,
                'size'=>38,
                'color'=>'Kem',
                'price'=>147000,
                'img_ulr'=>'./assets/img/sd6kem.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>16,
                'size'=>39,
                'color'=>'Kem',
                'price'=>147000,
                'img_ulr'=>'./assets/img/sd6kem.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>16,
                'size'=>40,
                'color'=>'Kem',
                'price'=>147000,
                'img_ulr'=>'./assets/img/sd6kem.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>16,
                'size'=>41,
                'color'=>'Kem',
                'price'=>147000,
                'img_ulr'=>'./assets/img/sd6kem.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>16,
                'size'=>42,
                'color'=>'Kem',
                'price'=>147000,
                'img_ulr'=>'./assets/img/sd6kem.jpg',
                'quantity'=>30
            ],

            // sanhdan7 17
            //sp17.1
            [
                'product_id'=>17,
                'size'=>38,
                'color'=>'Nâu',
                'price'=>222000,
                'img_ulr'=>'./assets/img/sd7nau.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>17,
                'size'=>39,
                'color'=>'Nâu',
                'price'=>222000,
                'img_ulr'=>'./assets/img/sd7nau.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>17,
                'size'=>40,
                'color'=>'Nâu',
                'price'=>222000,
                'img_ulr'=>'./assets/img/sd7nau.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>17,
                'size'=>41,
                'color'=>'Nâu',
                'price'=>222000,
                'img_ulr'=>'./assets/img/sd7nau.jpg',
                'quantity'=>30
            ],

            //sp 17.2
            [
                'product_id'=>17,
                'size'=>38,
                'color'=>'Xanh navy',
                'price'=>235000,
                'img_ulr'=>'./assets/img/sd7navy.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>17,
                'size'=>39,
                'color'=>'Xanh navy',
                'price'=>235000,
                'img_ulr'=>'./assets/img/sd7navy.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>17,
                'size'=>40,
                'color'=>'Xanh navy',
                'price'=>235000,
                'img_ulr'=>'./assets/img/sd7navy.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>17,
                'size'=>41,
                'color'=>'Xanh navy',
                'price'=>235000,
                'img_ulr'=>'./assets/img/sd7navy.jpg',
                'quantity'=>30
            ],

            // sanhdan8 18
            //sp18.1
            [
                'product_id'=>18,
                'size'=>38,
                'color'=>'Be',
                'price'=>105000,
                'img_ulr'=>'./assets/img/sd8be.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>18,
                'size'=>39,
                'color'=>'Be',
                'price'=>105000,
                'img_ulr'=>'./assets/img/sd8be.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>18,
                'size'=>40,
                'color'=>'Be',
                'price'=>105000,
                'img_ulr'=>'./assets/img/sd8be.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>18,
                'size'=>41,
                'color'=>'Be',
                'price'=>105000,
                'img_ulr'=>'./assets/img/sd8be.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>18,
                'size'=>42,
                'color'=>'Be',
                'price'=>105000,
                'img_ulr'=>'./assets/img/sd8be.jpg',
                'quantity'=>30
            ],
            //sp18.2
            [
                'product_id'=>18,
                'size'=>38,
                'color'=>'Đen',
                'price'=>110000,
                'img_ulr'=>'./assets/img/sd8den.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>18,
                'size'=>39,
                'color'=>'Đen',
                'price'=>110000,
                'img_ulr'=>'./assets/img/sd8den.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>18,
                'size'=>40,
                'color'=>'Đen',
                'price'=>110000,
                'img_ulr'=>'./assets/img/sd8den.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>18,
                'size'=>41,
                'color'=>'Đen',
                'price'=>110000,
                'img_ulr'=>'./assets/img/sd8den.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>18,
                'size'=>42,
                'color'=>'Đen',
                'price'=>110000,
                'img_ulr'=>'./assets/img/sd8den.jpg',
                'quantity'=>30
            ],

            // dép nam 1 19
            //sp19.1
            [
                'product_id'=>19,
                'size'=>38,
                'color'=>'Đen',
                'price'=>79000,
                'img_ulr'=>'./assets/img/dn1den.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>19,
                'size'=>39,
                'color'=>'Đen',
                'price'=>79000,
                'img_ulr'=>'./assets/img/dn1den.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>19,
                'size'=>40,
                'color'=>'Đen',
                'price'=>79000,
                'img_ulr'=>'./assets/img/dn1den.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>19,
                'size'=>41,
                'color'=>'Đen',
                'price'=>79000,
                'img_ulr'=>'./assets/img/dn1den.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>19,
                'size'=>42,
                'color'=>'Đen',
                'price'=>79000,
                'img_ulr'=>'./assets/img/dn1den.jpg',
                'quantity'=>30
            ],
            // sp 19.2
            [
                'product_id'=>19,
                'size'=>38,
                'color'=>'grey',
                'price'=>99000,
                'img_ulr'=>'./assets/img/dn1grey.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>19,
                'size'=>39,
                'color'=>'grey',
                'price'=>99000,
                'img_ulr'=>'./assets/img/dn1grey.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>19,
                'size'=>40,
                'color'=>'grey',
                'price'=>99000,
                'img_ulr'=>'./assets/img/dn1grey.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>19,
                'size'=>41,
                'color'=>'grey',
                'price'=>99000,
                'img_ulr'=>'./assets/img/dn1grey.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>19,
                'size'=>42,
                'color'=>'grey',
                'price'=>99000,
                'img_ulr'=>'./assets/img/dn1grey.jpg',
                'quantity'=>30
            ],

            // dép nam 2 20
            //sp20.1
            [
                'product_id'=>20,
                'size'=>38,
                'color'=>'Xám',
                'price'=>259000,
                'img_ulr'=>'./assets/img/dn2xam.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>20,
                'size'=>39,
                'color'=>'Xám',
                'price'=>259000,
                'img_ulr'=>'./assets/img/dn2xam.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>20,
                'size'=>40,
                'color'=>'Xám',
                'price'=>259000,
                'img_ulr'=>'./assets/img/dn2xam.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>20,
                'size'=>41,
                'color'=>'Xám',
                'price'=>259000,
                'img_ulr'=>'./assets/img/dn2xam.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>20,
                'size'=>42,
                'color'=>'Xám',
                'price'=>259000,
                'img_ulr'=>'./assets/img/dn2xam.jpg',
                'quantity'=>30
            ],
            // sp20.2
            [
                'product_id'=>20,
                'size'=>38,
                'color'=>'Xanh mit',
                'price'=>240000,
                'img_ulr'=>'./assets/img/dn2xanh.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>20,
                'size'=>39,
                'color'=>'Xanh mit',
                'price'=>240000,
                'img_ulr'=>'./assets/img/dn2xanh.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>20,
                'size'=>40,
                'color'=>'Xanh mit',
                'price'=>240000,
                'img_ulr'=>'./assets/img/dn2xanh.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>20,
                'size'=>41,
                'color'=>'Xanh mit',
                'price'=>240000,
                'img_ulr'=>'./assets/img/dn2xanh.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>20,
                'size'=>42,
                'color'=>'Xanh mit',
                'price'=>240000,
                'img_ulr'=>'./assets/img/dn2xanh.jpg',
                'quantity'=>30
            ],

            // dép nam 3 21
            //sp21.1
            [
                'product_id'=>21,
                'size'=>38,
                'color'=>'Đen',
                'price'=>175000,
                'img_ulr'=>'./assets/img/dn3den.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>21,
                'size'=>39,
                'color'=>'Đen',
                'price'=>175000,
                'img_ulr'=>'./assets/img/dn3den.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>21,
                'size'=>40,
                'color'=>'Đen',
                'price'=>175000,
                'img_ulr'=>'./assets/img/dn3den.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>21,
                'size'=>41,
                'color'=>'Đen',
                'price'=>175000,
                'img_ulr'=>'./assets/img/dn3den.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>21,
                'size'=>42,
                'color'=>'Đen',
                'price'=>175000,
                'img_ulr'=>'./assets/img/dn3den.jpg',
                'quantity'=>30
            ],
            // sp 21.2
            [
                'product_id'=>21,
                'size'=>38,
                'color'=>'Trắng',
                'price'=>186000,
                'img_ulr'=>'./assets/img/dn3trang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>21,
                'size'=>39,
                'color'=>'Trắng',
                'price'=>186000,
                'img_ulr'=>'./assets/img/dn3trang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>21,
                'size'=>40,
                'color'=>'Trắng',
                'price'=>186000,
                'img_ulr'=>'./assets/img/dn3trang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>21,
                'size'=>41,
                'color'=>'Trắng',
                'price'=>186000,
                'img_ulr'=>'./assets/img/dn3trang.jpg',
                'quantity'=>30
            ],

            // dép nam 4 22
            //sp 22.1
            [
                'product_id'=>22,
                'size'=>38,
                'color'=>'Kem',
                'price'=>199000,
                'img_ulr'=>'./assets/img/dn4kem.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>22,
                'size'=>39,
                'color'=>'Kem',
                'price'=>199000,
                'img_ulr'=>'./assets/img/dn4kem.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>22,
                'size'=>40,
                'color'=>'Kem',
                'price'=>199000,
                'img_ulr'=>'./assets/img/dn4kem.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>22,
                'size'=>41,
                'color'=>'Kem',
                'price'=>199000,
                'img_ulr'=>'./assets/img/dn4kem.jpg',
                'quantity'=>30
            ],
            //sp 22.2
            [
                'product_id'=>22,
                'size'=>38,
                'color'=>'Nâu',
                'price'=>205000,
                'img_ulr'=>'./assets/img/dn4nau.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>22,
                'size'=>38,
                'color'=>'Nâu',
                'price'=>205000,
                'img_ulr'=>'./assets/img/dn4nau.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>22,
                'size'=>40,
                'color'=>'Nâu',
                'price'=>205000,
                'img_ulr'=>'./assets/img/dn4nau.jpg',
                'quantity'=>30
            ],

             // dép nam 5 23
            [
                'product_id'=>23,
                'size'=>38,
                'color'=>'Đế đen',
                'price'=>168000,
                'img_ulr'=>'./assets/img/dn5den.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>23,
                'size'=>39,
                'color'=>'Đế đen',
                'price'=>168000,
                'img_ulr'=>'./assets/img/dn5den.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>23,
                'size'=>40,
                'color'=>'Đế đen',
                'price'=>168000,
                'img_ulr'=>'./assets/img/dn5den.jpg',
                'quantity'=>30
            ],

            [
                'product_id'=>23,
                'size'=>38,
                'color'=>'Đế Trắng',
                'price'=>178000,
                'img_ulr'=>'./assets/img/dn5trang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>23,
                'size'=>39,
                'color'=>'Đế Trắng',
                'price'=>178000,
                'img_ulr'=>'./assets/img/dn5trang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>23,
                'size'=>40,
                'color'=>'Đế Trắng',
                'price'=>178000,
                'img_ulr'=>'./assets/img/dn5trang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>23,
                'size'=>41,
                'color'=>'Đế Trắng',
                'price'=>178000,
                'img_ulr'=>'./assets/img/dn5trang.jpg',
                'quantity'=>30
            ],
            [
                'product_id'=>23,
                'size'=>42,
                'color'=>'Đế Trắng',
                'price'=>178000,
                'img_ulr'=>'./assets/img/dn5trang.jpg',
                'quantity'=>30
            ],
            
        ]);
    }
}