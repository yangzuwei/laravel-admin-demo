<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Appuser extends Authenticatable
{
    protected $connection = 'mysql2';
    protected $table = 'app_users';
    public $timestamps = false;
    //protected $visible = ['id','email','name'];

    protected $fillable = ['user_name','password','nick','is_genius'];

    public function sportRole()
    {
        return $this->hasOne(SportRoles::class,'id','role');
    }

    public function slogan()
    {
        return $this->hasOne(Slogan::class,'uid','id');
    }
}
