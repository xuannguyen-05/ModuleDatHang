<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'Orders';
    protected $primaryKey = 'OrderID';

    protected $fillable = [
        'UserID',
        'ShippingAddress',
        'TotalAmount',
        'Status',
        'updated_by'
    ];

    // Một Đơn hàng thuộc về 1 User
    public function user()
    {
        return $this->belongsTo(User::class, 'UserID', 'UserID');
    }

    // Một Đơn hàng có nhiều Chi tiết
    public function details()
    {
        return $this->hasMany(OrderDetail::class, 'OrderID', 'OrderID');
    }

}