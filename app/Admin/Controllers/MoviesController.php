<?php

namespace App\admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Layout\Content;
use App\admin\Models\Movie;
use Encore\Admin\Grid;
use Encore\Admin\Form;
use Encore\Admin\Facades\Admin;

class MoviesController extends Controller
{
    //
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->grid());
        });
    }

    public function po()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    public function grid()
    {
        return Admin::grid(Movie::class, function(Grid $grid){

            // 第一列显示id字段，并将这一列设置为可排序列
            $grid->id('ID')->sortable();

            // 第二列显示title字段，由于title字段名和Grid对象的title方法冲突，所以用Grid的column()方法代替
            $grid->column('title');

            // 第三列显示director字段，通过display($callback)方法设置这一列的显示内容为users表中对应的用户名
            $grid->director()->display(function($userId) {
                return User::find($userId)->id;
            });

            // 第四列显示为describe字段
            $grid->describe();

            // 第五列显示为rate字段
            $grid->rate();

            // 第六列显示released字段，通过display($callback)方法来格式化显示输出
            $grid->released('上映?')->display(function ($released) {
                return $released ? '是' : '否';
            });

            // 下面为三个时间字段的列显示
            $grid->release_at();
            $grid->created_at();
            $grid->updated_at();

            // filter($callback)方法用来设置表格的简单搜索框
            $grid->filter(function ($filter) {
                // 设置created_at字段的范围查询
                $filter->between('created_at', 'Created Time')->datetime();
            });
        });
    }

    public function form()
    {
        return Admin::form(Movie::class, function (Form $form) {

            //$form->setAction('admin/users');
            // 显示记录id
            $form->display('id', 'ID');

            // 添加text类型的input框
            $form->text('title', '电影标题');

            $directors = [
                'John'  => 1,
                'Smith' => 2,
                'Kate'  => 3,
            ];

            $form->select('director', '导演')->options($directors);

            // 添加describe的textarea输入框
            $form->textarea('describe', '简介');

            // 数字输入框
            $form->number('rate', '打分');

            // 添加开关操作
            $form->switch('released', '发布？');

            // 添加日期时间选择框
            $form->dateTime('release_at', '发布时间');

            // 两个时间显示
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '修改时间');
            $form->saving(function (Form $form) {

                throw new \Exception('出错啦。。。');

            });

        });
    }
}
