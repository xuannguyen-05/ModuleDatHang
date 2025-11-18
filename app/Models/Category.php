<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    
    public $timestamps = false; 

    protected $fillable = [
        'categoryname',
        'description',
    ];

    public function products()
    {
        //một Category có nhiều Product
        return $this->hasMany(Product::class, 'category_id', 'category_id');
    }
}