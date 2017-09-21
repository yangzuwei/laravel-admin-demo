<?php

namespace App\Http\Controllers;

use App\Models\AppActivityUsers;
use App\Models\SportCates;
use App\Models\AppActivity;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{

    protected $status = [
        'Registrationin'=>'报名中',
        'sign'=>'签到中',
        'started'=>'已开始',
        'paused'=>'已暂停',
        'finished'=>'已结束',
        'cancel'=>'已结束'
    ];

    public function all($type=0)
    {
        $activities = AppActivity::where('is_quick_create',0)->where('status','<>','cancel');

        if($type){
            $activities = $activities->where('type',$type);
            $currentCateName = SportCates::find($type)->sport_cate_name;
        }else{
            $currentCateName = '全部';
        }

        return view('activity',[
            'activities'=>$activities->orderBy('create_date','desc')->paginate(20),
            'types'=>SportCates::all(),
            'current_type'=>$type,
            'status'=>$this->status,
            'title'=>$currentCateName.'活动'
        ]);
    }

    public function detail($id)
    {
        $detail = AppActivity::find($id);
        $sportCateName = SportCates::find($detail->type)->sport_cate_name;
        return view('activity_detail',[
            'detail'=>$detail,
            'status'=>$this->status,
            'title'=>$detail->title.$sportCateName.'活动'
        ]);
    }

    public function join(Request $request)
    {
        $activityId = $request->input('activity_id');

        $detail = AppActivity::find($activityId);

        $canJoin = $detail->status == 'Registrationin'&&$detail->allow_mans<$detail->joined_mans;

        $uid = Auth::user()->id;

        if($canJoin){
            $appActivityUsers = new AppActivityUsers();
            if($appActivityUsers->addUser($activityId,$uid)){
                $data['is_join'] = true;
            }else{
                $data['is_join'] = false;
            }
        }else{
            $data['is_join'] = false;
        }
        echo json_encode($data);
    }

    //写法一 在控制器中直接echo
    public function actDetail(Request $request)
    {
        $activityId = $request->input('id');
        $detail = AppActivity::find($activityId);
        return view('activity.content_for_act',['detail'=>$detail]);
    }

    //写法二return view
    public function actShare(Request $request)
    {
        $activityId = $request->input('id');

        $stories = Story::where('activity_id',$activityId)->get();

        return view('activity.share_for_act',['stories'=>$stories]);

    }

}