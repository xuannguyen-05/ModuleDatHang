<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'productname'=>'GIÀY ĐÁ BÓNG VẢI DỆT TRẮNG CAM DẬP VÂN NHÁM CỰC NHẸ MỀM MỎNG',
                'description'=>'Đảm bảo tính linh hoạt của đôi chân với kiểu dáng trẻ trung, năng động với thiết kế vô cùng gọn nhẹ, dễ mang, chắc chắn sẽ là đôi giày không thể thiếu mỗi khi ra sân',
                'category_id'=> 1,
                'created_by'=> 3,
                'update_by'=> 3
            ],
            [
                'productname'=>'Giày wika 3 sọc chính hãng tặng tất ( fom bé cần tăng 1 size)',
                'description'=>'Sản phẩm ( Giày Đá Bóng 3 Sọc Đá Bóng Ct3 Wika Chính Hãng ) Wika đảm bảo về CHẤT LIỆU cũng như HÌNH DÁNG, đầy đủ tem, mác, bao bì . Luôn tuân thủ đúng các quy trình quản lý chất lượng, đảm bảo chất lượng sản phẩm.',
                'category_id'=> 1,
                'created_by'=> 3,
                'update_by'=> 3
            ],
            [
                'productname'=>'giày đá bóng nam [ chọn size lấy lên thêm 1 size ] giày đá bóng sân cỏ nhân tạo, đã khâu full đế',
                'description'=>'Sản phẩm giày đá bóng nam giày đá bóng sân cỏ nhân tạo, đã khâu full đế',
                'category_id'=> 1,
                'created_by'=> 3,
                'update_by'=> 3
            ],
            [
                'productname'=>'GIÀY ĐÁ BÓNG PK25 CỰC NHẸ MỀM MỎNG CỔ CHUN ÔM CHÂN',
                'description'=>'Đảm bảo tính linh hoạt của đôi chân với kiểu dáng trẻ trung, năng động với thiết kế vô cùng gọn nhẹ, dễ mang, chắc chắn sẽ là đôi giày không thể thiếu mỗi khi ra sân',
                'category_id'=> 1,
                'created_by'=> 3,
                'update_by'=> 3
            ],
            [
                'productname'=>'Giày wika galaxy chính hãng',
                'description'=>'Giày chính hãng có tem mác đầy đủ có thể check  Giày được làm bằng công nghệ da mới mỷcrofiber êm chân cảm giác bóng tốt Được tặng kèm tất và đã khâu full đế ạ',
                'category_id'=> 1,
                'created_by'=> 3,
                'update_by'=> 3
            ],
            [
                'productname'=>'GIÀY ĐÁ BÓNG GIÁ HỌC SINH MÀU CỰC ĐẸP',
                'description'=>'Vải dệt phủ keo dập vân nhám toàn bộ form giày ,Khâu full đế(đánh rãnh khâu chìm),Kiểu dáng gọn gàng thoát chân',
                'category_id'=> 1,
                'created_by'=> 3,
                'update_by'=> 3
            ],
            [
                'productname'=>'Giày bóng đá VN Waka Fly Vapor 16 Cổ Chun, giày đá banh cỏ nhân tạo - 2EVSHOP',
                'description'=>'Bề mặt sản phẩm được làm bằng TPU cao cấp tạo độ bền chắc chắn, chống gãy, thuận tiện khi vệ sinh hoặc lau chùi giày. ',
                'category_id'=> 1,
                'created_by'=> 3,
                'update_by'=> 3
            ],
            [
                'productname'=>'Giày đá bóng TẶNG TẤT KHỬ MÙI,giày đá banh nam nữ,giày bóng đá trẻ e đến người lớn',
                'description'=>'Đôi giày lý tưởng cho sân cỏ nhân tạo và đá phủi. Đã được may full đế, đảm bảo độ bền và thoải mái. Đế cao su cuốn tròn giúp bám sân cực kỳ tốt',
                'category_id'=> 1,
                'created_by'=> 3,
                'update_by'=> 3
            ],
            [
                'productname'=>'Giày đá banh đá bóng thể thao Wika Ultra 5 cao cấp chính hãng giá rẻ size 32-44 trẻ em người lớn nam nữ sân cỏ nhân tạo',
                'description'=>'Upper chất liệu da nhăn cao cấp, bền bỉ, chống thấm Đường khâu mũi giày chắc chắn, tăng ma sát với bóng Cổ giày mềm êm, ôm chân',
                'category_id'=> 1,
                'created_by'=> 3,
                'update_by'=> 3
            ],
            [
                'productname'=>'Giày Bóng Đá 3 Sọc - Chất da PU cao cấp chống thấm + Tặng [ Tất Dệt Kim + Băng cuốn cổ chân ]',
                'description'=>'Mặt đế được bố trí với vô số gai nhỏ giúp bám sàn cực kì tốt, chống trơn trượt cao, giúp người chơi di chuyển thoải mái chủ động kiểm soát bóng',
                'category_id'=> 1,
                'created_by'=> 3,
                'update_by'=> 3
            ],
            // sandanl
            [
                'productname'=>'Giày sandal Buenas Signature 6879 - dép quai hậu nam nữ unisex đi học quai ngang đế cao 4cm',
                'description'=>'Giày Sandal nam nữ unisex đi học Buenas SD6879 thuộc dòng sản phẩm đầu tay Sandal Sport của thương hiệu Buenas. ',
                'category_id'=> 2,
                'created_by'=> 3,
                'update_by'=> 3
            ],

            [
                'productname'=>'Giày Sandal Nam Thể Thao Genki Quai Hậu Trẻ Trung Đen Trắng GK271',
                'description'=>'“New Generation New Style”  - bộ sưu tập mới nhất của Genki sẽ thổi 1 làn gió mới đến sandal dành cho giới trẻ, đặc biệt là thế hệ GenZ. ',
                'category_id'=> 2,
                'created_by'=> 3,
                'update_by'=> 3
            ],

            [
                'productname'=>'Sandal nam, dép quai hậu nam, sandal học sinh đế mềm êm siêu bền, giày dép xăng đan 2 quai siêu hót trend, GiàY DéP',
                'description'=>'Sandal nam với thiết kế cực đỉnh, đế độn cao, cực tinh tế, với các đường nét, phối chi tiết sắc nét, bền đẹp- chuẩn form lên dáng cực đẹp, cực nhẹ, cực êm, cực cool.',
                'category_id'=> 2,
                'created_by'=> 3,
                'update_by'=> 3
            ],

            // sanhdnah 4 14
            [
                'productname'=>'[Fullbox] Giày Sandal Nam Việt Thủy - Quai Ngang Ghi Xám - VT016',
                'description'=>'Xin giới thiệu với khách hàng một hãng giày dép Sandal đang được ưa chuộng hiện nay . Đó là hãng Việt Thủy - một thương hiệu giày của Việt Nam.',
                'category_id'=> 2,
                'created_by'=> 3,
                'update_by'=> 3
            ],

            // sanhdanl5 15
            [
                'productname'=>'Dép Sandal Quai Hậu Nam Nữ Mẫu Mới New2024 Loại Xịn Cao Cấp Loại 1,Kiểu Dáng Thể Thao Siêu Cá Tính,Quai Dán Và Cài Chốt',
                'description'=>'Mẫu Dép Quai Hậu Đi Học,chơi Mẫu Mới 2024 Hàng Loại 1 Cao Cấp Nhất,Đang Làm mưa làm gió trên thị trường toàn thế giớiiiiiii,Unisex nam nữ đều đi đc ok.',
                'category_id'=> 2,
                'created_by'=> 3,
                'update_by'=> 3
            ],

            // sandanl 6 16
            [
                'productname'=>'Dép sandal nữ phong cách Hàn Quốc, quai dán chắc chắn, đế êm nhẹ, chất liệu bền đẹp, phù hợp đi chơi, dạo phố,...',
                'description'=>'Dép sandal unisex phong cách Hàn Quốc, quai dán chắc chắn, đế êm nhẹ, chất liệu bền đẹp, phù hợp đi chơi, dạo phố, du lịch',
                'category_id'=> 2,
                'created_by'=> 3,
                'update_by'=> 3
            ],

            // sandanl 7 17
            [
                'productname'=>'Giày sandan VN2224 hãng vinasan',
                'description'=>'Hình sản phẩm do shop tự chụp 99.9% (lệch màu sắc 0.1% do ánh sáng)',
                'category_id'=> 2,
                'created_by'=> 3,
                'update_by'=> 3
            ],

            // sandanl 8 18
            [
                'productname'=>'Dép Sandanl nữ da lộn đế cao 5cm dành cho giới trẻ',
                'description'=>'Dép sandanl nữ phong cách hiện đại, năng động với thiết kế quai to bản chắc chắn và phần đế cao su dày dặn giúp tăng chiều cao nhẹ nhàng',
                'category_id'=> 2,
                'created_by'=> 3,
                'update_by'=> 3
            ],

            // dép nam 1 19
            [
                'productname'=>'Dép nam chất lượng cao, đế dày chống trượt, khử mùi và chống mài mòn, thiết kế chắc chắn và bền bỉ',
                'description'=>'Dép nam chất lượng cao, đế dày chống trượt, khử mùi và chống mài mòn, thiết kế chắc chắn và bền bỉ',
                'category_id'=> 3,
                'created_by'=> 3,
                'update_by'=> 3
            ],

            // dép nam 2 20
            [
                'productname'=>'Dép nam đế mềm chống trượt cỡ lớn EVA hai chiều EU: 38-45',
                'description'=>'Do sự khác biệt về cài đặt ánh sáng và màn hình, màu sắc của sản phẩm có thể hơi khác so với hình ảnh, vui lòng thông cảm.',
                'category_id'=> 3,
                'created_by'=> 3,
                'update_by'=> 3
            ],

            // dép nam 3 21
            [
                'productname'=>'Dép Nam 2025 Phong Cách Mới Mùa Hè Thường Ngày Thời Trang Ngoài Trời Mặc Chống Trơn Trượt Khử Mùi Đế Dày Thể Thao',
                'description'=>'Dép nam 2025 Mới Mùa hè Thường mặc bên ngoài Không trơn trượt Khử mùi Đáy dày Phòng tắm tại nhà Kích thước lớn Dép đi biển thể thao và Dép đi trong nhà Nam',
                'category_id'=> 3,
                'created_by'=> 3,
                'update_by'=> 3
            ],

            // dép nam 4 22
            [
                'productname'=>'Dép Nam DATINNOS Da Bò 2 Lớp Chắc Chắn Quai Da Mềm Mại,Đế TPR Độ Bền Cao,Êm Chân',
                'description'=>'Sản phẩm từng đường kim mũi chỉ đều gia công thủ công vô cùng chắc chắn và khéo léo từ những người thợ lành nghề nên đảm bảo sản phẩm chỉnh chu nhất khi đến tay khách hàng.',
                'category_id'=> 3,
                'created_by'=> 3,
                'update_by'=> 3
            ],

            // dép nam 5 23
            [
                'productname'=>'Dép Quai Ngang Unisex Nam Nữ DATINNOS Kiểu Dáng Basic,Da Lộn Đế PU Màu Đen Trắng-B03',
                'description'=>'Dép Quai Ngang Unisex Nam Nữ DATINNOS Đế PU Quai Da Lộn Màu Đen Trắng-Hàng Chính Hãng',
                'category_id'=> 3,
                'created_by'=> 3,
                'update_by'=> 3
            ],


        ]);
    }
}