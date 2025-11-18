<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class ProductVariant extends Model
{
    use HasFactory;

    protected $table = 'product_variants';
    protected $primaryKey = 'variant_id';
    
    public $timestamps = false; 

    protected $fillable = [
        'product_id',
        'size',
        'color',
        'price', 
        'img_ulr',
        'quantity',
    ];

    public function product()
    {
        //một ProductVariant thuộc về một Product
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

}