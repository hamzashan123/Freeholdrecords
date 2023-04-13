<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'order_products';

    public $timestamps = false;
    public $incrementing = false;

    
    public function orderproducts()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    
}
