<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppActivityUsers extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'app_activity_user';
    public $timestamps = false;

    public function addUser($activityId,$uid)
    {
        $this->activity_id = $activityId;
        $this->uid = $uid;
        return $this->save();
    }

    public function appUser()
    {
        return $this->hasOne(Appuser::class,'id','uid');
    }

    public function story()
    {
        return $this->hasMany(Story::class,"uid","uid");
    }

}
