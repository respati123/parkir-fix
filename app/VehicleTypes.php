<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tariff;
use App\Vehicle_area;
class VehicleTypes extends Model
{
    public $fillable = [
        'id','name','description'
    ];

    public function tariff(){
        return $this->hasMany('App\Tariff');
    }

    public function vehicle_area(){
        return $this->belongsTo(Vehicle_area::class);
    }
}
