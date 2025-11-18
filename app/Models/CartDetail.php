<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use App\Models\ProductVariant;

class CartDetail extends Model
{
    use HasFactory;
    protected $table = 'cart_details';
    protected $primaryKey = 'cartdetail_id';
    protected $fillable = [
        'cart_id',
        'variant_id', 
        'size',      
        'quantity',
        'unitprice',
    ];

    public function cart()
    {
        //một chi tiết CartDetail thuộc về một (belongsTo) giỏ hàng
        return $this->belongsTo(Cart::class, 'cart_id', 'cart_id');
    }

    public function variant()
    {
        //một chi tiết CartDetail thuộc về một (belongsTo) ProductVariant
        return $this->belongsTo(ProductVariant::class, 'variant_id', 'variant_id');
    }
}