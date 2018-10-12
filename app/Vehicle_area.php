<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\VehicleTypes;
use App\Area;

class Vehicle_area extends Model
{
    public $fillable = [
        'id','area_id','vehicle_id','jumlah','created_at','updated_at'
    ];

    public function area(){
        return $this->belongsTo('App\Area','area_id');
    }

    public function vehicle_types(){
        return $this->hasMany(VehicleTypes::class);
    }

}
