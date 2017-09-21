<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge，chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{isset($title)?$title:'行悦部落'}}</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" type="text/css" href="/css/flexslider.css">
    <link rel="stylesheet" type="text/css" href="/css/pub.css">

    <script src="/js/jquery-1.8.3.min.js"></script>
    @yield("page-css")

    <!--[if lt IE 9]>
    <script type="text/javascript">
        alert("您的浏览器版本太低，为了您的访问顺畅，请更换高版本浏览器！！");
    </script>
    <![endif]-->
</head>
<body>

<!-- 头部-->
<div class="header">
    <div class="top">
        <div class="top-center">
            <h1><img src="/img/logo.jpg" alt=""/></h1>
            <div class="search" style="width: auto">
                <div class="sea-cont">
                    <input type="text" placeholder="请输入搜索内容"/>
                    <button><img src="/img/sea-icon.png" alt=""/></button>
                </div>
                <ul  style="display: inline;overflow: hidden;">
                    @if (Auth::guest())
                        <li class="login-btn"><a href="#">登录</a></li>
                        <li><span>|</span></li>
                        <li class="enroll-btn"><a href="#">注册</a></li>
                    @else
                        <li><a href="/account">{{ Auth::user()->nick }}</a></li>

                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();" >
                                退出
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="nav">
        <div class="phone-menu"><img src="/img/phone-menu.jpg" alt=""/></div>
        <ul>
            <li><a target="_blank" href="/">首页</a><i></i></li>
            <li class="allhd act">
                <a target="_blank" href="/activity">所有活动 <img src="/img/heade-xia.jpg" alt=""/></a>
                <i></i>
                <div class="xl hdxl">
                    @foreach($sport_cates as $s)
                    <a href="/activity/{{$s->id}}">{{$s->sport_cate_name}}</a>
                    @endforeach
                </div>
            </li>
            <li class="code">
                <a target="_blank" href="/app_intr">app下载 <img style="position: relative;top: 2px" src="/img/header-app.jpg" alt=""/></a>
                <i></i>
                <div class="xl appxl">
                    <dl>
                        <dd>
                            <img src="/img/code.jpg" alt=""/>
                            <span>安卓版下载</span>
                        </dd>
                        <dd>
                            <img src="/img/code.jpg" alt=""/>
                            <span>安卓版下载</span>
                        </dd>
                    </dl>
                </div>
            </li>
            <li><a target="_blank"  href="/hits">黑特斯</a><i></i></li>
            <li><a target="_blank"  href="/cooperation">商家合作</a><i></i></li>
            <li><a target="_blank" href="/about">关于公司</a><i></i></li>
        </ul>
    </div>
</div>
@section("child-content")
@show
<!-- 底部-->
<div class="footer">
    <div class="foot-center">
        <div class="foot-search">
            <div class="sea-cont">
                <input type="text" placeholder="请输入搜索内容"/>
                <button><img src="/img/sea-icon.png" alt=""/></button>
            </div>
        </div>
        <div class="code">
            <ul>
                <li>
                    <img src="/img/footer-code.jpg" alt=""/>
                    <span>行悦部落app</span>
                    <b>安卓版</b>
                </li>
                <li>
                    <img src="/img/footer-code.jpg" alt=""/>
                    <span>行悦部落app</span>
                    <b>IOS版</b>
                </li>
            </ul>
        </div>
        <div class="left-link">
            <ul>
                @foreach($about as $a)
                    <li><a href="/about/{{$a->id}}">{{$a->title}}</a></li>
                @endforeach
                <li><a href="javascript:void(0);" onclick="alert('暂未开放')">客服咨询</a></li>
            </ul>
            <dl>
                <dt><a>友情链接:</a></dt>
                @foreach($friends_link as $f)
                    <dt><a href="{{$f->link}}">{{$f->title}}</a></dt>
                @endforeach
            </dl>
            <p>GUANGZHOU KAI CHUANG INFORMATION TECHNOLOGY SERVICE CO., LTD. 粤ICP备09061936号-1</p>
            <span>版权所有：广州市凯创信息技术有限公司</span>
        </div>
    </div>
</div>

<div class="close-shadow"></div>

