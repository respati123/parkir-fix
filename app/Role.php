<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name','created_at','created_by','modifier_at','modifier_by','id'
    ];

    public function permission(){

        return $this->belongsToMany(Permission::class);
    }

    public function menu(){
        return $this->belongsToMany(Menu::class);
    }

    public function user(){
        return $this->belongsToMany(User::class);
    }

}
