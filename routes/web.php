<?php

Route::get('/', 'IndexController@index');

Route::get('activity/{type?}','ActivityController@all');//活动列表页面

Route::get('activity_detail/{id}','ActivityController@detail');//具体活动页面

Route::post('act_detail','ActivityController@actDetail');
Route::post('act_share','ActivityController@actShare');

Route::get('hits','HitsController@index');

Route::get('cooperation','CooperationController@index');

Route::get('map/{location?}','CooperationController@map');

Route::get('app_intr','AboutController@appIntr');

Route::get('about/{cate?}','AboutController@index');

Route::get('videos',function(){
    return view('video_list');
});

Route::get('video_detail',function(){
    return view('video_detail');
});

Route::get('news/{type?}','ArticleController@news');

Route::get('content/{id}','ArticleController@detail');

Route::get('buy',function(){
    return view('buy');
});

Route::get('genius','GeniusController@all');

Route::get('user_detail/{id}', 'UserController@detail');//用户详情

Route::get('fade',function(){
   return view('index1');
});

Route::group(['middleware'=>'auth'],function(){

    Route::post('activity_join','ActivityController@join');

    Route::get('account','UserController@info');

    Route::post('slogan','UserController@slogan');

    Route::post('cover','UserController@cover');

});


Route::get('auth/{service}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{service}/callback', 'Auth\LoginController@handleProviderCallback');

//Auth::routes();
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

//
//Route::get('/home', 'HomeController@index')->name('home');

//Route::get('publish', function () {
//    // Route logic...
//
//    Redis::publish('test-channel', json_encode(['foo' => 'bar']));
//});
//
//Route::get("view",function(){
//    return view("test");
//});
//
Route::get('we',function(){
    return view('we');
});