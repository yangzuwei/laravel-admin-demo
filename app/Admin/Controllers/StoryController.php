<?php

namespace App\Admin\Controllers;

use App\Models\Story;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class StoryController extends Controller
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

            $content->header('动态管理');
            $content->description('用于审核和删除，尽量不要修改');

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

            $content->header('动态管理');
            $content->description('用于审核和删除，尽量不要修改');

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

            $content->header('动态管理');
            $content->description('用于审核和删除，尽量不要修改');

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
        return Admin::grid(Story::class, function (Grid $grid) {
            $grid->model()->orderBy('id', 'desc');
            $grid->id('ID')->sortable('desc');

            $grid->title('标题');
            $grid->content('内容');
            $grid->column('images','图片')->image('', 200, 50);

            $grid->create_date("发表时间");
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Story::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->text('title','标题');
            $form->text('content','内容');

            $form->multipleImage('images','图片');

            $form->display('created_date', '发表时间');
        });
    }
}
