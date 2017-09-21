<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Hits;

class HitsController extends Controller
{
    public function index()
    {
        $images = Hits::where('position',1)->orderBy('created_at','desc')->take(13)->get();

        $thumbs = Hits::where('position',2)->orderBy('created_at','desc')->take(2)->get();

        $articles = Article::where('type',4)->orderBy('created_at','desc')->paginate(8);
        return view('hits',[
            'images'=>$images,
            'thumbs'=>$thumbs,
            'articles'=>$articles,
        ]);
    }
}
