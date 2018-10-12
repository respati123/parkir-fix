<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    public $fillable = [
        'building_id','path_name','created_at','updated_at'
    ];

    
}
