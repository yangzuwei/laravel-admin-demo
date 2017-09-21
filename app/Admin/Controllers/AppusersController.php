<?php

namespace App\Admin\Controllers;

use Encore\Admin\Auth\Permission;
use App\Models\Appuser;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class AppusersController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        //Permission::check('only-users');
        //Permission::allow(['web_admin', 'customer']);
        //将牛人用户加入到牛人排序列表中

        \DB::connection("mysql2")->select('insert into app_genius_order(uid) select u.id uid from app_users as u left join app_genius_order as g on g.uid=u.id where u.is_genius = 1 and g.uid is null');

        //从genius order 表中删除已经不是牛人的用户
        \DB::connection("mysql2")->delete('delete from app_genius_order where uid not in (select id from app_users where is_genius =1) ');

        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

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

            $content->header('header');
            $content->description('description');

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

            $content->header('header');
            $content->description('description');

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
        return Admin::grid(Appuser::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->user_name('用户名');
            $grid->nick('昵称');

            $states = [
                'on'  => ['value' => 1, 'text' => '是', 'color' => 'primary'],
                'off' => ['value' => 0, 'text' => '否', 'color' => 'default'],
            ];

            $grid->is_genius('是否牛人')->switch($states);
            $grid->filter(function ($filter) {
                $filter->disableIdFilter();
                // 设置created_at字段的范围查询
                $filter->like('nick','昵称');//between('created_at', 'Created Time')->datetime();
            });
//            $grid->created_at();
//            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Appuser::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('nick', '姓名')->rules('required');
            $form->switch('is_genius','是否牛人');
//            $form->display('created_at', 'Created At');
//            $form->display('updated_at', 'Updated At');
        });
    }

}
