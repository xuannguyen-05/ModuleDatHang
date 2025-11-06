<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Thêm Model User
use App\Models\Role; // Thêm Model Role
use Illuminate\Support\Facades\Hash; // Thêm Hash
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // === HÀM ĐĂNG KÝ (REGISTER) ===
    public function register(Request $request)
    {
        // 1. Kiểm tra dữ liệu
        $request->validate([
            'Username' => 'required|string|unique:Users,Username',
            'Email' => 'required|string|email|unique:Users,Email',
            'PasswordHash' => 'required|string|min:6',
            'FullName' => 'required|string',
        ]);

        // 2. Tìm Role 'Customer'
        $customerRole = Role::where('RoleName', 'Customer')->first();
        if (!$customerRole) {
            // Nếu chưa có Role Customer trong DB, báo lỗi
            return response()->json(['message' => 'Lỗi hệ thống: Không tìm thấy vai trò Customer.'], 500);
        }

        // 3. Tạo User
        $user = User::create([
            'Username' => $request->Username,
            'Email' => $request->Email,
            'FullName' => $request->FullName,
            'PasswordHash' => Hash::make($request->PasswordHash), // MÃ HÓA MẬT KHẨU
        ]);

        // 4. Gán vai trò 'Customer' cho user mới
        $user->roles()->attach($customerRole->RoleID);

        return response()->json(['message' => 'Đăng ký thành công'], 201);
    }

    // === HÀM ĐĂNG NHẬP (LOGIN) ===
    public function login(Request $request)
    {
        // 1. Kiểm tra dữ liệu đầu vào
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // 2. Tìm user
        $user = User::where('Username', $request->username)->first();

        // 3. Kiểm tra user và mật khẩu
        // File User.php đã báo cho Laravel cột mật khẩu là 'PasswordHash'
        if (! $user || ! Hash::check($request->password, $user->PasswordHash)) {
            // Nếu sai, báo lỗi
            throw ValidationException::withMessages([
                'username' => ['Tên đăng nhập hoặc mật khẩu không đúng.'],
            ]);
        }

        // 4. Nếu đúng, tạo Token
        $token = $user->createToken('api-token')->plainTextToken;

        // 5. Trả về Token và thông tin user
        return response()->json([
            'message' => 'Đăng nhập thành công',
            'token' => $token,
            'user' => $user
        ], 200);
    }
    
    // === HÀM LẤY THÔNG TIN USER ===
    public function me(Request $request)
    {
        // Laravel tự động lấy user dựa trên Token
        return $request->user();
    }
}