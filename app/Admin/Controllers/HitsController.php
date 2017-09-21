<?php

namespace App\Admin\Controllers;

use App\Models\Hits;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class HitsController extends Controller
{
    use ModelForm;

    protected static $positions = [
        1 => '置顶大图',
        2 => '右下小图',
    ];

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('黑特斯');
            $content->description('页面图片管理');

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

            $content->header('黑特斯');
            $content->description('页面图片管理');

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

            $content->header('黑特斯');
            $content->description('页面图片管理');

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
        return Admin::grid(Hits::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->tips('产品说明');
            $grid->column('position','图片位置')->display(function($position){
                return self::$positions[$position];
            });
            $grid->link('产品链接');
            $grid->url('产品图')->image('',200,30);
            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Hits::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->text('tips', '产品说明');
            $form->url('link', '商品链接');
            $form->radio('position','图片位置')->options(self::$positions)->default(1);
            $form->image('url', '产品图');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
