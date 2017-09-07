<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Img extends Model
{
    protected $table = 'img';

    public function setImgAttribute($pictures)
    {
        if (is_array($pictures)) {
            $this->attributes['img'] = json_encode($pictures);
        }
    }

    public function getImgAttribute($pictures)
    {
        return json_decode($pictures, true);
    }
}
