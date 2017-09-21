<?php

namespace App\Admin\Controllers;

use App\Models\Cooperation;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class CooperationController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('合作伙伴');
            $content->description('管理');

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

            $content->header('合作伙伴');
            $content->description('管理');

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

            $content->header('合作伙伴');
            $content->description('管理');

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
        return Admin::grid(Cooperation::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->url("logo图")->image('',200,50);
            $grid->name('公司名称');
            $grid->address('公司地址');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Cooperation::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->text('name','公司名称');
            $form->image('url', 'logo图')->uniqueName();
            $form->text('address','公司地址')->placeholder('请输入公司地址 也可根据百度地图点选，滚动鼠标滚轮可以放大或者缩小');
            $form->hidden('location','百度坐标');
            $form->baidumap('map','百度地图');

        });
    }
}