<!--遮罩层-->
<div class="shadow"></div>
<!-- 登录注册-->
<div class="login" style="height: auto">
    <div class="top">
        <span>行悦部落</span>
        <div class="btn">
            <button id="logbtn" class="act">登录</button>
            <button id="enrbtn">注册</button>
        </div>
    </div>
    <div class="log allcont">
        <ul>
            <form role="form" method="POST" action="{{ route('login') }}" >
            {{ csrf_field() }}
            <li>
                <span><img src="/img/user.png" alt=""/></span>
                <input type="text" placeholder="请输入您的账号" name="user_name"/>
            </li>
            <li>
                <span><img src="/img/psw.png" alt=""/></span>
                <input type="text" placeholder="请输入您的密码" name="password"/>
            </li>
            <li style="border: none">
                <button type="submit">登  录</button>
            </li>
            </form>
        </ul>
        {{--<div class="thr">--}}
            {{--<span>第三方登陆</span>--}}
        {{--</div>--}}
        {{--<dl>--}}
            {{--<dd>--}}
                {{--<img src="/img/qq.png" alt=""/>--}}
                {{--<span>qq登录</span>--}}
            {{--</dd>--}}
            {{--<dd>--}}
                {{--<a href="/auth/weixin">--}}
                {{--<img src="/img/we.png" alt=""/>--}}
                {{--<span>微信登录</span>--}}
                {{--</a>--}}
            {{--</dd>--}}
        {{--</dl>--}}
    </div>
    <div class="enr allcont" >
        <ul>
            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
            <li>
                <span><img src="/img/user.png" alt=""/></span>
                <input type="text" placeholder="请输入您的账号" name="user_name"/>
            </li>
            <li>
                <span><img src="/img/psw.png" alt=""/></span>
                <input type="text" placeholder="请输入您的密码" name="password"/>
            </li>
            <li>
                <span><img src="/img/psw.png" alt=""/></span>
                <input type="text" placeholder="请再次密码确认" name="password_confirmation"/>
            </li>
            <li>
                <span><img src="/img/eml.png" alt=""/></span>
                <input type="text" placeholder="请输入常用邮箱" name="email"/>
            </li>
            <li class="code">
                <input type="text" placeholder="输入动态验证码" name="captcha"/>
                <div class="num">
                    <img src="{{ url('/captcha') }}" onclick="this.src='{{ url('/captcha') }}?r='+Math.random();" alt="">
                </div>
            </li>
            <li style="border: none">
                <button type="submit">注   册</button>
            </li>
            </form>
        </ul>
    </div>
</div>
@if(Session::has('log_message'))
    @component('common.tips',['tips'=>Session::get('log_message')])
        @slot('display')
            block
        @endslot
        {{$tips}}
    @endcomponent
@endif
</body>


<script src="/js/jquery.flexslider-min.js"></script>
<script src="/js/super_slider.js"></script>
<script src="/js/pub.js"></script>
@stack('scripts')
<script>
    // 轮播图
    $(".flexslider").flexslider({
        animation: "slide",
        slideshowSpeed: 11000
    });

    $(".flex-next").html("");
    $(".flex-prev").html("");

    $(".nav ul li").each(function(){
        if(window.location.pathname == $(this).children('a').attr('href')){
            $(this).addClass('act');
        }else{
            $(this).removeClass('act');
        }
    });

    //    新闻下拉
    $(".news h4 strong").click(function(){
        $(this).next().slideDown(150);
        $(".close-shadow").fadeIn(0);
    });
    $(".news .xl span").click(function(){
        $(".news .xl").slideUp(150)
        $(".close-shadow").fadeOut(0);
    });
    $(".close-shadow").click(function(){
        $(".news .xl").slideUp(150)
        $(".close-shadow").fadeOut(0);
    });



</script>


<script>
    $(".box").superSlider({
        prevBtn: ".prev", //左按钮
        nextBtn: ".next", //右按钮
        listCont: "#roll", //滚动列表外层
        scrollWhere: "prev", //自动滚动方向next
        delayTime: 10000, //自动轮播时间间隔
        speed: 300, //滚动速度
        amount: 1, //单次滚动数量
        showNum: 7, //显示数量
        autoPlay: false //自动播放
    });
</script>

</html>