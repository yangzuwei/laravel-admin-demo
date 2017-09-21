<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Article;
use App\Models\FriendsLink;
use App\Models\SportCates;
use App\Models\Visitor;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

        $shareData = [
            'display'=>'none',
            'tips'=>'欢迎',
            'sport_cates'=>SportCates::all(),
            'act_css'=>'act',
            'hot_articles'=>Article::where('hot','>',0)->orderBy('hot','desc')->take(5)->get(),
            'friends_link'=>FriendsLink::all(),
            'about'=>About::all(),
        ];
        View::share($shareData);

        Visitor::ipCount();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
