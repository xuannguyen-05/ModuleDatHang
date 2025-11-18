<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\CartDetail;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $primaryKey = 'cart_id';

    protected $fillable = [
        'user_id',
        'status',
    ];

    public function user()
    {
        //một giỏ hàng thuộc về một (belongsTo) người dùng
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    //lấy tất cả các chi tiết (sản phẩm) trong giỏ hàng này
    public function details()
    {
        //một giỏ hàng có nhiều (hasMany) chi tiết CartDetail
        return $this->hasMany(CartDetail::class, 'cart_id', 'cart_id');
    }
}