<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleType;
use App\Models\Genius;
use App\Models\ArticleComments;

class ArticleController extends Controller
{

    public function news($type = 0)
    {
        if($type){
            $news = Article::where('type',$type)->orderBy('created_at','desc')->paginate(10);
        }else{
            $news = Article::orderBy('created_at','desc')->paginate(10);
        }
//dd($news[0]->content,ArticleType::all(),$type);
        return view('news_list',[
            'types'=>ArticleType::all(),
            'current_type'=>$type,
            'news'=>$news,
        ]);
    }

    public function detail($id)
    {
        $article = Article::find($id);
        $comments = ArticleComments::where('article_id',$id)->get();

        return view("news_detail",[
            'all_genius'=>Genius::all()->take(5),
            'article'=>$article,
            'comments'=>$comments,
            'title'=>$article->title,
            ]
        );
    }

}