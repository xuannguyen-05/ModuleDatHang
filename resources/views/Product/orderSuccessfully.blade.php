<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Địa chỉ mới</title>
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <div class="modal">
    <div class="modal-container orderSuccessfullyform">
        <div class="orderSuccessfully">
            <i class=" fa-solid fa-circle-check"></i>
            <span class="orderSuccessfullyName">Đặt hàng thành công</span>
        </div>

        <span class="orderSuccessfullyDicripsion">Cảm ơn bạn đã đặt hàng của shop - Chỉ nhận hàng và thanh toán khi đơn mua ở trạng thái "Đang giao hàng". Chúc bạn có một này tốt lành !</span>

        <div class="form-group ">
            <div class="address-type orderSuccessfullyBTN">
                <a href="{{route('index')}}"><button type="button" class="type-btn active type-btnBTN">Trang Chủ</button></a>
                <a href="{{route('myOrder')}}"><button type="button" class="type-btn type-btnBTN">Đơn Mua</button></a>
            </div>
        </div>

    </div>
  </div>
</body>
</html>
