<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    public $timestamps = false;
    public $fillable = [
        'id','vehicle_types_id','classes_id','nominal','created_at','created_by','modified_at','modified_by'
    ];

    public function vehicleTypes(){
        return $this->belongsTo(VehicleTypes::class,'vehicle_types_id');
    }

    public function classes(){
        return $this->belongsTo(Classes::class,'classes_id');
    }

}
