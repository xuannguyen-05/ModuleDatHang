<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Thêm Model User
use App\Models\Role; // Thêm Model Role
use Illuminate\Support\Facades\Hash; // Thêm Hash
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // === HÀM ĐĂNG KÝ (REGISTER) ===
   public function register(Request $request)
    {
        // 1. SỬA LỖI: Validate TẤT CẢ các trường mà API yêu cầu
        // Key "fullName" (N hoa) phải khớp với JavaScript
        $validator = Validator::make($request->all(), [
            'fullName' => 'required|string|max:255', // <-- Key là 'fullName'
            'email'    => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => ['required', 'confirmed', Password::min(8)], // 'confirmed' tự động check 'password_confirmation'
        ]);

        if ($validator->fails()) {
            // Trả về lỗi 422 để JavaScript (hàm handleApiResponse) bắt được
            return response()->json([
                'message' => 'Dữ liệu không hợp lệ.',
                'errors' => $validator->errors()
            ], 422); 
        }

        // 2. SỬA LỖI: Tạo User với đúng các trường
        try {
            $user = User::create([
                'fullName' => $request->fullName, // <-- Key là 'fullName'
                'email'    => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                // 'role' => 'Customer' // (Tùy chọn, nếu bạn có cột 'role')
            ]);

            // 3. Trả về phản hồi thành công
            return response()->json([
                'message' => 'Đăng ký thành công'
            ], 201); // 201 Created

        } catch (\Exception $e) {
            // Xử lý nếu có lỗi database
            return response()->json([
                'message' => 'Không thể tạo tài khoản. Vui lòng thử lại.'
            ], 500);
        }
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