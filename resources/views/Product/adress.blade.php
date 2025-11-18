<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Địa chỉ mới</title>
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
  <div class="modal">
    <div class="modal-container">
      <h2>Địa chỉ mới</h2>
         <form class="address-form" action="{{ route('address.update') }}" method="POST">
            @csrf 
            @method('PATCH') 

            <div class="form-row">
                <input type="text" name="fullname" placeholder="Họ và tên" value="{{ old('fullname', $user->fullname) }}" required>
                <input type="tel" name="phone" placeholder="Số điện thoại" value="{{ old('phone', $user->phone) }}" required>
            </div>

            <div class="form-row">
                <input type="text" name="address" placeholder="Địa chỉ cụ thể" value="{{ old('address', $user->address) }}" required>
            </div>

            <div class="form-group">
                <label>Loại địa chỉ:</label>
                <div class="address-type">
                    <button type="button" class="type-btn active">Nhà Riêng</button>
                    <button type="button" class="type-btn">Văn Phòng</button>
                </div>
            </div>

            <div class="form-footer">
              <label><input type="checkbox"> Đặt làm địa chỉ mặc định</label>
            </div>

            <div class="form-actions">
                <a href="{{ route('checkout.show') }}" class="btn-cancel" style="text-decoration: none; color: black">Trở Lại</a>
                <button type="submit" class="btn-submit">Lưu Thông Tin</button>
            </div>
        </form>
    </div>
  </div>
</body>
</html>
