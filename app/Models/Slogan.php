<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slogan extends Model
{
    protected $connection = 'mysql';

    protected $table = 'slogan';

    protected $primaryKey = "uid";

    protected $fillable = ['uid','personal_slogan','horde_slogan','cover_img'];

}
