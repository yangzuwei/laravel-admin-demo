<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class ArticleComments extends Model
{
    protected $table = 'article_comments';

    public function appUser()
    {
        return $this->hasOne(Appuser::class,'id','uid');
    }
}
