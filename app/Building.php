<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    public $timestamps = false;
    public $fillable = [
        'name',
        'categories_id',
        'location_id',
        'alamat',
        'lat',
        'lng',
        'created_at',
        'updated_at'
    ];
}
