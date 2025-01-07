<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    protected $guarded=[];
    public $timestamps=false;
    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // public function product()
    // {
    //     return $this->belongsToMany(product::class,'wishlist');
    // }
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'user_id');
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }

}
