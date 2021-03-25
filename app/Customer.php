<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Customer extends Model
{

    protected $guarded = [];

    protected $hidden = [
        'password', 
        'remember_token',
        // 'balance'
    ];

    // Customer - Order (One to Many)
    public function order()
    {
        return $this->hasMany(Order::class);
    }

    // Sector - Customer (One to Many)
    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

}
