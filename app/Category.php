<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $guarded = [];

    // Category - Product (One to Many) 
    public function product()
    { 
        return $this->hasMany(Product::class);
    }

}
