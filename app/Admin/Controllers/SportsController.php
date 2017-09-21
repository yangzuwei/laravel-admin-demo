<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\Table;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Auth\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class SportsController extends Controller
{
    //
    public function record(Request $request)
    {
//        Permission::check('all');
//        $ip = $request->server->all()['REMOTE_ADDR'];
//        Redis::sadd("remote_ip",$ip);
    }

    public function ipCount()
    {
        return Admin::content(function (Content $content) {

//            $headers = ['Id', 'ip', ];
//            $ips = Redis::smembers('remote_ip');
//            $rows = [];
//            foreach ($ips as $key=>$ip)
//            {
//                $rows[] = [$key,$ip];
//            }
//            $rows = [
//                [1, 'labore21@yahoo.com', 'Ms. Clotilde Gibson', 'Goodwin-Watsica', '1997-08-13 13:59:21', 'open'],
//                [2, 'omnis.in@hotmail.com', 'Allie Kuhic', 'Murphy, Koepp and Morar', '1988-07-19 03:19:08', 'blocked'],
//                [3, 'quia65@hotmail.com', 'Prof. Drew Heller', 'Kihn LLC', '1978-06-19 11:12:57', 'blocked'],
//                [4, 'xet@yahoo.com', 'William Koss', 'Becker-Raynor', '1988-09-07 23:57:45', 'open'],
//                [5, 'ipsa.aut@gmail.com', 'Ms. Antonietta Kozey Jr.', 'Braun Ltd', '2013-10-16 10:00:01', 'open'],
//            ];
//            $content->row((new Box('最近ip', new Table($headers, $rows)))->style('default')->solid());
        });
    }

}
