<?php

namespace App;

use App\Encrypt\Encryptable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Crypt;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */



    public $timestamps = false;
    
    protected $fillable = [
        'name','username','email', 'password','created_by','created_at','modifier_by','modifier_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'remember_token','id'
    ];

    public function role(){
        return $this->belongsToMany(Role::class);
    }
}
