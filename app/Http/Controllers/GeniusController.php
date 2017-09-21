<?php

namespace App\Http\Controllers;

use App\Models\Genius;

class GeniusController extends Controller
{

    public function all()
    {
        $all = Genius::all();
        return view('genius_list',['all'=>$all]);
    }

}