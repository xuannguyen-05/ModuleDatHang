<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;
    protected $table = 'CartDetails';
    protected $primaryKey = 'CartDetailID';
    public $timestamps = false;

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class, 'VariantID', 'VariantID');
    }

    public function cart()
    {
    return $this->belongsTo(Cart::class, 'CartID', 'CartID');
    }
}