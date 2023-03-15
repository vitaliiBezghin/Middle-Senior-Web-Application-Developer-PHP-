<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $fillable = [
        'cart',
        'product_id',
        'price',
        'quantity'
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_cart')->withPivot([
            'quantity',
            'price'
        ]);
    }
}
