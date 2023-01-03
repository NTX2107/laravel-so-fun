<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_id',
        'product_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'id', 'cart_id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'id', 'product_id');
    }
}
