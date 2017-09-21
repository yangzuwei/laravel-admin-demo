@extends("layouts.home")

@section('page-css')
    <link rel="stylesheet" type="text/css" href="/css/activity-details.css">
    <link rel="stylesheet" type="text/css" href="/css/touchTouch.css">
    <!-- share.css -->
    <link rel="stylesheet" href="/css/share.min.css">
@endsection

@section("child-content")

<!-- 内容-->
<div class="content1" id="content">
    <div class="left-cont">
        <div class="btn-cont">
            <a href="javascript:void(0)"><button class="act" id="act_detail">活动详情</button></a>
            <a href="javascript:void(0)"><button id="act_share" >精彩分享</button></a>
            <a href="#"><button class="bm">点击报名</button></a>
        </div>
        <div class="cont1" id="cont1">
            @include('activity.content_for_act')
        </div>
    </div>
    <div class="right-cont">
        <div class="cont1">
            <div class="name">
                <span>活动报名</span>
                <i>状态：{{$status[$detail->status]}}</i>
            </div>
            <ul>
                <li>
                    <b>{{$detail->start_date}}</b>活动开始
                </li>
                <li>
                    <span>参与人数：{{$detail->joined_mans}}/{{$detail->allow_mans}}</span>
                </li>
                <li>
                    <button id="join-act">申请活动</button>
                </li>
            </ul>
        </div>
        <div class="cont2">
            <div class="name">
                <span>队长</span>
            </div>
            <ul>
                <li>
                    <a target="_blank"  href="/user_detail/{{$detail->uid}}">
                        <div class="head">
                            <img class="nr-head" src="{{$detail->appuser->icon}}" alt=""/>
                            <img class="nr-icon" src="/img/nr-icon.png" alt=""/>
                        </div>
                        <p class="name-pep"><img src="@if($detail->appuser->sex==1)/img/male.png @else /img/female.png @endif" alt=""/>{{$detail->appuser->nick}}</p>
                        <span>{{$detail->story->count()}}篇动态</span>
                    </a>
                </li>
            </ul>
            <div class="name-s">
                <span>队员</span>
            </div>
            <ul>
                @foreach($detail->activityusers as $user)
                <li>
                    <a target="_blank"  href="/user_detail/{{$user->uid}}">
                        <div class="head">
                            <img class="nr-head" src="{{$user->appuser->icon}}" alt=""/>
                            <img class="nr-icon" src="/img/nr-icon.png" alt=""/>
                        </div>
                        <p class="name-pep"><img src="@if($user->appuser->sex==1)/img/male.png @else /img/female.png @endif" alt=""/>{{$user->appuser->nick}}</p>
                        <span>{{$user->story->count()}}篇动态</span>
                    </a>
                </li>
                @endforeach

            </ul>
        </div>

        <div class="share">
            <dl style="overflow: visible;width:inherit">
            <dt>一键分享:</dt>
            <div class="share-component"  data-mobile-sites="weibo,qq,qzone,wechat" data-sites="wechat,weibo,qq,qzone" data-image="{{$detail->image}}"></div>
            </dl>
        </div>
    </div>
</div>

<!-- share.js -->

<script>
    $('#join-act,.bm').click(function(){
        @if(Auth::check())
        $.post(
            "/activity_join",
            {"activity_id":{{$detail->id}},"_token":"{{csrf_token()}}"},
            function(data){
            //alert(data.is_join);
            if(data.is_join){
                alert("加入成功！"+data.actid);
                //设置为已经加入
                $('#join-act').text("已经加入");
            }else{
                alert("活动已经不可加入");
            }
        },'json');
        @else
            //alert("请登录后再操作");
            $(".login-btn").click();
        @endif
    });

    $("#act_detail").click(function(){
        $.post(
            "/act_detail",
            {"id":{{$detail->id}},"_token":"{{csrf_token()}}"},
            function(data){
                $("#content").removeClass("content2").addClass("content1");
                $("#cont1").children("*").remove();
                $("#act_share").removeClass("act");
                $("#act_detail").addClass("act");
                $("#cont1").append(data);
            }
        );
    });

    $("#act_share").click(function(){
        $.post(
            "/act_share",
            {"id":{{$detail->id}},"_token":"{{csrf_token()}}"},
            function(data){
                $("#content").removeClass("content1").addClass("content2");
                $("#cont1").children("*").remove();
                $("#act_detail").removeClass("act");
                $("#act_share").addClass("act");
                $("#cont1").append(data);

                $(".exc2 .list").each(function(){
                    $(this).find("a").touchTouch();
                });
            }
        );
    });

</script>

@push('scripts')
<script src="/js/touchTouch.jquery.js"></script>
<script src="/js/social-share.min.js"></script>
@endpush

@endsection

