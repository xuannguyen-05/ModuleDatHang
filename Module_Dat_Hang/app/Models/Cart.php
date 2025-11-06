<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'Carts';
    protected $primaryKey = 'CartID';
    // Bảng này có created_at/updated_at nên không cần $timestamps = false

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID', 'UserID');
    }

    // Một Giỏ hàng có nhiều Chi tiết (món hàng)
    public function details()
    {
        return $this->hasMany(CartDetail::class, 'CartID', 'CartID');
    }
}