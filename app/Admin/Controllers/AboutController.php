<?php

namespace App\Admin\Controllers;

use App\Models\About;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class AboutController extends Controller
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

            $content->header('底端管理');
            $content->description('关于');

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

            $content->header('底端管理');
            $content->description('关于');

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

            $content->header('底端管理');
            $content->description('关于');

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
        return Admin::grid(About::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->title('关于名称')->sortable();
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
        return Admin::form(About::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('title', '关于名称');

//            $form->display('pictures','介绍图片')->with(function($pictures){
//                $t = '';
//                if(!$pictures){
//                    return '<p>如果需要选择多张图，请按住ctrl键;</p>';
//                }
//                foreach ($pictures as $p){
//                    $t .="<img src=/upload/".$p." />";
//                }
//                return $t.'<p>如果需要选择多张图，请按住ctrl键;</p>';
//            });

            $form->multipleImage('pictures','图片')->attribute('pictures')->uniqueName();
        });
    }

}
