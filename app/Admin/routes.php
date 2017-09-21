<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    $router->resource('img',ImgController::class);

    $router->get('/lock',function(){

        $header = '<h1>此功能暂未开放！</h1><br>附<b>'.date('Y-m-d').'</b>更新说明如下：';

        $notice = '<ul>
<li>正在开发中……</li>
</ul>';

        $end = '<br><p>请测试其它可用功能并及时反馈</p>';

        echo $header.$notice.$end;
    });

    $router->get('/auth','HomeController@index');

    $router->get('sports/record','SportsController@record');

    $router->get('sports/ip','SportsController@ipCount');
    $router->resource('app/users',AppusersController::class);

    $router->group(['middleware'=>'admin.permission:allow,administrator,editor'],function($router){

    });

    $router->resource('banner',BannerController::class);//轮播图管理
    $router->resource('article',ArticleController::class);//文章管理
    $router->resource('article_type',ArticleTypeController::class);//文章类型管理
    $router->resource('web_visitors',WebVisitorController::class);//黑特斯管理页

    $router->resource('about',AboutController::class);//footer管理 关于
    $router->resource('appintr',AppIntrController::class);//footer管理 关于

    $router->resource('friends',FriendsLinkController::class);//footer管理 关于

    $router->resource('cooperation',CooperationController::class);//商家管理

    $router->resource('hits',HitsController::class);//黑特斯管理页

    $router->post('upload','UploadController@uploadEditorImage');//富文本编辑器中的upload文件接口

    /**
     * app内部功能管理
     */
    $router->resource('genius',GeniusController::class);//牛人管理
    $router->resource('genius_auto_order',GeniusRuleOrderController::class);//牛人自动排序规则管理
    $router->resource('story',StoryController::class);//动态审核管理
    $router->resource('comment',StoryCommentController::class);//动态审核管理


});
