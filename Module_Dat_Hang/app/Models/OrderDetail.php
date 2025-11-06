<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'OrderDetails';
    protected $primaryKey = 'OrderDetailID';
    public $timestamps = false;
    protected $fillable = [
        'OrderID',
        'VariantID',
        'Quantity',
        'UnitPrice'
    ];
}