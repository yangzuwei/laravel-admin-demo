<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppActivity extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'app_activity';
    public $timestamps = false;

    public function activityUsers()
    {
        return $this->hasMany(AppActivityUsers::class,'activity_id','id');
    }

    public function appUser()
    {
        return $this->hasOne(Appuser::class,'id','uid');
    }

    public function slogan()
    {
        return $this->hasOne(Slogan::class,'uid','uid');
    }

    public function story()
    {
        return $this->hasMany(Story::class,"uid","uid");
    }

}
