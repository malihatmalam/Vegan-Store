<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector_detail extends Model
{
    protected $table = 'sector_details';
    protected $guarded = [];

    // City - Sector Detail  (One to One)
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function sector()
    {
        return $this->belongsTo(City::class);
    }
    
}
