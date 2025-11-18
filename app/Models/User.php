<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Role;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'password',
        'fullname',
        'phone',
        'address',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function cart()
    {
        //một User có 1 giỏ hàng đang hoạt động
        return $this->hasOne(Cart::class, 'user_id', 'id')->where('status', 0);
    }

    public function orders()
    {
        //một User có nhiều Order
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    public function roles()
    {
        //nhiều User thuộc nhiều Role thông qua bảng 'userroles'
        return $this->belongsToMany(Role::class, 'userroles', 'user_id', 'role_id', 'id','role_id');
    }
}