<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AppIntr;

class AboutController extends Controller
{

    public function index($cate = 1)
    {
        return view("buy",[
            'content'=>About::find($cate),
            ]
        );
    }

    public function appIntr()
    {
        return view('buy',[
            'content'=>AppIntr::orderBy('id','desc')->first(),
        ]);
    }
}