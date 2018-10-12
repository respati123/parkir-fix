<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building_tariff extends Model
{
    public $fillable = [
        'building_id','tariff_id','created_at','updated_at'
    ];
}
