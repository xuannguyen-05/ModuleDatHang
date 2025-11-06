# 🚀 Module đặt hàng (Project_Ban_Giay)

Đây là dự án môn học, được xây dựng theo kiến trúc tách biệt Backend và Frontend (API).

- `/backend`: Project Laravel, đóng vai trò là API Server
- `/frontend`: Project HTML/CSS/JS, đóng vai trò là Client.

---

## ⚙️ Cách cài đặt và chạy Backend (Nhà bếp)

1.  Mở Terminal (XAMPP Shell) và `cd` vào thư mục `backend`:

    ```bash
    cd backend
    ```

2.  Cài đặt thư viện (vendor):

    ```bash
    composer install
    ```

3.  Copy file `.env.example` thành `.env`:

    ```bash
    copy .env.example .env
    ```

4.  Mở file `.env` và sửa thông tin Database (cho XAMPP):

    ```ini
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_DATABASE=shoes_store_db
    DB_USERNAME=root
    DB_PASSWORD=
    ```

5.  Tạo "chìa khóa" cho Laravel:

    ```bash
    php artisan key:generate
    ```

6.  **QUAN TRỌNG:** Mở **phpMyAdmin** và import (nhập) file `db.sql` (file bạn đã xuất ra) để tạo 10 bảng và dữ liệu mẫu.

7.  Chạy lệnh `migrate` (để tạo bảng `personal_access_tokens`):

    ```bash
    php artisan migrate
    ```

8.  Khởi động server (Nhà bếp phải "mở cửa"):
    ```bash
    php artisan serve
    ```
    _Server sẽ chạy ở `http://127.0.0.1:8000`._

---

## 🎨 Cách chạy Frontend (Phòng ăn)

1.  Mở một **Terminal thứ hai**.
2.  `cd` vào thư mục `frontend`:
    ```bash
    cd frontend
    ```
3.  **YÊU CẦU:** Cần cài extension **Live Server** trên VS Code.
4.  Mở file `login.html` bằng VS Code, bấm chuột phải và chọn "Open with Live Server".
5.  Trình duyệt sẽ tự động mở ở (ví dụ) `http://127.0.0.1:5500/frontend/login.html`.

**LƯU Ý:** Đảm bảo Backend (`:8000`) và Frontend (`:5500`) chạy song song.
