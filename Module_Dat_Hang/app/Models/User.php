<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // <-- BƯỚC 1: PHẢI CÓ DÒNG NÀY

class User extends Authenticatable
{
    // BƯỚC 2: PHẢI CÓ HasApiTokens Ở ĐÂY
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Chỉ định tên bảng và khóa chính
     */
    protected $table = 'Users';         // BƯỚC 3: Tên bảng viết hoa
    protected $primaryKey = 'UserID';   // BƯỚC 4: Khóa chính
    
    /**
     * Báo cho Laravel biết cột mật khẩu của bạn tên là 'PasswordHash'
     */
    public function getAuthPassword()
    {
        // BƯỚC 5: HÀM QUAN TRỌNG NHẤT
        return $this->PasswordHash;
    }

    /**
     * Các cột được phép "chèn" hàng loạt
     */
    protected $fillable = [
        'Username',
        'FullName',
        'Email',
        'PasswordHash', 
        'Phone',
        'Address',
    ];

    /**
     * Các cột cần GIẤU
     */
    protected $hidden = [
        'PasswordHash', 
        'remember_token',
    ];

    /**
     * Bỏ trống hàm casts
     */
    protected function casts(): array
    {
        return [];
    }
    
    /**
     * Quan hệ với Role (để sau)
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'UserRoles', 'UserID', 'RoleID');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'UserID', 'UserID');
    }

    // Một User có nhiều Đơn hàng
    public function orders()
    {
        return $this->hasMany(Order::class, 'UserID', 'UserID');
    }
}