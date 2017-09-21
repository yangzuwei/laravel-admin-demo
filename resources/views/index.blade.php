@extends("layouts.home")

@section("page-css")
    <link rel="stylesheet" type="text/css" href="css/index.css">
@endsection

@section("child-content")
<!-- banner-->
<div class="banner flexslider">
    <ul class="slides">
        @foreach($banners as $banner)
            <li style="background: url(/upload/{{$banner->url}})"></li>
        @endforeach
    </ul>
</div>

<!-- 部落牛人-->
<div class="Tribal-people">
    <h3>
        <span>部落牛人</span>
        <a href="/genius">more ></a>
    </h3>
    <div class="show box">
        <span class="prev"></span>
            <dl id="roll">
                @foreach($genius as $g)
                <dd>
                    <a href="/user_detail/{{$g->appuser->id}}">
                        <div>
                            <img src={{$g->appuser->icon}} alt=""/>
                            <i>
                                @if($g->slogan == null)
                                    COME ON <br> 来挑战我吧
                                @else
                                    {{$g->slogan->personal_slogan}}
                                @endif
                            </i>
                        </div>
                        <span>{{$g->appuser->nick}}</span>
                        <b>{{$g->appuser->sportrole->sport_role_name}}</b>
                    </a>
                </dd>
                @endforeach
            </dl>
        <span class="next"></span>
    </div>
</div>

<!-- 部落推荐-->
<div class="recommende">
    <h3>
        <span>部落推荐</span>
        <a href="/news">more ></a>
    </h3>
    <div class="travel">
        <ul>
            @foreach($article_two as $a)
            <a href="/content/{{$a->id}}">
                <li>
                    <div class="bigimg" style="background: url('/upload/{{$a->image}}');background-size: cover;background-position: center center;">
                        {{--<img src="/upload/{{$a->image}}" alt="" onload="resizeimg(this,857,342);"/>--}}
                    </div>
                    <div class="info">
                        <div class="top">
                            <div class="head-img">
                                <img src="/upload/{{$a->adminuser->avatar}}" alt=""/>
                            </div>
                            <div class="head-txt">
                                <h4>主题：{{$a->title}}</h4>
                                <span>发布者: {{$a->adminuser->name}}</span>
                            </div>
                        </div>

                        <p>{{str_limit(strip_tags($a->content), $limit = 240, $end = '...')}}</p>
                    </div>
                </li>
            </a>
            @endforeach
        </ul>
    </div>
    <div class="news">
        <h4>
            <strong>新闻类型<img src="/img/news-x.jpg" alt=""/></strong>
            <b class="xl">
                @foreach($article_types as $a)
                <a href="/news/{{$a->id}}"><span>{{$a->title}}</span></a>
                @endforeach
            </b>
        </h4>
        <ul>
            @foreach($article_seven as $a)
            <a href="/content/{{$a->id}}">
            <li>
                <div class="news-list-img" style="background: url('/upload/{{$a->image}}') center center">
                    {{--<img src="" alt=""/>--}}
                </div>
                <div class="list-txt">
                    <p>{{$a->title}}</p>
                    <span>发布：{{date("Y.m.d",strtotime($a->created_at))}}</span>
                </div>
            </li>
            </a>
            @endforeach
        </ul>
    </div>
</div>


<!-- app活动-->
<div class="app">
    <h3>
        <span>APP活动</span>
        <a href="/activity">more ></a>
    </h3>
    <ul>
        @foreach($activities as $a)
        <li>
            <a href="activity_detail/{{$a->id}}">
            <div class="img-cont" style="background: url({{$a->image}}) center center no-repeat;">
                <i class="jb bmz">
                    @if($a->status == 'Registrationin')
                        报名中
                    @elseif($a->status == 'sign')
                        签到中
                    @elseif($a->status == 'started')
                        已开始
                    @elseif($a->status == 'paused')
                        已暂停
                    @else
                        已结束
                    @endif
                </i>
                <div class="sha">
                    <s>行悦部落</s>
                    @if($g->slogan == null)
                        <p>共享行悦 互动同行，大家一起来加入我们的户外家庭吧</p>
                    @else
                        {{$g->slogan->personal_slogan}}
                    @endif
                </div>
            </div>
            <span>活动名称: {{$a->title}}</span>
            <b>关键词: @if($a->location){{$a->location}}@else 互动 安全 @endif</b>
            </a>
        </li>
        @endforeach
    </ul>
</div>


<!-- 户外视频-->
<div class="outdoor-video">
    <h3>
        <span>户外视频</span>
        <a href="all-video.html">more ></a>
    </h3>
    <ul>
        <li>
            <video class="video-cont" controls poster="/img/video.jpg">
                <source src="http://www.w3school.com.cn/i/movie.ogg">
                您的浏览器不支持 video 标签。
            </video>
            <span>来啊困难啊</span>
        </li>
        <li>
            <video class="video-cont" controls poster="/img/video.jpg">
                <source src="http://www.w3school.com.cn/i/movie.ogg">
                您的浏览器不支持 video 标签。
            </video>
            <span>来啊困难啊</span>
        </li>
        <li>
            <video class="video-cont" controls poster="/img/video.jpg">
                <source src="http://www.w3school.com.cn/i/movie.ogg">
                您的浏览器不支持 video 标签。
            </video>
            <span>来啊困难啊</span>
        </li>
        <li>
            <video class="video-cont" controls poster="/img/video.jpg">
                <source src="http://www.w3school.com.cn/i/movie.ogg">
                您的浏览器不支持 video 标签。
            </video>
            <span>来啊困难啊</span>
        </li>
        {{--<li>--}}
            {{--<div class="video-cont">--}}
                {{--<img src="img/video.jpg" alt=""/>--}}
            {{--</div>--}}
            {{--<span>来啊困难啊</span>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<div class="video-cont">--}}
                {{--<img src="img/video.jpg" alt=""/>--}}
            {{--</div>--}}
            {{--<span>来啊困难啊</span>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<div class="video-cont">--}}
                {{--<img src="img/video.jpg" alt=""/>--}}
            {{--</div>--}}
            {{--<span>来啊困难啊</span>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<div class="video-cont">--}}
                {{--<img src="img/video.jpg" alt=""/>--}}
            {{--</div>--}}
            {{--<span>来啊困难啊</span>--}}
        {{--</li>--}}
    </ul>
</div>

<script>
function resizeimg(obj,maxW,maxH)
{
    var imgW=obj.width;
    var imgH=obj.height;

    var sourceRatio = imgH/imgW;
    var stdRatio = maxH/maxW;

    if(sourceRatio > stdRatio)
    {
        obj.width = maxW;
        obj.height = maxW*sourceRatio;
    }else{
        obj.width = maxH/sourceRatio;
        obj.height = maxH;
    }
}
</script>

@endsection