<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // hiển thị form thay đổi địa chỉ
    public function showAddressForm()
    {
        $user = Auth::user();
        return view('Product.adress', compact('user'));
    }

    public function updateAddress(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
        ]);
        $user = Auth::user();
        //cập nhật thông tin từ 'users'
        $user->fullname = $request->input('fullname');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        
        $user->save();

        return redirect()->route('checkout.show')->with('success', 'Đã cập nhật địa chỉ thành công!');
    }
}