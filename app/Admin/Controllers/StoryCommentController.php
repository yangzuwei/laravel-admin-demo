<?php

namespace App\Admin\Controllers;

use App\Models\StoryComment;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class StoryCommentController extends Controller
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

            $content->header('评论管理');
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

            $content->header('评论管理');
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

            $content->header('评论管理');
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
        return Admin::grid(StoryComment::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->msg_content('评论内容');
            $grid->msg_date('评论时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(StoryComment::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('msg_content', '评论内容');
            $form->display('msg_date', '评论时间');
        });
    }
}
