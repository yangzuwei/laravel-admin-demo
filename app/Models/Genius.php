<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genius extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'app_genius_order';

    protected $primaryKey = 'uid';

    public function appUser()
    {
        return $this->hasOne(Appuser::class,"id","uid");
    }

    public function story()
    {
        return $this->hasMany(Story::class,"uid","uid");
    }

    public function slogan()
    {
        return $this->hasOne(Slogan::class,'uid','uid');
    }
}