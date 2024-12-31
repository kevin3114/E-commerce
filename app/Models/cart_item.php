<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\FileCouldNotBeWrittenException;

class cart_item extends Model
{
    use HasFactory;

    protected $guarded=[];  
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Define the relationship between CartItem and Cart
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
