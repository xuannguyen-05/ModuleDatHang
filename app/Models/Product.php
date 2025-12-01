<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'product_id';
    public $timestamps = true; 

    protected $fillable = [
        'productname',
        'description',
        'category_id',
        'created_by',
        'update_by',
    ];

    public function category()
    {
        //mMột Product thuộc về một Category
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function variants()
    {
        //một Product có nhiều ProductVariant
        return $this->hasMany(ProductVariant::class, 'product_id', 'product_id');
    }
    public function minPriceVariant()
    {
        return $this->hasOne(ProductVariant::class, 'product_id')->orderBy('price', 'asc');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}