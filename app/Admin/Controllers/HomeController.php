<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AppActivity;
use App\Models\Appuser;
use App\Models\Article;
use App\Models\Visitor;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Widgets\InfoBox;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\Table;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class HomeController extends Controller
{
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('表盘');
            $content->description('概览');
            //$content->row(Dashboard::title());
            $content->row(function ($row) {
                $row->column(3, new InfoBox('访问量', 'users', 'aqua', '/admin/sports/ip', Visitor::all()->count()));//Redis::scard("remote_ip")?:0
                $row->column(3, new InfoBox('用户量', 'shopping-cart', 'green', '/admin/app/users', Appuser::all()->count()));
                $row->column(3, new InfoBox('文章数', 'book', 'yellow', '/admin/article', Article::all()->count()));
                $row->column(3, new InfoBox('活动数', 'file', 'red', '/admin/', AppActivity::query("select count(1) from app_activity")->count()));
            });

            $content->row(function(Row $row) {
                $row->column(6, function (Column $column) {
                    $column->append(new Box('流量统计',view('admin.charts.line',['uv'=>$this->PVUV()['uv'],'pv'=>$this->PVUV()['pv']])));
                });
                $headers = ['IP', 'url链接', '阅读数', '最近点击时间'];

                $rows = \DB::select('select ip,url,clicks,updated_at from web_visitors group by ip,url order by updated_at desc limit 6');

                $row->column(6,(new Box('ip记录及浏览记录', new Table($headers, $rows)))->style('info')->solid());
            });

            $content->row(function(Row $row){
                $headers = ['用户账户名', '昵称', '性别','第三方平台', '注册时间'];

                $rows = Appuser::orderBy('create_date','desc')->get(['user_name','nick','sex','plat_id','create_date'])->take(5)->toArray();

                $sexTrans = [1=>'男','2'=>'女'];
                $platTrans = [1=>'QQ',2=>'微信',3=>'微博'];

                foreach ($rows as $k => $v) {
                    $rows[$k]['sex'] = isset($sexTrans[$v['sex']])?$sexTrans[$v['sex']]:'保密';
                    $rows[$k]['plat_id'] = isset($platTrans[$v['plat_id']])?$platTrans[$v['plat_id']]:'凯创app注册';
                    $rows[$k]['create_date'] = date('Y-m-d',$v['create_date']);
                }

                $row->column(12,(new Box('App最新注册记录', new Table($headers, $rows)))->style('info')->solid());
            });

//            $content->row(function (Row $row) {
//                $row->column(4, function (Column $column) {
//                    $column->append(Dashboard::environment());
//                });
//                $row->column(4, function (Column $column) {
//                    $column->append(Dashboard::extensions());
//                });
//                $row->column(4, function (Column $column) {
//                    $column->append(Dashboard::dependencies());
//                });
//            });
        });
    }

    protected function PVUV()
    {
        $label = $PV = $UV = [];
        for($i = 4; $i>=0; $i--){
            $label[] = date('Y-m-d',strtotime('-'.$i.' days'));
        }

        $timeLine = strtotime('-5 days');

        $data = \DB::select('select count(distinct(id)) as ip_count,sum(clicks) as clicks,created_at from web_visitors where created_at > '.$timeLine.' group by created_at');

        foreach ($data as $a){
            $pvuv[substr($a->created_at,0,10)] = ['pv'=>$a->clicks,'uv'=>$a->ip_count];
        }

        foreach ($label as $l){
            if( isset($pvuv[$l])){
                $UV[] = $pvuv[$l]['uv'];
                $PV[] = $pvuv[$l]['pv'];
            }else{
                $UV[] = $PV[] = 0;
            }
        }

        $rs['pv'] = json_encode($PV);
        $rs['uv'] = json_encode($UV);
        return $rs;
    }

    public function index1()
    {
        return Admin::content(function (Content $content) {
            $content->header('表盘');
            $content->description('概览');

            $content->row(function ($row) {
                $row->column(3, new InfoBox('访问量', 'users', 'aqua', '/admin/sports/ip', Visitor::all()->count()));//Redis::scard("remote_ip")?:0
                $row->column(3, new InfoBox('用户量', 'shopping-cart', 'green', '/admin/app/users', Appuser::all()->count()));
                $row->column(3, new InfoBox('文章数', 'book', 'yellow', '/admin/article', Article::all()->count()));
                $row->column(3, new InfoBox('活动数', 'file', 'red', '/admin/', AppActivity::query("select count(1) from app_activity")->count()));
            });

            $content->row(function(Row $row){
                    $row->column(6, function (Column $column) {
                        $column->append((new Box('流量统计（灰色=pv，蓝色=uv）', view('admin.charts.bar')))->removable()->collapsable()->style('danger'));
                    });

                $headers = ['IP', 'url链接', '阅读数', '最近点击时间'];

                $rows = \DB::select('select ip,url,clicks,updated_at from web_visitors group by ip,url order by updated_at desc limit 6');

                $row->column(6,(new Box('ip记录及浏览记录', new Table($headers, $rows)))->style('info')->solid());

            });

            $content->row(function(Row $row){
                $headers = ['用户账户名', '昵称', '性别','第三方平台', '注册时间'];

                $rows = Appuser::orderBy('create_date','desc')->get(['user_name','nick','sex','plat_id','create_date'])->take(5)->toArray();

                $sexTrans = [1=>'男','2'=>'女'];
                $platTrans = [1=>'QQ',2=>'微信',3=>'微博'];

                foreach ($rows as $k => $v) {
                    $rows[$k]['sex'] = isset($sexTrans[$v['sex']])?$sexTrans[$v['sex']]:'保密';
                    $rows[$k]['plat_id'] = isset($platTrans[$v['plat_id']])?$platTrans[$v['plat_id']]:'凯创app注册';
                    $rows[$k]['create_date'] = date('Y-m-d',$v['create_date']);
                }

                $row->column(12,(new Box('App最新注册记录', new Table($headers, $rows)))->style('info')->solid());
            });
        });
    }

    public function index2()
    {
        return Admin::content(function (Content $content) {

            $content->header('表盘');
            $content->description('具体描述');

            $content->row(function ($row) {
                $row->column(3, new InfoBox('访问量', 'users', 'aqua', '/admin/sports/ip', 579));//Redis::scard("remote_ip")Redis::scard("remote_ip")?:0
                $row->column(3, new InfoBox('New Orders', 'shopping-cart', 'green', '/admin/orders', '150%'));
                $row->column(3, new InfoBox('Articles', 'book', 'yellow', '/admin/articles', '2786'));
                $row->column(3, new InfoBox('Documents', 'file', 'red', '/admin/files', '698726'));
            });

            $content->row(function (Row $row) {

                $row->column(6, function (Column $column) {

                    $tab = new Tab();

                    $pie = new Pie([
                        ['Stracke Ltd', 450], ['Halvorson PLC', 650], ['Dicki-Braun', 250], ['Russel-Blanda', 300],
                        ['Emmerich-O\'Keefe', 400], ['Bauch Inc', 200], ['Leannon and Sons', 250], ['Gibson LLC', 250],
                    ]);

                    $tab->add('Pie', $pie);
                    $tab->add('Table', new Table());
                    $tab->add('Text', 'blablablabla....');

                    $tab->dropDown([['Orders', '/admin/orders'], ['administrators', '/admin/administrators']]);
                    $tab->title('Tabs');

                    $column->append($tab);

                    $collapse = new Collapse();

                    $bar = new Bar(
                        ["January", "February", "March", "April", "May", "June", "July"],
                        [
                            ['First', [40,56,67,23,10,45,78]],
                            ['Second', [93,23,12,23,75,21,88]],
                            ['Third', [33,82,34,56,87,12,56]],
                            ['Forth', [34,25,67,12,48,91,16]],
                        ]
                    );
                    $collapse->add('Bar', $bar);
                    $collapse->add('Orders', new Table());
                    $column->append($collapse);

                    $doughnut = new Doughnut([
                        ['Chrome', 700],
                        ['IE', 500],
                        ['FireFox', 400],
                        ['Safari', 600],
                        ['Opera', 300],
                        ['Navigator', 100],
                    ]);
                    $column->append((new Box('Doughnut', $doughnut))->removable()->collapsable()->style('info'));
                });

                $row->column(6, function (Column $column) {

                    $column->append(new Box('Radar', new Radar()));

                    $polarArea = new PolarArea([
                        ['Red', 300],
                        ['Blue', 450],
                        ['Green', 700],
                        ['Yellow', 280],
                        ['Black', 425],
                        ['Gray', 1000],
                    ]);
                    $column->append((new Box('Polar Area', $polarArea))->removable()->collapsable());

                    $column->append((new Box('Line', new Line()))->removable()->collapsable()->style('danger'));
                });

            });

            $headers = ['Id', 'Email', 'Name', 'Company', 'Last Login', 'Status'];
            $rows = [
                [1, 'labore21@yahoo.com', 'Ms. Clotilde Gibson', 'Goodwin-Watsica', '1997-08-13 13:59:21', 'open'],
                [2, 'omnis.in@hotmail.com', 'Allie Kuhic', 'Murphy, Koepp and Morar', '1988-07-19 03:19:08', 'blocked'],
                [3, 'quia65@hotmail.com', 'Prof. Drew Heller', 'Kihn LLC', '1978-06-19 11:12:57', 'blocked'],
                [4, 'xet@yahoo.com', 'William Koss', 'Becker-Raynor', '1988-09-07 23:57:45', 'open'],
                [5, 'ipsa.aut@gmail.com', 'Ms. Antonietta Kozey Jr.', 'Braun Ltd', '2013-10-16 10:00:01', 'open'],
            ];

            $content->row((new Box('Table', new Table($headers, $rows)))->style('info')->solid());
        });
    }

}
