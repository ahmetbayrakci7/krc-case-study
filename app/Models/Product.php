<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'vendor',
        'sku',
        'name',
        'description',
        'price',
        'category',
        'brand',
        'manufacturer',
        'shipping_cost',
        'shipping_time',
        'is_stock',
        'image'
    ];
}
