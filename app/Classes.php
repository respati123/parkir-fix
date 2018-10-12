<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    public $fillable = [
         'name','description'
    ];

    public function tariff(){
        return $this->hasMany(Tariff::class);
    }
}
