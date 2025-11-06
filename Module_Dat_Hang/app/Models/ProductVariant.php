<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;
    protected $table = 'ProductsVariants'; // Tên bảng
    protected $primaryKey = 'VariantID'; // Khóa chính 
    public $timestamps = false; // Bảng này không có created_at/updated_at

    public function product()
{
    return $this->belongsTo(Product::class, 'ProductID', 'ProductID');
}
}