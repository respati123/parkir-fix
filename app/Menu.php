<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public $fillable = [
        'id','name','parent_id','created_by','created_at','modifier_by','modifier_at'
    ];

    public $timestamps = false;

    public function role(){
        return $this->belongsToMany(Role::class);

    }



}
