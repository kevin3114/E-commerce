<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class product extends Model
{
    use HasFactory;
    protected $guarded=[];
    public $timestamps=false;

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'product_id');
    }

    public function cart()
    {
        return $this->hasMany(cart::class, 'product_id');
    }
    public function cartItems()
    {
        return $this->hasMany(cart_item::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product');
    }

    public function cart_items()
    {
        return $this->hasMany(cart_item::class);
    }
}
