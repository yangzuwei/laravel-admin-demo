<?php

namespace App\Admin\Controllers;

use App\Models\Appuser;
use App\Models\Genius;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class GeniusController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        //将牛人用户加入到牛人排序列表中

        \DB::connection("mysql2")->select('insert into app_genius_order(uid) select u.id uid from app_users as u left join app_genius_order as g on g.uid=u.id where u.is_genius = 1 and g.uid is null');

        //从genius order 表中删除已经不是牛人的用户
        \DB::connection("mysql2")->delete('delete from app_genius_order where uid not in (select id from app_users where is_genius =1) ');
        return Admin::content(function (Content $content) {

            $content->header('牛人排序');
            $content->description('手动排序');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('牛人排序');
            $content->description('手动排序');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('牛人排序');
            $content->description('手动排序');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Genius::class, function (Grid $grid) {

            $grid->uid('ID')->sortable();

            $grid->column('nick','昵称')->display(function (){
                return $this->appuser->nick;
            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Genius::class, function (Form $form) {

            $form->display('uid','用户id');
            $form->display('nick','昵称')->with(function (){
                return $this->appuser->nick;
            });

            $form->number('order_num','排序权重值')->help('越大越靠前，每天0点由系统自动计算得出，所以手动改动只能维持一天');
        });
    }
}
