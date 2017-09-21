<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\Genius;
use App\Models\Slogan;
use App\Models\Appuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserController extends Controller
{

    public function detail($id)
    {
        $genius = Appuser::find($id);
        $qrCodePath = '/img/qrcode/addfiends'.$id.'.png';

        $codeInfo = json_encode([
            "Athlete_Image"=>$genius->icon,
            "Athlete_Level"=>(string)$genius->level,
            "Athlete_Name"=>$genius->user_name,
            "Athlete_Nick"=>$genius->nick,
            "Athlete_Role"=>(string)$genius->role,
            "Athlete_Sex"=>$genius->sex==1?"男":"女",
            "Athlete_Vip"=>(string)$genius->vip,
            "type"=>"加好友",
        ]);

        QrCode::format('png')->size(680)->margin(1)->merge($genius->icon,.20,true)->generate($codeInfo,public_path($qrCodePath));

        $stories = Story::where("uid",$id)->where("privacy",1)->orderBy("create_date","desc")->paginate(5);
        //dd($stories);

        //$stories = UrlWindow::make($storiesTmp,1);

        $recoms = Genius::where('uid','<>',$id)->orderBy("order_num","desc")->take(10)->get();

        return view("user_detail",[
            'genius'=>$genius,
            'qrcode'=>$qrCodePath,
            'stories'=>$stories,
            'all_genius'=>$recoms,
            ]
        );
    }

    public function info()
    {
        $info = Slogan::find(Auth::id());
        return view('account',[
            'slogan'=>$info
        ]);
    }

    public function slogan(Request $request)
    {
        $data = [];

        $where['uid'] = $data['uid'] = Auth::user()->id;

        if($request->input('personal_slogan')){
            $data['personal_slogan'] = $request->input('personal_slogan');
            echo $data['personal_slogan'];
        }elseif($request->input('horde_slogan')){
            $data['horde_slogan'] = $request->input('horde_slogan');
            echo $data['horde_slogan'];
        }
        Slogan::updateOrCreate($where,$data);
    }

    public function cover(Request $request)
    {
        $data = [];

        $where['uid'] = $data['uid'] = Auth::user()->id;
        $data['cover_img'] = $request->file('cover_img')->store('image');
        $rs = Slogan::updateOrCreate($where,$data);
        echo $rs;
    }

}