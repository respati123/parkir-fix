<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public $fillable = [
        'name','building_id','created_at','updated_at'
    ];

    public function vehicle_area(){
        return $this->hasMany(Vehicle_area::class);
    }
}
