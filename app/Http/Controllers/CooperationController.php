<?php

namespace App\Http\Controllers;

use App\Models\Cooperation;

class CooperationController extends Controller
{

    public function index()
    {
        return view("cooperation",[
            'coop'=>Cooperation::orderBy('created_at','desc')->paginate(20)
            ]
        );
    }

    public function map($point)
    {
        return view('map',['point'=>$point]);
    }
}