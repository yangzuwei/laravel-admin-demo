<?php

namespace App\Admin\Controllers;

use App\Models\AppIntr;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class AppIntrController extends Controller
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

            $content->header('app介绍');
            $content->description('图片介绍(选择最新添加的1条记录作为展示)');

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

            $content->header('app介绍');
            $content->description('图片介绍');

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

            $content->header('app介绍');
            $content->description('图片介绍');

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
        return Admin::grid(AppIntr::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->column('pictures','图片介绍')->image('', 200, 50);
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(AppIntr::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->multipleImage('pictures','图片')->attribute('pictures')->uniqueName();
        });
    }
}
