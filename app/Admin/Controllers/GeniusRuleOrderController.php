<?php

namespace App\Admin\Controllers;

use App\Models\GeniusRuleOrder;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class GeniusRuleOrderController extends Controller
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

            $content->header('牛人自动排序规则');
            $content->description('目前选项设置定义已经完成，运营者只需要调整各项权重即可，不可随意增加字段');

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

            $content->header('牛人自动排序规则');
            $content->description('目前选项设置定义已经完成，运营者只需要调整各项权重即可，不可随意增加字段');

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

            $content->header('牛人自动排序规则');
            $content->description('目前选项设置定义已经完成，运营者只需要调整各项权重即可，不可随意增加字段');

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
        return Admin::grid(GeniusRuleOrder::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->name('字段名');
            $grid->column('weight','权重')->display(function ($weight) {

                return "<span style='color:blue'>$weight%</span>";

            });
            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *带队次数20%，活动次数20%，总公里数20%，动态数20%，点赞数10%，转发数10%
     *$rankWeight = ['create_activity_count'=>0.2,'activity_count'=>0.2,'sport_distance'=>0.2,'story_count'=>0.2,'story_favor_count'=>0.2];
     * @return Form
     */
    protected function form()
    {
        return Admin::form(GeniusRuleOrder::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('field','字段值')->help('此处由开发人员定义，不能随意增加或者随意命名');
            $form->display('name','字段名')->help('此处由开发人员定义，不能随意增加或者随意命名');
            $form->slider('weight','权重')->options(['max' => 100, 'min' => 1, 'step' => 1, 'postfix' => '占比'])->help('权重占比可根据运营规则调整');

        });
    }
}
