<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $table = 'web_visitors';

    protected $fillable = ['ip','url','created_at'];

    //ip地址和流量统计 放在AppServiceProvider boot中
    public static function ipCount()
    {
        $data['ip'] = $_SERVER['REMOTE_ADDR'];
        $data['url'] = $_SERVER['REQUEST_URI'];
        $data['created_at'] = date('Y-m-d');

        //今天是否存在这条记录 不存在则插入记录 存在则增加clicks
        self::updateOrCreate($data);

        return self::where($data)->increment('clicks');
    }

}
