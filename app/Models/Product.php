<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
      'product_name',
      'price'
    ];

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'product_cart');
    }
}
