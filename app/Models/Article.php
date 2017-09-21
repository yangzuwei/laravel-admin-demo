<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class Article extends Model
{

    public function adminUser()
    {
        return $this->hasOne(Adminuser::class,'id','creator');
    }

    public function articleType()
    {
        return $this->hasOne(ArticleType::class,'id','type');
    }

    public function save(array $options = [])
    {

        if($this->isDirty('image') && $this->image != ''){
            $img = Image::make('./upload/'.$this->image);
            $img->resize(78,78);
            $fileName = "image/thumb/".md5(uniqid()).'.'.pathinfo('./upload/image/'.$this->image, PATHINFO_EXTENSION);
            $img->save('./upload/'.$fileName);
            $this->thumb = $fileName;
        }

        //dd(Auth::guard('admin'));
        $this->creator = Auth::guard('admin')->user()->id;
        return parent::save($options);
    }

    public function comments()
    {
        return $this->hasMany(ArticleComments::class,'id','article_id');
    }
}
