<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('Auth.login');
    }
    public function register(){
        return view('Auth.register');
    }

    public function posrtRegister(RegisterRequest $register){
        User::create([
            'name'=>$register->get('name'),
            'email'=>$register->get('email'),
            'password'=>Hash::make($register->get('password'))
        ]);

        return redirect()->route('index')->with('message','Đăng kí thành công! ');
    }

    // public function postLogin(PostRequest $register){
    //     $dangNhap = $register->only('email', 'password');
    //     if(Auth::attempt($dangNhap)){
    //         $register->session()->regenerate();
    //         return redirect()->intended('/');
    //     }

    //     return back()->withErrors(['password'=>'Mật khẩu không đúng']);
    // }

    public function postLogin(PostRequest $request){ // Đổi tên biến $register thành $request
        $dangNhap = $request->only('email', 'password');
        
        if(Auth::attempt($dangNhap)){
            $request->session()->regenerate();

            // 1. Lấy người dùng vừa đăng nhập
            $user = Auth::user();

            // 2. Kiểm tra vai trò (rolename)
            // (Đảm bảo Model User của bạn đã có hàm roles() như bước trước)
            if ($user->roles()->where('rolename', 'manager')->exists()) {
                
                // 3. Nếu là Admin -> Chuyển đến trang duyệt đơn
                return redirect()->route('manager.orders.index');
            }
            
            // 4. Nếu là người dùng thường -> Chuyển về trang chủ
            return redirect()->intended('/');
        }

        return back()->withErrors(['password'=>'Mật khẩu không đúng']);
    }

    public function logout(Request $register){
        Auth::logout();
        $register->session()->invalidate();
        $register->session()->regenerateToken();
        return redirect()->route('index');

    }

}
