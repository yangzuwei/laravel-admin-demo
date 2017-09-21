<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Banner;
use App\Models\Genius;
use App\Models\ArticleType;
use App\Models\AppActivity;

class IndexController extends Controller
{

    public function index()
    {
        $articles = Article::where('hot','>',0)->orderBy('hot','desc')->take(9)->get();
        return view("index",[
            'genius'=>Genius::all(),
            'article_types'=>ArticleType::all(),
            'banners'=>Banner::all(),
            'article_two'=>$articles->slice(0,2),
            'article_seven'=>$articles->slice(2),
            'activities'=>AppActivity::where('is_quick_create',0)->where('status','<>','cancel')->orderBy('create_date','desc')->take(20)->get(),
            ]
        );
    }

}